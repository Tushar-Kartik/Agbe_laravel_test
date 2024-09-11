<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayRecordController extends Controller
{
    public function index(){
        return view('display_data');
    }

    public function getData(Request $request){
        $draw                 =         $request->get('draw'); // Internal use
        $start                 =         $request->get("start"); // where to start next records for pagination
        $rowPerPage         =         $request->get("length"); // How many recods needed per page for pagination
        $orderArray        =         $request->get('order');
        $columnNameArray     =         $request->get('columns'); // It will give us columns array
        $searchArray         =         $request->get('search');
        $columnIndex         =         $orderArray[0]['column'];  // This will let us know,
        $columnName         =         $columnNameArray[$columnIndex]['data']; // Here we will get column name, 
        $columnSortOrder     =         $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue         =         $searchArray['value']; // This is search value 


        $city=DB::table('city');
        $total=$city->count();

        $totalFilter=$total;
        $arrData = DB::table('city');
        // $arrData=$arrData->skip($start)->takes($rowPerPage);
        $arrData = $arrData->get();


        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arrData,
         );

         return response()->json($response);
    }
}
