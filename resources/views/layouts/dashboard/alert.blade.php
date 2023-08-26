@if (session('success'))
    <div class="flex justify-end fixed z-99 top-0 right-0 mr-20 my-24 animated-element" id="alert">
        <div class="bg-blue-700 py-4 px-8 rounded-2xl shadow-xl text-white w-min whitespace-nowrap">
            <p>{{ session('success') }}</p>
        </div>
    </div>
@elseif (session('error'))
    <div class="flex justify-end fixed z-99 top-0 right-0 mr-20 my-24 animated-element" id="alert">
        <div class="bg-red-700 py-4 px-8 rounded-2xl shadow-xl text-white w-min whitespace-nowrap">
            <p>{{ session('error') }}</p>
        </div>
    </div>
@endif
