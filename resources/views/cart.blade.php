@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-4xl font-bold text-center mb-4">Your Cart</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach(Cart::getContent() as $item)
        <div style="background-color: #212529;" class="rounded-lg shadow-lg relative product-card">
            <img src="{{ asset('storage/products/' . $item->associatedModel->image) }}" alt="{{ $item->name }}"
                class="w-full h-64 object-cover ">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-white">{{ $item->name }}</h2>
                <p class="text-gray-100">{{ $item->associatedModel->description }}</p>

                <div class="flex justify-between items-center mt-4">
                    <span style="color: #8d0606;" class="text-xl font-bold">₱{{ $item->price }}</span>
                    <div class="space-x-2">
                        <form action="{{ route('updateCart', $item->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}">
                            <button type="submit"
                                class="bg-blue-800 hover:bg-blue-900 active:bg-blue-700 text-white px-4 py-2 rounded">
                                Update Quantity
                            </button>
                        </form>
                        <form action="{{ route('removeFromCart', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-red-800 hover:bg-red-900 active:bg-red-700 text-white px-4 py-2 rounded">
                                Remove from Cart
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