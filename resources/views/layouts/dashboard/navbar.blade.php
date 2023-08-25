<div class="flex justify-end py-5 bg-white w-full px-10">
    <div class="gap-3 cursor-pointer flex items-center w-min whitespace-nowrap mx-10">
        @if (auth()->user()->jenis_kelamin == 'laki laki')
            <img src="{{ asset('images/man-default-profile-picture.jpg') }}" alt=""
                class="w-10 h-10 rounded-full object-contain bg-gray-200">
        @else
            <img src="{{ asset('images/woman-default-profile-picture.jpg') }}" alt=""
                class="w-10 h-10 rounded-full object-contain bg-gray-200">
        @endif
        <p class="font-bold text-black/70">{{ auth()->user()->nama }}</p>
    </div>
</div>
