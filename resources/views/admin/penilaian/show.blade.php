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
                                                <td class="has-text-weight-bold">Status Kawin</td>
                                                <td>
                                                    {{ ucwords($penilaian->nasabah->detailNasabah->status_pernikahan) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    Data Pekerjaan dan Tanggungan Nasabah
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Nama Pekerjaan</td>
                                                <td>
                                                    @if ($penilaian->nasabah->detailNasabah->pekerjaan == 100)
                                                        Aparatur Sipil Negara / Tentara
                                                    @elseif ($penilaian->nasabah->detailNasabah->pekerjaan == 75)
                                                        Pengusaha / Wiraswasta
                                                    @elseif ($penilaian->nasabah->detailNasabah->pekerjaan == 50)
                                                        Karyawan Swasta (Tetap)
                                                    @elseif ($penilaian->nasabah->detailNasabah->pekerjaan == 20)
                                                        Karyawan Swasta (Lepas)
                                                    @elseif ($penilaian->nasabah->detailNasabah->pekerjaan == 0)
                                                        Tidak Bekerja
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Rentang Gaji</td>
                                                <td>
                                                    @if ($penilaian->nasabah->detailNasabah->gaji == 30)
                                                        Dibawah Rp 2.000.000
                                                    @elseif ($penilaian->nasabah->detailNasabah->gaji == 50)
                                                        Rp 2.000.000 - Rp 3.499.000
                                                    @elseif ($penilaian->nasabah->detailNasabah->gaji == 60)
                                                        Rp 3.500.000 - Rp 4.999.000
                                                    @elseif ($penilaian->nasabah->detailNasabah->gaji == 80)
                                                        Rp 5.000.000 - Rp 7.000.000
                                                    @elseif ($penilaian->nasabah->detailNasabah->gaji == 100)
                                                        Diatas Rp 7.000.000
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Jumlah Tanggungan</td>
                                                <td>
                                                    @if ($penilaian->nasabah->detailNasabah->tanggungan == 20)
                                                        Lebih dari 3 Orang
                                                    @elseif ($penilaian->nasabah->detailNasabah->tanggungan == 40)
                                                        3 Orang
                                                    @elseif ($penilaian->nasabah->detailNasabah->tanggungan == 60)
                                                        2 Orang
                                                    @elseif ($penilaian->nasabah->detailNasabah->tanggungan == 80)
                                                        1 Orang
                                                    @elseif ($penilaian->nasabah->detailNasabah->tanggungan == 100)
                                                        Tidak Ada Tanggungan
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    @if ($penilaian->nasabah->detailNasabah->status_pernikahan == 'kawin')
                                                        Data Pasangan Nasabah
                                                    @else
                                                        Data Penjamin Nasabah
                                                    @endif
                                                </td>
                                            </tr>
                                            @if ($penilaian->nasabah->detailNasabah->status_pernikahan == 'kawin')
                                                <tr>
                                                    <td class="has-text-weight-bold">Nama</td>
                                                    <td>{{ $penilaian->nasabah->istri->nama }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="has-text-weight-bold">Nomor Induk Kependudukan</td>
                                                    <td>
                                                        {{ $penilaian->nasabah->istri->nik }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="has-text-weight-bold">Kontak</td>
                                                    <td>
                                                        {{ $penilaian->nasabah->istri->kontak }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="has-text-weight-bold">Pekerjaan</td>
                                                    <td>
                                                        {{ $penilaian->nasabah->istri->pekerjaan }}
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td class="has-text-weight-bold">Hubungan Dengan Nasabah</td>
                                                    <td>{{ $penilaian->nasabah->penjamin->tipe_penjamin }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="has-text-weight-bold">Nama</td>
                                                    <td>
                                                        {{ $penilaian->nasabah->penjamin->nama }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="has-text-weight-bold">Kontak</td>
                                                    <td>
                                                        {{ $penilaian->nasabah->penjamin->kontak }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="has-text-weight-bold">Alamat</td>
                                                    <td>
                                                        {{ $penilaian->nasabah->penjamin->alamat }}
                                                    </td>
                                                </tr>
                                            @endif
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
                                                <td colspan="2" class="has-text-weight-bold is-dark">
                                                    Data Keuangan Nasabah
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Tenor</td>
                                                <td>
                                                    {{ $penilaian->tenor }} Tahun
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">Down Payment</td>
                                                <td>
                                                    @if ($penilaian->dp == 20)
                                                        Dibawah 15% dari harga
                                                    @elseif ($penilaian->dp == 30)
                                                        16% - 20% dari harga
                                                    @elseif ($penilaian->dp == 40)
                                                        21% - 25% dari harga
                                                    @elseif ($penilaian->dp == 80)
                                                        26% - 30% dari harga
                                                    @elseif ($penilaian->dp == 100)
                                                        Diatas 30% dari harga
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-weight-bold">BI Checking</td>
                                                <td>
                                                    @if ($penilaian->dp == 20)
                                                        Skor 5
                                                    @elseif ($penilaian->dp == 30)
                                                        Skor 4
                                                    @elseif ($penilaian->dp == 40)
                                                        Skor 3
                                                    @elseif ($penilaian->dp == 80)
                                                        Skor 2
                                                    @elseif ($penilaian->dp == 100)
                                                        Skor 1
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="columns">
                                <div class="column">
                                    <h3 class="has-text-weight-bold has-text-centered">Data Penilaian Nasabah</h3>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bobot as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->nama }} ({{ $item->tipe }})</td>
                                                    <td>{{ $item->bobot }}</td>
                                                    <td>{{ $datapoin[$loop->index] }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <a class="button is-danger is-fullwidth has-text-weight-bold"
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
