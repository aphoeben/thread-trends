@extends('layouts.app')

@section('content')
<div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
    <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4 md:w-1/2 ">
            <div class="sticky top-0 z-50 overflow-hidden ">
                <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
                    <img src="https://i.postimg.cc/PqYpFTfy/pexels-melvin-buezo-2529148.jpg" alt=""
                        class="object-cover w-full lg:h-full ">
                </div>

            </div>
        </div>
        <div class="w-full px-4 md:w-1/2 ">
            <div class="lg:pl-20">
                <div class="mb-8 ">
                    <span class="text-lg font-medium text-red-800 ">Men</span>
                    <h2 class="max-w-xl mt-2 mb-6 text-2xl font-bold  md:text-4xl">WILL LAREN SKETCHES TEE</h2>

                    <p class="max-w-md mb-8 text-gray-700 ">
                        Lorem ispum dor amet Lorem ispum dor amet Lorem ispum dor amet Lorem ispum dor amet
                        Lorem ispum dor amet Lorem ispum dor amet Lorem ispum dor amet Lorem ispum dor amet
                    </p>
                    <p class="inline-block mb-8 text-3xl font-bold text-gray-700  ">
                        ₱2,999
                    </p>
                </div>
                <div class="w-full mb-8 ">
                    <label for="" class="w-full text-xl font-semibold text-gray-700 ">Quantity</label>
                    <div class="relative flex flex-row w-full h-10 mt-4 bg-transparent rounded-lg">
                        <button
                            class="w-12 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer   hover:text-gray-700  hover:bg-gray-400">
                            <span class="m-auto text-2xl font-thin">-</span>
                        </button>
                        <input type="number" value="1"
                            class="flex items-center w-20 font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none    focus:outline-none text-md hover:text-black"
                            placeholder="1">
                        <button
                            class="w-12 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer    hover:text-gray-700 hover:bg-gray-400">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </div>
                </div>
                <div class="flex items-center -mx-4">

                    <div class="px-2 w-full">
                        <button style="border: 1px solid #c53030;"
                            class="flex items-center justify-center w-full p-2 text-red-800 rounded-md bg-transparent hover:bg-red-800 active:bg-red-700">
                            Add to wishlist
                        </button>
                    </div>


                    <div class="px-2 w-full">
                        <button
                            class="flex items-center justify-center w-full bg-red-800 hover:bg-red-900 active:bg-red-700 text-white px-4 py-2 rounded">
                            Add to Cart
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    let quantityInput = document.querySelector('input[type="number"]');
    let incrementButton = document.querySelector('.rounded-r');
    let decrementButton = document.querySelector('.rounded-l');

    incrementButton.addEventListener('click', function() {
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    decrementButton.addEventListener('click', function() {
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});
</script>

@endsection