@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <a href="{{ route('pendistribusian.index') }}"
           class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
        <div class="border-b-2 border-gray-800 flex justify-between pb-2">
            <h2 class="text-xl font-semibold">Tambah Data Pendistribusian</h2>
        </div>

        <form action="{{ route('pendistribusian.update', $data->id) }}" class="space-y-6" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div class="space-y-2 col-span-2">
                    <p>Nama Program <label class="text-red-700">*</label></p>
                    <input type="text" value="{{ $data->program }}" name="program"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('program')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Bulan <label class="text-red-700">*</label></p>
                    <select name="bulan" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value="{{$data->bulan}}" selected>{{$bulan[$data->bulan]}}</option>
                        <option disabled>=================</option>
                        @foreach ($bulan as $index => $b)
                            <option value="{{ $index }}">
                                {{ $b }}
                            </option>
                        @endforeach
                    </select>
                    @error('bulan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Tahun <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->tahun }}" name="tahun"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Fakir <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_fakir }}" name="target_fakir"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_fakir')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Miskin <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_miskin }}" name="target_miskin"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_miskin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Amil <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_amil }}" name="target_amil"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_amil')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Muallaf <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_muallaf }}" name="target_muallaf"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_muallaf')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Riqob <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_riqob }}" name="target_riqob"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_riqob')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Gharim <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_gharim }}" name="target_gharim"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_gharim')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Fisabilillah <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_fisabilillah }}" name="target_fisabilillah"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_fisabilillah')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Ibnu Sabil <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_ibnu_sabil }}" name="target_ibnu_sabil"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_ibnu_sabil')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <button type="submit" class="bg-[#014F31] py-2 px-4 rounded-[12px] text-white">Tambah</button>
            </div>
        </form>
    </div>
@endsection

