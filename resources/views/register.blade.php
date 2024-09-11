@extends('layout')
@section('title','REGISTER')

<!-- this help to send css file as well -->
@push('styles')
<link rel="stylesheet" href="{{ url('css/register.css') }}">
@endpush


@section('content')
<div class="form-container">

    <form action="/store_data" method="POST">
        @csrf
        <label for="fname">FIRST NAME</label>
        <input type="text" name="fname">

        <label for="lname">LAST NAME</label>
        <input type="text" name="lname">
        
        <label for="email">Email</label>
        <input type="email" name="email">

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob">


        <label for="mobile">Mobile Number</label>
        <input type="tel" name="mobile" >

        <label for="password">Password</label>
        <input type="password" name="password">

        <label for="country">Country</label>
            <select name="country" id="country">
                <option value="">Select Country</option>
                @foreach($countries as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>

        <label for="state">State</label>
        <select name="state" id="state">
            <option value="">Select State</option>
        </select>

        <label for="city">City</label>
        <select name="city" id="city">
        <option value="">Select city</option>
        </select>

        <label for="locality">Locality</label>
        <input type="text" name="locality">

        <label for="pincode">Pincode</label>
        <input type="number" name="pincode">

        <button type="submit">Submit</button>

    </form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function() {
        // this will populate state according to country
        $('#country').on('change', function() {
            var countryID = $(this).val();
            if(countryID) {
                $.ajax({
                    url: '/get-states?country_id=' + countryID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#state').empty();
                        $('#state').append('<option value="">Select State</option>');
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#state').empty();
                $('#state').append('<option value="">Select State</option>');
            }
        });

        // to populate city according to state
        $('#state').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/get-cities?state_id=' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#city').empty();
                        $('#city').append('<option value="">Select City</option>');
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#city').empty();
                $('#city').append('<option value="">Select City</option>');
            }
        });
    });
</script>

@endsection