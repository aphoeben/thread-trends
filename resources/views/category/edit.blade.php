@extends('layouts.app')

@section('content')

<form method="POST" action="{{ url('update-record/'.$item->id) }}" enctype="multipart/form-data">
    <h1> Edit Category </h1>
    @csrf
    @method('PUT')
    <div class="row my-3">
    <img src="{{ asset('storage/products/'.$item->image) }}" id="profile_preview" class="img-fluid" style="width: 300px; object-fit: cover;">

        <div class="form col-md-12">
            <label> Name: </label>
            <input type="text" name="name" id="#" class="form-control" value="{{ $item->name }}" required>
        </div>
        <div class="form col-md-12">
            <label> Description: </label>
            <input type="text" name="description" id="#" class="form-control" value="{{ $item->description }}" required>
        </div>
        <div class="form col-md-6">
            <label> Price: </label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $item->price}}" required>
        </div>
        <div class="form col-md-4">
            <label> Section (W or M): </label>
             <select name="section" id="section" class="form-control" required>
                <option value="W" {{ $item->section == 'W' ? 'selected' : '' }}>W</option>
                 <option value="M" {{ $item->section == 'M' ? 'selected' : '' }}>M</option>
            </select>
        </div>

        <div class="form col-md-6">
            <label> QTY: </label>
            <input type="text" name="qty" id="qty" class="form-control" value="{{ $item->qty}}" required>
        </div>
        <div class="form col-md-6">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control" onchange="readURL(this)" accept="image/*">
        </div>
            <a href="{{ route('category.index') }}" class="btn btn-lg btn-secondary mt-3 ms-3 col-md-1">Back</a>
            <button class="btn btn-lg btn-success mt-3 ms-3 col-md-1" type="submit">Save</button>
    </div>
</form>


@endsection