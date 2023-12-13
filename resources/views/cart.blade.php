<style>
button:disabled {
    background-color: #555;
    /* Change color to a darker shade when disabled */
    cursor: not-allowed;
    /* Show a "not-allowed" cursor when disabled */
    opacity: 0.6;
    /* Decrease opacity when disabled */
}

th {
    color: #ffffff;
    /* Change this to the color you want */
}
</style>

@extends('layouts.app')

@section('content')
<div class="bg-gray-100 h-screen py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">My Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                @if(Cart::isEmpty())
                <p class="text-gray-500 text-center mt-32">Your cart is empty.</p>
                @else
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
                                <td class="pt-4" style="color: white;">
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
                                <td class="pt-4" style="color: white;">

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
                @endif

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



                    <button id="checkout-button" class="bg-red-800 text-white py-2 px-4 rounded-lg mt-4 w-full"
                        {{ Cart::isEmpty() ? 'disabled' : '' }}>Checkout</button>


                </div>

            </div>
        </div>
    </div>
</div>

<div id="dialog" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div
            class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Are you sure you want to place an order?
                </h3>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form action="{{ route('checkout') }}" method="POST" style="margin: 0; padding: 0;">
                    @csrf
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-800 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                        id="confirm-button">
                        Place Order
                    </button>
                </form>
                <button type="button"
                    class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2  bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                    id="cancel-button" style="margin-top: 0;">
                    Cancel
                </button>
            </div>

        </div>
    </div>
</div>

<script>
document.querySelector('#checkout-button').addEventListener('click', function() {
    document.querySelector('#dialog').classList.remove('hidden');
});

document.querySelector('#confirm-button').addEventListener('click', function() {
    document.querySelector('#dialog').classList.add('hidden');
    // Add your checkout logic here
});

document.querySelector('#cancel-button').addEventListener('click', function() {
    document.querySelector('#dialog').classList.add('hidden');
});
</script>
@endsection