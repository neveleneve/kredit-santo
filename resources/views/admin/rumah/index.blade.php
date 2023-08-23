@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-4-desktop is-12-mobile">
                    <a class="button is-primary is-fullwidth has-text-weight-bold" href="{{ route('rumah.create') }}">
                        Tambah Data Rumah
                    </a>
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
                    <div class="table-container">
                        <table class="table is-fullwidth is-bordered has-text-centered">
                            <thead>
                                <tr>
                                    <th class="is-dark has-text-centered">#</th>
                                    <th class="is-dark has-text-centered">Nama</th>
                                    <th class="is-dark has-text-centered">Kode Rumah</th>
                                    <th class="is-dark has-text-centered">Tipe</th>
                                    <th class="is-dark has-text-centered">Harga</th>
                                    <th class="is-dark has-text-centered">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rumah as $index => $item)
                                    <tr>
                                        <td>{{ ($rumah->currentPage() - 1) * $rumah->perPage() + $index + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->rumah_code }}</td>
                                        <td>{{ $item->tipe_rumah }}</td>
                                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a class="button is-info is-small has-text-weight-bold"
                                                href="{{ route('nasabah.edit', ['nasabah' => $item->id]) }}">
                                                Edit
                                            </a>
                                            <a class="button is-success is-small has-text-weight-bold"
                                                href="{{ route('nasabah.show', ['nasabah' => $item->id]) }}">
                                                Show
                                            </a>
                                            <a class="button is-danger is-small has-text-weight-bold">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="has-text-centered">
                                            <h1 class="has-text-weight-bold is-size-3">Data Kosong</h1>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-desktop-12">
                    {{ $rumah->links('layouts.pagination') }}
                </div>
            </div>
        </div>
    </section>
@endsection
