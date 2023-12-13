@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-4xl font-bold text-center w-full">My Wishlist</h1>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach(Auth::user()->wishlist as $product)
        <div style="background-color: #212529;" class="rounded-lg shadow-lg relative product-card">
            <form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="absolute top-2 right-2 m-2" style="color: #8d0606;">
                    <i class="fa fa-trash fa-lg"></i>
                </button>
            </form>
            <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}"
                class="w-full h-64 object-cover ">
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