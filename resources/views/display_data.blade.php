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
<div class="main">
    <div class="container">
        <h3>Displaying data from the database</h3>

        <div class="table-container">
        <table id="datatable" class="display">
            <thead>
                <tr align="left">
                    <th>id</th>
                    <th data-sortable="true">city</th>
                    <!-- <th data-sortable="false">state</th>
                    <th data-sortable="false">city</th> -->
                </tr>
            </thead>
            <tbody></tbody>
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
        ajax: "{{ url('users-data') }}",
        columns: [
            { data: 'city_id' },
            { data: 'city_name' },
         
            // { data: 'country' },
            // { data: 'state' },
            // { data: 'city' }

        ]
    });
});

</script>

</html>