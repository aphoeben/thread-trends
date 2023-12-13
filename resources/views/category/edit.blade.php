@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h1 class="mb-0">Edit Category</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('update-record/'.$item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('storage/products/'.$item->image) }}" id="profile_preview" class="img-fluid" style="object-fit: cover;" alt="{{ $item->name }}">
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ $item->description }}" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="price">Price:</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="section">Section (W or M):</label>
                                <select name="section" id="section" class="form-control" required>
                                    <option value="W" {{ $item->section == 'W' ? 'selected' : '' }}>W</option>
                                    <option value="M" {{ $item->section == 'M' ? 'selected' : '' }}>M</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="qty" class="form-control" value="{{ $item->qty }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" class="form-control" onchange="readURL(this)" accept="image/*">
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
                            <button class="btn btn-success ms-3" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
