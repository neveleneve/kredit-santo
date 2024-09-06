@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
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
                                <th class="is-dark">Nama Kriteria</th>
                                <th class="is-dark">Bobot</th>
                                {{-- <th class="is-dark">Tipe</th> --}}
                                <th class="is-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kriteria as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    {{-- <td>{{ $item->tipe }}</td> --}}
                                    <td class="has-text-centered">
                                        <a class="button is-primary is-small has-text-weight-bold"
                                            href="{{ route('kriteria-bobot.edit', ['kriteria_bobot' => $item->id]) }}">
                                            Lihat
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
