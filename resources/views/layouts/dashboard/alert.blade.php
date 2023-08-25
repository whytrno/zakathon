@if (session('success'))
    <div class="flex justify-end fixed top-0 right-0 mr-20 my-24 animated-element" id="alert">
        <div class="bg-blue-700 py-4 px-8 rounded-2xl shadow-xl text-white w-min whitespace-nowrap">
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
