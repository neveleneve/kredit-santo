<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="{{ asset('bulma/css/bulma.min.css') }}" rel="stylesheet">
    <style>
        .page-break {
            page-break-before: always;
        }

        .table.is-border {
            border: none;
        }

        .table.is-border th,
        .table.is-border td {
            border: none;
        }

        .indented-p {
            margin-left: 20px;
            /* Adjust the value as needed */
        }

        .indented-p span {
            display: inline-block;
            margin-left: -20px;
            /* Negative margin to counteract the left margin of the paragraph */
            padding-left: 20px;
            /* Adjust the value to control the indentation */
        }
    </style>
</head>

<body>
    <div style="padding: 20px;">
        <img src="{{ asset('logo/images.png') }}" alt="Logo Perusahaan" width="100"
            style="float: left; margin-right: 20px;">
        {{-- <div> --}}
        <h2 class="has-text-weight-bold is-size-3" style="padding: 0px; margin: 0px; text-align: center">
            PT Sinar Bahagia Group
        </h2>
        <p style="text-align: center">
            Jl. WR. Supratman No.1, Air Raja, Kec. Tanjungpinang Timur, Kota Tanjung Pinang,
            Kepulauan Riau 29125
        </p>
        <p style="text-align: center">Telp : (0771) 41108.</p>
        {{-- </div> --}}
    </div>
    <hr>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <table class="table is-border">
                        <tbody>
                            <tr>
                                <td class="has-text-weight-bold">Nama</td>
                                <td>:</td>
                                <td>{{ $penilaian->nasabah->nama }}</td>
                            </tr>
                            <tr>
                                <td class="has-text-weight-bold">Alamat</td>
                                <td>:</td>
                                <td>{{ $penilaian->nasabah->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="has-text-weight-bold">Kontak</td>
                                <td>:</td>
                                <td>{{ $penilaian->nasabah->detailNasabah->kontak }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <p class="indented-p">
                        Berdasarkan perhitungan kemampuan dalam pengajuan Kredit Perumahan Rakyat (KPR) anda dinyatakan
                        @if ($penilaian->status == 0)
                            <s>LAYAK</s> / TIDAK LAYAK
                        @else
                            LAYAK / <s>TIDAK LAYAK</s>
                        @endif dengan perhitungan penilaian sebagaimana
                        terlampir.
                    </p>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <p class="indented-p has-text-weight-bold">
                        Mengetahui
                    </p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="indented-p has-text-weight-bold">
                        Riskandar
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="page-break">
        <div style="padding: 20px;">
            <img src="{{ asset('logo/images.png') }}" alt="Logo Perusahaan" width="100"
                style="float: left; margin-right: 20px;">
            {{-- <div> --}}
            <h2 class="has-text-weight-bold is-size-3" style="padding: 0px; margin: 0px; text-align: center">
                PT Sinar Bahagia Group
            </h2>
            <p style="text-align: center">
                Jl. WR. Supratman No.1, Air Raja, Kec. Tanjungpinang Timur, Kota Tanjung Pinang,
                Kepulauan Riau 29125
            </p>
            <p style="text-align: center">Telp : (0771) 41108.</p>
            {{-- </div> --}}
        </div>
        <hr>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <table class="table is-bordered is-fullwidth">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Poin</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($bobot as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->bobot }}</td>
                                        <td>{{ $datapoin[$loop->index] }}</td>
                                        <td>{{ ($item->bobot / 100) * $datapoin[$loop->index] }}</td>
                                    </tr>
                                    @php
                                        $total += ($item->bobot / 100) * $datapoin[$loop->index];
                                    @endphp
                                @endforeach
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
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
