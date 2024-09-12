<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayRecordController extends Controller
{
    public function index(){
        return view('display_data');
    }


    public function getData(Request $request)
    {
        $draw = $request->get('draw'); // Internal use
        $start = $request->get("start"); // Where to start next records for pagination
        $rowPerPage = $request->get("length"); // How many records needed per page for pagination
        $orderArray = $request->get('order');
        $columnNameArray = $request->get('columns'); // It will give us columns array
        $searchArray = $request->get('search');
        $columnIndex = $orderArray[0]['column'];  // This will let us know,
        $columnName = $columnNameArray[$columnIndex]['data']; // Here we will get column name
        $columnSortOrder = $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue = $searchArray['value']; // This is search value



        // main query to run and get data from (3 tables)
        $arrData = DB::table('city')
        ->join('state', 'city.state_id', '=', 'state.state_id')
        ->join('country', 'state.country_id', '=', 'country.country_id')
        ->select('city.city_name as city', 'state.state_name as state', 'country.country_name as country');
    
        //  this will enable search query
        if (!empty($searchValue)) {
            $arrData->where(function($q) use ($searchValue) {
                        $q->where('city_name', 'like', '%' . $searchValue . '%')
                        ->orWhere('state_name', 'like', '%' . $searchValue . '%')
                        ->orWhere('country_name', 'like', '%' . $searchValue . '%');
                    });
                }

        // // Apply ordering and pagination
        $arrData->orderBy($columnName, $columnSortOrder)
        ->skip($start)
        ->take($rowPerPage);

        // $arrData = DB::table('city');
        $arrData = $arrData->get();
        $total = $arrData->count();

        // Prepare the response
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $arrData,
        );

        return response()->json($response);
    }
}
