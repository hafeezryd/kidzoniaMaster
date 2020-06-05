@extends('layouts.header')
@section('user')
<h2>Parents </h2>
@endsection
@section('content')
    admin classwork 
    <div class="container">
        <form action="{{route('admin.classwork.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <input type="date" name="date" id="date">
            <select name="class" id="class">
                <option value="1">Kidzo Junior</option>
                <option value="2">Kidzo Senior</option>
            </select>
            <select name="subject" id="subject">
                <option value="1">English</option>
                <option value="2">Maths</option>
                <option value="3">EVS</option>
                <option value="4">GK</option>

            </select>
            <input type="text" name="title" id="title">
            <input type="file" name="image" id="image">
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection