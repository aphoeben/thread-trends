@extends('layouts.app')

@section('content')

@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('/save-record') }}" method="POST" enctype="multipart/form-data">

    <h4> Add Product </h4>

    {{ @csrf_field() }}
    <div class="row my-3">
        <div class="form col-md-12">
            <label> Name: </label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form col-md-12">
            <label> Description: </label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form col-md-4">
            <label> Price: </label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form col-md-4">
        <label> Section (W or M): </label>
            <select name="section" id="section" class="form-control">
                <option value="W">W</option>
                <option value="M">M</option>
            </select>
        </div>
        <div class="form col-md-2">
            <label> Quantity: </label>
            <input type="text" name="qty" id="qty" class="form-control">
        </div>
        <div class="form col-md-4">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
    </div>
    <a href="{{ route('category.index') }}" class="btn btn-lg btn-secondary mt-3">Cancel</a>
    <button class="btn btn-lg btn-success mt-3" type="submit"> Save</button>
</form>

@endsection