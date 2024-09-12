<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/displaypage.css') }}">

    <link href="{{ asset('css/jquery.dataTables.css')}}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.js')}}"></script>
</head>
<body>
<div class="heading">
<h1>DISPLAYING DATA FROM DATABASE</h1>
</div>
<div class="main">

    <div class="container">
        
       
        <div class="table-container">
            <table id="datatable" class="display">
                <thead>
                    <tr> 
                        <th>City</th>
                        <th>state</th>
                        <th>Country</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

    


</body>
<script>
    $(document).ready(function() {
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        order: [[ 0, "desc" ]],
        ajax: "{{ url('city_data') }}",
        columns: [
            // { data: 'city_id' },
            { data: 'city' },
            { data: 'state' },
            { data: 'country' },
        ]
    });
});

</script>

</html>