<div class="relative">
    <div onclick="toggleLogoutModal()" class="flex justify-end py-5 bg-white w-full px-10">
        <div class="gap-3 cursor-pointer flex items-center w-min mx-10">
            <img src="{{ asset('images/default-profile-picture.png') }}" alt="" class="rounded-full w-10 h-10">
            <p class="font-bold text-black/70">Admin</p>
        </div>
    </div>
    <a id="logoutModal" href="{{ route('logout') }}"
        class="hidden hover:bg-gray-100 absolute top-20 right-0 py-3 px-14 bg-white drop-shadow-xl rounded-b-[12px] text-semibold">
        Logout
    </a>
</div>

@push('scripts')
    <script>
        function toggleLogoutModal() {
            $('#logoutModal').toggleClass('hidden');
        }
    </script>
@endpush
