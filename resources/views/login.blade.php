@extends('layout')
@section('title','LOGIN')

@push('styles')
<link rel="stylesheet" href="{{ url('css/register.css') }}">
@endpush

@section('content')
<div class="fullbody">
    <div class="form-container">
        <form action="/login" method="POST">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="password">Password</label>
            <input type="password" name="password">

            <button type="submit">Login</button>
        </form>
    </div>
</div>


@endsection