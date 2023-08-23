@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-4-desktop is-12-mobile">
                <div class="column is-4-desktop is-12-mobile">
                    <button class="button is-primary is-fullwidth has-text-weight-bold">
                        Tambah Data Rumah
                    </button>
                </div>
                <div class="column is-4-desktop is-offset-4-desktop is-12-mobile">
                    <input class="input is-default" type="text" placeholder="Pencarian">
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    @if (session()->has('message'))
                        <div class="notification is-{{ session('color') }} has-text-weight-bold peringatan">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table is-fullwidth is-bordered">
                        <thead>
                            <tr>
                                <th class="is-dark">#</th>
                                <th class="is-dark">Nama Nasabah</th>
                                <th class="is-dark">Kode Rumah</th>
                                <th class="is-dark">Hasil Penilaian</th>
                                <th class="is-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penilaian as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>{{ $item->tipe }}</td>
                                    <td class="has-text-centered">
                                        <a class="button is-primary is-small has-text-weight-bold"
                                            href="{{ route('nasabah.edit', ['nasabah' => $item->id]) }}">
                                            Edit
                                        </a>
                                        <a class="button is-danger is-small has-text-weight-bold">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="has-text-centered">
                                        <h1 class="has-text-weight-bold is-size-3">Data Kosong</h1>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
