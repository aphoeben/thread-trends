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

@media print {
    .no-print {
        display: none;
    }

    body,
    h1,
    h2,
    span,
    th,
    td {
        color: black !important;
    }


}
</style>
<div class="py-8" style=" display: flex; justify-content: center;">
    <div class="md:w-1/2">
        <div style="background-color: #212529; color: white;" class="rounded-lg shadow-md p-6">
            <div class="shrink-0 flex items-center justify-between">
                <img src="{{ URL::asset('/Logo white.png') }}" width="80">
                <div class="flex">
                    <button class="no-print" onclick="window.print()">
                        <i class="fas fa-print text-red-800 fa-lg"></i>
                    </button>

                    <h2 class="text-2xl font-semibold ml-3">INVOICE</h2>
                </div>
            </div>

            <hr class="my-2">

            <table class="table-full-width">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                @php
                $order = \App\Models\Order::find($order_id);
                @endphp

                @foreach($order->orderItems as $item)
                <tr>
                    <td class="pb-4">{{ $item->product->name }}</td>
                    <td class="pb-4">{{ $item->quantity }}</td>
                    <td class="pb-4">₱{{ number_format($item->product->price, 2) }}</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="3">
                        <hr class="my-2">
                    </td>
                </tr>
                <tr>
                    <td></td>

                    <td class="pb-0">Subtotal</td>
                    <td class="pb-0">₱{{ number_format($subtotal, 2) }}</td>
                </tr>
                <tr>
                    <td></td>

                    <td class="pb-0">Platform fee (0.2%)</td>
                    <td class="pb-0">₱{{ number_format($platformFee, 2) }}</td>
                </tr>
                <tr>
                    <td></td>

                    <td class="pb-0">Shipping</td>
                    <td class="pb-0">₱50</td>
                </tr>

                <tr>
                    <td></td>

                    <td class="pb-0 font-bold">Total</td>
                    <td class="pb-0 font-bold text-red-800">₱{{ number_format($total, 2) }}</td>
                </tr>
            </table>

            <button class="no-print bg-red-800 text-white py-2 px-4 rounded-lg mt-4 w-full"
                onclick="location.href='/dashboard'">Continue Shopping</button>


        </div>
    </div>
</div>



@endsection