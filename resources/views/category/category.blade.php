@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">{{ $item->name }} Details</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/products/'.$item->image) }}" class="img-fluid" alt="{{ $item->name }}">
                </div>

                <div class="col-md-8">
                    <p><strong>Name:</strong> {{ $item->name }}</p>
                    <p><strong>Description:</strong> {{ $item->description }}</p>
                    <p><strong>Price:</strong> ₱{{ number_format($item->price,2) }}</p>
                    <p><strong>Section:</strong> {{ $item->section }}</p>

                    <div class="mt-3">
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
                        <a href="/category/edit/{{ $item->id }}" class="btn btn-success">Edit</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection