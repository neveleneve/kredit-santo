@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title has-text-weight-bold">
                                Data Penilaian Nasabah
                            </p>
                        </div>
                        <div class="card-content">
                            <div class="columns">
                                <div class="column">
                                    <h3 class="has-text-weight-bold has-text-centered">Data Nasabah</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <table class="table is-fullwidth is-bordered has-text-centered">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    Data Pribadi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Nama</td>
                                                <td>{{ ucwords($penilaian->nasabah->nama) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Jenis Kelamin</td>
                                                <td>{{ ucwords($penilaian->nasabah->detailNasabah->jenis_kelamin) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Nomor Kartu Keluarga</td>
                                                <td>{{ $penilaian->nasabah->detailNasabah->no_kk }}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Nomor Induk Kependudukan</td>
                                                <td>{{ $penilaian->nasabah->detailNasabah->nik }}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Tanggal Lahir</td>
                                                <td>{{ date('d F Y', strtotime($penilaian->nasabah->detailNasabah->tanggal_lahir)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kontak</td>
                                                <td>{{ $penilaian->nasabah->detailNasabah->kontak }}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Status Nikah</td>
                                                <td>
                                                    {{ $penilaian->nasabah->detailNasabah->status_pernikahan == 2 ? 'Menikah' : 'Belum Menikah' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Provinsi</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->nasabah->village->district->regency->province->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kota/Kabupaten</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->nasabah->village->district->regency->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kecamatan</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->nasabah->village->district->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kelurahan</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->nasabah->village->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    Data Pekerjaan dan Tanggungan Nasabah
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Status Pekerjaan</td>
                                                <td>
                                                    @if ($penilaian->nasabah->detailNasabah->pekerjaan == 2)
                                                        Tetap
                                                    @elseif ($penilaian->nasabah->detailNasabah->pekerjaan == 1)
                                                        Tidak Tetap
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Rentang Gaji</td>
                                                <td>
                                                    @if ($penilaian->nasabah->detailNasabah->gaji == 3)
                                                        Rp 1.000.000 - Rp 3.000.000
                                                    @elseif ($penilaian->nasabah->detailNasabah->gaji == 2)
                                                        Diatas Rp 3.000.000 - Rp 7.000.000
                                                    @elseif ($penilaian->nasabah->detailNasabah->gaji == 1)
                                                        Diatas Rp 7.000.000 - Rp 9.000.000
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    Data Aset Nasabah
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Aset Rumah</td>
                                                <td>
                                                    @if ($penilaian->nasabah->detailNasabah->aset_rumah == 4)
                                                        TIdak Punya
                                                    @elseif ($penilaian->nasabah->detailNasabah->aset_rumah == 3)
                                                        Mengontrak
                                                    @elseif ($penilaian->nasabah->detailNasabah->aset_rumah == 2)
                                                        Punya Rumah
                                                    @elseif ($penilaian->nasabah->detailNasabah->aset_rumah == 1)
                                                        Punya Rumah Lebih Dari 1
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Aset Kendaraan</td>
                                                <td>
                                                    @if ($penilaian->nasabah->detailNasabah->aset_kendaraan == 4)
                                                        Tidak Punya
                                                    @elseif ($penilaian->nasabah->detailNasabah->aset_kendaraan == 3)
                                                        Sepeda
                                                    @elseif ($penilaian->nasabah->detailNasabah->aset_kendaraan == 2)
                                                        Sepeda Motor
                                                    @elseif ($penilaian->nasabah->detailNasabah->aset_kendaraan == 1)
                                                        Mobil
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    Data Rumah
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Nama</td>
                                                <td>
                                                    {{ $penilaian->rumah->nama }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kode Rumah</td>
                                                <td>
                                                    {{ $penilaian->rumah->rumah_code }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Tipe Rumah</td>
                                                <td>
                                                    {{ $penilaian->rumah->tipe_rumah }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Harga Rumah</td>
                                                <td>
                                                    Rp {{ number_format($penilaian->rumah->harga, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Provinsi</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->rumah->village->district->regency->province->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kota/Kabupaten</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->rumah->village->district->regency->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kecamatan</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->rumah->village->district->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Kelurahan</td>
                                                <td>
                                                    {{ ucwords(strtolower($penilaian->rumah->village->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    Data Penilaian Nasabah
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Skor</td>
                                                <td>
                                                    {{ $penilaian->nilai }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="columns">
                                <div class="column">
                                    <h3 class="has-text-weight-bold has-text-centered">Data Detail Penilaian Nasabah</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <table class="table is-fullwidth is-bordered has-text-centered">
                                        <thead class="is-primary">
                                            <tr>
                                                <td class="is-dark has-text-weight-bold">#</td>
                                                <td class="is-dark has-text-weight-bold">Nama Kriteria</td>
                                                <td class="is-dark has-text-weight-bold">Bobot</td>
                                                <td class="is-dark has-text-weight-bold">Poin</td>
                                                <td class="is-dark has-text-weight-bold">Jumlah</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @forelse ($bobot as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->nama }} </td>
                                                    <td>{{ $item->bobot }}</td>
                                                    <td>{{ $datapoin[$loop->index] }}</td>
                                                    <td>{{ ($item->bobot / 100) * $datapoin[$loop->index] }}</td>
                                                    @php
                                                        $total += ($item->bobot / 100) * $datapoin[$loop->index];
                                                    @endphp
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="has-text-weight-bold" colspan="4">
                                                    Nilai Total
                                                </td>
                                                <td>
                                                    {{ $total }}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @if (round($total, 2) !== round($penilaian->nilai, 2))
                                        <span class="has-text-danger">*</span>
                                        <span class="has-text-weight-bold">Nilai Skor dengan total nilai total pada tabel
                                            mengalami perubahan. Silakan mengulangi proses penilaian Nasabah</span>
                                        {{-- <br>
                                        <span class="has-text-weight-bold">Total perhitungan : {{ round($total, 2) }} -
                                            Penilaian pada Database : {{ round($penilaian->nilai, 2) }} </span> --}}
                                    @endif
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <a class="button is-danger is-fullwidth is-outlined has-text-weight-bold"
                                        href="{{ route('penilaian.index') }}">
                                        <i class="fa fa-chevron-left"></i>
                                        &nbsp;
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
