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
                    <h4 class="title is-4 has-text-centered">Laporan Penilaian Nasabah</h4>
                    <h4 class="title is-5 has-text-centered">{{ date('d F Y', strtotime($dari)) }} -
                        {{ date('d F Y', strtotime($sampai)) }}</h4>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <table class="table is-bordered is-fullwidth">
                        <thead>
                            <tr>
                                <th>Nama Nasabah</th>
                                <th>Kode Rumah</th>
                                <th>Status Kelayakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td class="has-text-centered">{{ $item->nasabah->nama }}</td>
                                    <td class="has-text-centered">{{ $item->rumah->rumah_code }}</td>
                                    <td class="has-text-centered">{{ $item->status ? 'Layak' : 'Tidak Layak' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="has-text-centered" colspan="3">
                                        <h4 class="title is-6">Data Penilaian Kosong</h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
</body>

</html>
