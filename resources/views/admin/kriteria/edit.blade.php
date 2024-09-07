@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title has-text-weight-bold">
                                Perbarui Data Kriteria dan Bobot
                            </p>
                        </div>
                        <div class="card-content">
                            <form class="content"
                                action="{{ route('kriteria-bobot.update', ['kriteria_bobot' => $kriteria->id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="field">
                                    <label for="nama" class="label has-text-weight-bold">Nama Kriteria</label>
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Nama Kriteria" id="nama"
                                            value="{{ $kriteria->nama }}" disabled>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="tipe" class="label has-text-weight-bold">Tipe</label>
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Tipe" id="tipe"
                                            value="{{ $kriteria->tipe }}" disabled>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="bobot" class="label has-text-weight-bold">Bobot</label>
                                    <div class="control">
                                        <input type="number" class="input number" placeholder="Bobot Kriteria"
                                            id="bobot" name="bobot" value="{{ $kriteria->bobot }}"
                                            max="{{ $kriteria->bobot + $total }}">
                                    </div>
                                </div>
                                @if ($total == 0)
                                    <p>
                                        Total bobot untuk metode {{ strtoupper($kriteria->tipe) }} sudah 100%!
                                    </p>
                                @else
                                    <p>
                                        Total bobot untuk metode {{ strtoupper($kriteria->tipe) }} kurang
                                        {{ $total }} poin
                                    </p>
                                @endif
                                <div class="columns">
                                    <div class="column is-6-desktop is-12-mobile">
                                        <a class="button is-danger is-fullwidth is-outlined has-text-weight-bold"
                                            href="{{ route('kriteria-bobot.index') }}">
                                            <i class="fa fa-chevron-left"></i>
                                            &nbsp;
                                            Kembali
                                        </a>
                                    </div>
                                    <div class="column is-6-desktop is-12-mobile">
                                        <button type="submit"
                                            class="button is-info is-fullwidth is-outlined has-text-weight-bold">
                                            <i class="fa fa-save"></i>
                                            &nbsp;
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
