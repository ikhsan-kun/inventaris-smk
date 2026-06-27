@extends('layouts.app')

@section('content')

    <!-- CONTENT -->
    <div class="p-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-24">

            <div>

                <h2 class="text-2xl font-semibold text-slate-800">
                    Laporan
                </h2>

                <p class="text-xs text-slate-400 font-medium">
                    Generate dan unduh laporan inventaris
                </p>

            </div>

        </div>

        <!-- REPORT CARD -->
        <div class="bg-white p-6 rounded-2xl border border-slate-300 shadow-sm">

            <div class="flex justify-between items-center mb-8">

                <div class="flex items-center gap-3">

                    <div class="bg-[#2f5d50] w-9 h-9 rounded-xl flex items-center justify-center text-white shadow-sm shadow-[#2f5d50]/20">

                        <i class="fas fa-file-invoice"></i>

                    </div>

                    <div>

                        <h4 class="font-bold text-slate-800">
                            Laporan Tersedia
                        </h4>

                        <p class="text-[10px] text-slate-400 font-bold uppercase">
                            Unduh format PDF atau Excel
                        </p>

                    </div>

                </div>

                <div class="flex gap-2">

                    <!-- PDF -->
                    <a href="/laporan/semua/pdf"
                    target="_blank"
                    class="bg-red-500 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-red-600 transition-all shadow-sm">

                        <i class="fas fa-file-pdf mr-2"></i>
                        Cetak PDF

                    </a>

                    <!-- EXCEL -->
                    <a href="/laporan/semua/excel"
                    class="bg-[#2f5d50] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#23463c] transition-all shadow-sm">

                        <i class="fas fa-file-excel mr-2"></i>
                        Cetak Excel

                    </a>

                </div>

            </div>

            <!-- ITEM -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">

                @php
                $items = [
                    ['title' => 'Stok Barang', 'icon' => 'fa-boxes'],
                    ['title' => 'Peminjaman', 'icon' => 'fa-hand-holding'],
                    ['title' => 'Kondisi Aset', 'icon' => 'fa-tools'],
                    ['title' => 'Mutasi Ruangan', 'icon' => 'fa-building']
                ];
                @endphp

                @foreach($items as $i)

                <div class="p-4 border border-slate-200 rounded-xl hover:bg-[#eef7f4] transition-all group">

                    <div class="flex gap-4 mb-5">

                        <div class="w-9 h-9 bg-[#eef7f4] text-[#2f5d50] rounded-xl flex items-center justify-center group-hover:bg-[#2f5d50] group-hover:text-white transition-all">

                            <i class="fas {{ $i['icon'] }}"></i>

                        </div>

                        <div>

                            <h5 class="text-sm font-semibold text-slate-800">
                                Laporan {{ $i['title'] }}
                            </h5>

                            <p class="text-[10px] text-slate-400 font-medium">
                                Periode: {{ now()->translatedFormat('F Y') }}
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-2">

<!-- PDF -->
<a href="
@if($i['title'] == 'Stok Barang')
/laporan/barang/pdf

@elseif($i['title'] == 'Peminjaman')
/laporan/peminjaman/pdf

@elseif($i['title'] == 'Kondisi Aset')
/laporan/aset/pdf

@elseif($i['title'] == 'Mutasi Ruangan')
/laporan/ruangan/pdf

@else
#

@endif
"
target="_blank"
class="py-2 border border-slate-200 bg-white
rounded-xl text-xs font-medium
text-[#2f5d50] hover:border-[#2f5d50]
transition-all text-center">

    PDF

</a>

                        <!-- EXCEL -->
                        <a href="
                        @if($i['title'] == 'Stok Barang')
                        /laporan/barang/excel

                        @elseif($i['title'] == 'Peminjaman')
                        /laporan/peminjaman/excel

                        @elseif($i['title'] == 'Kondisi Aset')
                        /laporan/aset/excel

                        @elseif($i['title'] == 'Mutasi Ruangan')
                        /laporan/ruangan/excel

                        @else
                        #

                        @endif
                        "
                        target="_blank"
                        class="py-2 border border-slate-200 bg-white
                        rounded-xl text-xs font-medium
                        text-[#2f5d50] hover:border-[#2f5d50]
                        transition-all text-center">

                            EXCEL

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

</div>

    <!-- SCRIPT -->
    <script>

</script>

@endsection