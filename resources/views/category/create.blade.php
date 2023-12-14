@extends('layouts.app')

@section('content')

<div class="container my-4" style="margin-bottom: 7rem;">
    @if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
    @endif
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Add Product</h4>
        </div>

        <div class="card-body">
            <form action="{{ url('/save-record') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="5"
                                required></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="section">Section (M or W):</label>
                            <select name="section" id="section" class="form-control" required>
                                <option value="M">M</option>

                                <option value="W">W</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection