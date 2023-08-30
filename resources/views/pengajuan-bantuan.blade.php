@extends('layouts.homePage.main')

@section('content')
    <div class="lg:space-y-20 space-y-10">
        <div class="lg:px-20 lg:space-y-10 space-y-5 font-semibold">
            <h1 class="text-3xl font-bold text-center text-[#014F31]">PENGAJUAN BANTUAN</h1>

            <form action="{{route('home-page.pengajuan-bantuan.store')}}" method="POST" enctype="multipart/form-data"
                  class="flex justify-center">
                @csrf
                <div class="grid grid-cols-1 gap-5 w-1/2">
                    <div class="space-y-2">
                        <p>Jenis Bantuan <label class="text-red-700">*</label></p>
                        <select id="jenis-bantuan" onchange="toggleJenisBantuan()" name="jenis_bantuan"
                                class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                            <option selected disabled>Pilih bantuan</option>
                            <option value="bantuan_santunan">Bantuan/Santunan</option>
                            <option value="usaha_produktif">Usaha Produktif</option>
                            <option value="bantuan_bangun_rehab_masjid_langgar_tpa">Bantuan Bangun/Rehab
                                Masjid/Langgar/TPA (Tempat Pendidikan Al Qur’an)
                            </option>
                            <option value="bantuan_bangun_rehab_rumah_layak_huni">Bantuan Bangun/Rehab Rumah Layak
                                Huni
                            </option>
                            <option value="bantuan_beasiswa">Bantuan Beasiswa</option>
                            <option value="bantuan_biaya_berobat">Bantuan Biaya Berobat</option>
                        </select>
                        @error('jenis_bantuan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <p>Nama Pemohon <label class="text-red-700">*</label></p>
                        <input name="nama_pemohon" type="text" class="bg-[#F6F8FA] w-full rounded-[12px] py-2 px-4">
                    </div>

                    @foreach($inputFile as $file)
                        <div class="space-y-2 hidden" id="{{$file['name']}}">
                            <p>Upload {{isset($file['judul']) ? $file['judul'] : ''}} <label
                                    class="text-red-700">*</label></p>
                            <div onclick="document.getElementById('{{$file['name']}}_file').click()"
                                 id="{{$file['name']}}_container"
                                 class="cursor-pointer hover:text-[#014F31] hover:border-[#014F31] hover:fill-[#014F31] flex flex-col items-center rounded-[12px] py-8 justyfy-center border-dashed border-2 text-gray-300 fill-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="w-16 h-16">
                                    <path fill-rule="evenodd"
                                          d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.03 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v4.94a.75.75 0 001.5 0v-4.94l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <p id="{{$file['name']}}_fileName" class="font-semibold">Lampirkan file Anda di sini
                                    atau jelajahi
                                    file</p>
                            </div>
                            <p class="text-blue-500">{{isset($file['keterangan']) ? $file['keterangan'] : ''}}</p>
                            <div class="text-black/30">
                                <p>Jenis file yang diterima: png | jpg | jpeg | Pdf</p>
                                <p>Ukuran maksimal file : 2MB</p>
                            </div>
                            <input type="file" name="{{$file['name']}}" id="{{$file['name']}}_file" class="hidden"
                                   accept="image/*">
                            @error('bukti_pembayaran_file')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach

                    <div class="flex justify-end gap-3">
                        <button id="submit" type="submit"
                                class="hidden bg-[#014F31] py-2 px-4 rounded-[12px] text-white">Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function changeFileContainer(jenis) {
            $('#' + jenis).removeClass('hidden')

            $('#' + jenis + '_file').on('change', function () {
                var fileName = this.files[0].name;

                $('#' + jenis + '_container').removeClass('text-gray-300 fill-gray-300')
                    .addClass('border-[#014F31] text-[#014F31] fill-[#014F31] border-2');

                var fileText = document.getElementById(jenis + '_fileName');
                fileText.textContent = fileName;
            });
        }

        function toggleJenisBantuan() {
            let value = $('#jenis-bantuan').val();

            if (value == 'bantuan_santunan') {
                $('#submit').removeClass('hidden')
                changeFileContainer('surat_permohonan_bantuan');
                changeFileContainer('ktp');
                changeFileContainer('kk');
                changeFileContainer('sktm');
            } else if (value == 'usaha_produktif') {
                $('#submit').removeClass('hidden')
                changeFileContainer('surat_permohonan_bantuan_modal');
                changeFileContainer('ktp');
                changeFileContainer('kk');
                changeFileContainer('surat_keterangan_rt_lurah_kades');
            } else if (value == 'bantuan_bangun_rehab_masjid_langgar_tpa') {
                $('#submit').removeClass('hidden')
                changeFileContainer('proposal_pembangunan_masjid');
                changeFileContainer('ktp');
                changeFileContainer('ktp_sekertasi_pelaksana');
                changeFileContainer('kk');
                changeFileContainer('foto_objek_masjid');
            } else if (value == 'bantuan_bangun_rehab_rumah_layak_huni') {
                $('#submit').removeClass('hidden')
                changeFileContainer('surat_permohonan_bantuan_pembangunan_rehab_rumah_layak_huni');
                changeFileContainer('ktp');
                changeFileContainer('kk');
                changeFileContainer('sktm');
                changeFileContainer('surat_keterangan_lahan_lokasi_tanah_milik_sendiri');
                changeFileContainer('surat_keterangan_lahan_lokasi_tanah_tidak_dalam_sengketa');
            } else if (value == 'bantuan_beasiswa') {
                $('#submit').removeClass('hidden')
                changeFileContainer('surat_permohonan_bantuan_pembangunan_rehab_rumah_layak_huni');
                changeFileContainer('ktp');
                changeFileContainer('kk');
                changeFileContainer('sktm');
                changeFileContainer('keterangan_aktif_kuliah');
                changeFileContainer('lembar_hasil_studi_terakhir');
                changeFileContainer('bukti_pembayaran_spp_terakhir');
                changeFileContainer('pas_foto');
            } else if (value == 'bantuan_biaya_berobat') {
                $('#submit').removeClass('hidden')
                changeFileContainer('surat_permohonan_bantuan_biaya_berobat');
                changeFileContainer('ktp');
                changeFileContainer('kk');
                changeFileContainer('kk_mahasiswa');
                changeFileContainer('sktm');
                changeFileContainer('surat_keterangan_sakit_rujukan');
                changeFileContainer('slip_pembayaran_rumah_sakit');
            } else {
                $('#submit').addClass('hidden')
            }
        }
    </script>
@endpush
