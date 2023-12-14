@extends('layouts.app')
@section('banner')
@include('banner', ['title' => 'For Women'],['label' => 'Fashion'])
@endsection
@section('content')
<div class="container mx-auto px-4 py-6">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($products as $product)
        <div style="background-color: #212529;" class="rounded-lg shadow-lg relative product-card">

            <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                @csrf
                <button class="text-gray-500 hover:text-red-800 absolute top-2 right-2 m-2">
                    <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 16.16 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 7.66-8.55 11.54L12 21.35z" />
                    </svg>
                </button>
            </form>
            <div style="background-color: #ffffff;">
                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-64 object-fit-contain object-center">
            </div>
            <div class="p-4">
                <h2 class="text-lg font-semibold text-white">{{ $product->name }}</h2>
                <p class="text-white">
                    {{ $product->section == 'W' ? "Women's" : ($product->section == 'M' ? "Men's" : '') }}
                </p>
                <p class="text-gray-100">{{ $product->description }}</p>

                <div class="flex justify-between items-center mt-4">
                    <span style="color: #8d0606;" class="text-xl font-bold">₱{{ number_format($product->price) }}</span>
                    <div class="space-x-2">
                        <form action="{{ route('addToCart', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-red-800 hover:bg-red-900 active:bg-red-700 text-white px-4 py-2 rounded">
                                Add to Cart
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('contact')
@include('contactbanner')
@endsection