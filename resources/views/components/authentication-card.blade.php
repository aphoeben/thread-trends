<div class="bg-gray-800 text-white">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0"> 
        <div>
            {{ $logo }}
        </div>
        <div class="w-full sm:max-w-md mt-2 px-6 py-2 bg-gray-500 shadow-md overflow-hidden sm:rounded-lg " > 
            {{ $slot }}
        </div>
    </div>
</div>
