@extends('layouts.app')

@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')

    Please enter your name and pick the Sectors you are currently involved in.
    <!-- New Person Form -->
{{--  For some reason session('person')->get('id') returns all ids so this magic method is used instead, eventhough phpstorm marks it as an error  --}}
    <form action=/person/{{ (session('person')) ? session('person')->id : ""}} method="POST" class="form-horizontal">
        {{ csrf_field() }}

    <!-- Task Name -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value={{ (session('person')) ? session('person')->name : ""}}>
        </div>

        <div class="form-group">
            <label for="sectors">Sectors:</label>
            <select multiple="" size="10" id="sectors" name="sectors[]">
                {!! $sectors !!}
            </select>
        </div>

        <div class="form-group">
            <input type="checkbox" id="terms" name="terms" {{ session('person') && session('person')->terms ? "checked" : ""}}>
            <label for="terms"> Agree to terms</label>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <input type="submit" value="Save">
        </div>
    </form>

@endsection
