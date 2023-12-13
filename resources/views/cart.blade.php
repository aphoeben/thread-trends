@extends('layouts.app')

@section('content')
<div class="bg-gray-100 h-screen py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div style="background-color: #212529; color: white;" class="rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::getContent() as $item)
                            <tr>
                                <td class="py-4" style="color: white;">
                                    <div class="flex items-center">
                                        <img class="h-16 w-16 mr-4"
                                            src="{{ asset('storage/products/' . $item->associatedModel->image) }}"
                                            alt="{{ $item->name }}">
                                        <span class="font-semibold">{{ $item->name }} -
                                            {{$item->associatedModel->section}}</span>
                                    </div>
                                </td>
                                <td class="py-4" style="color: white;">
                                    ₱{{ number_format($item->associatedModel->price) }}</td>
                                <td class="py-4" style="color: white;">
                                    <div class="flex items-center">
                                        <form action="{{ route('updateCart', $item->id) }}" method="POST">
                                            @csrf
                                            <input type="number" name="quantity" class=" text-black w-16 text-center"
                                                value="{{ $item->quantity }}">
                                            <button type="submit" class="ml-2">
                                                <i class="fa fa-save fa-lg text-blue-800"></i>
                                            </button>

                                        </form>
                                    </div>
                                </td>
                                <td class="py-4" style="color: white;">
                                    ₱{{ number_format((float)str_replace(',', '', $item->associatedModel->price) * (int)$item->quantity, 2) }}
                                </td>
                                <td class="py-4" style="color: white;">
                                    <form action="{{ route('removeFromCart', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" style="color: #8d0606;">
                                            <i class="fa fa-trash "></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="md:w-1/4">
                <div style="background-color: #212529; color: white;" class="rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>

                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>₱{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Platform fee (0.2%)</span>
                        <span>₱{{ number_format($platformFee, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>₱50</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">₱{{ number_format($total, 2) }}</span>
                    </div>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-800 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection