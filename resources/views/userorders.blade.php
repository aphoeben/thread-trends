@extends('layouts.app')

@section('content')
<style>
.table-full-width {
    width: 100%;
}

.table-full-width th,
.table-full-width td {
    padding: 10px;
    text-align: left;
}
</style>
<div class="bg-gray-100  py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">My Orders</h1>
        <div class="md:w-full">
            @foreach($orders as $order)
            <div style="background-color: #212529; color: white;" class="rounded-lg shadow-md p-6 mb-4">
                <h2 class="text-2xl text-red-800 font-semibold ml-3">Order #{{ $order->id }}</h2>
                <hr class="my-2">

                <table class="table-full-width">
                    <thead>
                        <tr>
                            <th class="text-left font-semibold">Product</th>
                            <th class="text-left font-semibold">Price</th>
                            <th class="text-left font-semibold">Quantity</th>
                            <th class="text-left font-semibold">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td class="py-4" style="color: white;">
                                <div class="flex items-center">
                                    <img class="h-16 w-16 mr-4"
                                        src="{{ asset('storage/products/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}">
                                    <span class="font-semibold">{{ $item->product->name }} -
                                        {{$item->product->section}}</span>
                                </div>
                            </td>
                            <td class="py-4" style="color: white;">₱{{ number_format($item->product->price, 2) }}</td>
                            <td class="py-4" style="color: white;">{{ $item->quantity }}</td>
                            <td class="py-4" style="color: white;">
                                ₱{{ number_format($item->quantity * $item->product->price) }}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <hr class="my-2">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>

                            <td class="pb-0">Total Price</td>
                            <td class="pb-0">₱{{ number_format($order->total_price, 2) }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>

                            <td class="pb-0">Status</td>
                            <td
                                class="pb-0 uppercase {{ $order->status == 'pending' ? 'text-yellow-600' : ($order->status == 'completed' ? 'text-green-600' : ($order->status == 'cancelled' ? 'text-red-600' : '')) }}">
                                {{ $order->status }}
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection