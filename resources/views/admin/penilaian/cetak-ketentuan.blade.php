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
        <img src="{{ url('storage/images/llogo.png') }}" alt="Logo Perusahaan" width="150"
            style="float: left; margin-right: 20px;">
        {{-- <div> --}}
        <h2 class="has-text-weight-bold" style="padding: 0px; margin: 0px; text-align: center">
            CV Halifa Berkah Utama
        </h2>
        <p style="text-align: center">Jalan Sei Payung</p>
        <p style="text-align: center">WA/Telp : 081365558790. Email: berkah.utama2019@gmail.com</p>
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
                        Arief Rahman Hakim
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="page-break">
        <div style="padding: 20px;">
            <img src="{{ url('storage/images/llogo.png') }}" alt="Logo Perusahaan" width="150"
                style="float: left; margin-right: 20px;">
            {{-- <div> --}}
            <h2 class="has-text-weight-bold" style="padding: 0px; margin: 0px; text-align: center">
                CV Halifa Berkah Utama
            </h2>
            <p style="text-align: center">Jalan Sei Payung</p>
            <p style="text-align: center">WA/Telp : 081365558790. Email: berkah.utama2019@gmail.com</p>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bobot as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->nama }} ({{ $item->tipe }})</td>
                                        <td>{{ $item->bobot }}</td>
                                        <td>{{ $datapoin[$loop->index] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
