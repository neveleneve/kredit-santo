@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title has-text-weight-bold">
                                Tambah Data Penilaian
                            </p>
                        </div>
                        <div class="card-content">
                            <form class="content" action="{{ route('penilaian.store') }}" method="POST">
                                @csrf
                                <div class="field">
                                    <label for="rumah" class="label has-text-weight-bold">Rumah</label>
                                    <div class="control @error('rumah') has-icons-left @enderror">
                                        <div class="select is-fullwidth @error('rumah') is-danger @enderror">
                                            <select id="rumah" name="rumah">
                                                <option value="">Pilih Rumah</option>
                                                @foreach ($rumah as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('rumah') == $item->id ? 'selected' : null }}>
                                                        {{ $item->rumah_code }} | {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('rumah')
                                            <span class="icon is-small is-right has-text-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="has-text-weight-bold has-text-danger">
                                                * {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="nasabah" class="label has-text-weight-bold">Nasabah</label>
                                    <div class="control @error('nasabah') has-icons-left @enderror">
                                        <div class="select is-fullwidth @error('nasabah') is-danger @enderror">
                                            <select id="nasabah" name="nasabah">
                                                <option value="">Pilih Nasabah</option>
                                                @foreach ($nasabah as $item)
                                                    <option {{ old('nasabah') == $item->id ? 'selected' : null }}
                                                        value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('nasabah')
                                            <span class="icon is-small is-right has-text-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="has-text-weight-bold has-text-danger">
                                                * {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="dp" class="label has-text-weight-bold">Rentang Uang Muka</label>
                                    <div class="control @error('dp') has-icons-left @enderror">
                                        <div class="select is-fullwidth @error('dp') is-danger @enderror">
                                            {{-- uang muka (c2 wp) --}}
                                            <select id="dp" name="dp">
                                                <option value="">Pilih Rentang Uang Muka</option>
                                                <option value="20" {{ old('dp') == 20 ? 'selected' : null }}>Dibawah
                                                    15% dari harga</option>
                                                <option value="30" {{ old('dp') == 30 ? 'selected' : null }}>16% - 20%
                                                    dari harga</option>
                                                <option value="40" {{ old('dp') == 40 ? 'selected' : null }}>21% - 25%
                                                    dari harga</option>
                                                <option value="80" {{ old('dp') == 80 ? 'selected' : null }}>26% - 30%
                                                    dari harga</option>
                                                <option value="100" {{ old('dp') == 100 ? 'selected' : null }}>Diatas
                                                    30% dari harga</option>
                                            </select>
                                        </div>
                                        @error('dp')
                                            <span class="icon is-small is-right has-text-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="has-text-weight-bold has-text-danger">
                                                * {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="tenor" class="label has-text-weight-bold">Tenor Pembayaran</label>
                                    <div class="control @error('tenor') has-icons-left @enderror">
                                        <div class="select is-fullwidth @error('tenor') is-danger @enderror">
                                            <select id="tenor" name="tenor">
                                                <option value="">Pilih Tenor Pembayaran</option>
                                                <option value="10" {{ old('tenor') == 10 ? 'selected' : null }}>10
                                                    Tahun</option>
                                                <option value="15" {{ old('tenor') == 15 ? 'selected' : null }}>15
                                                    Tahun</option>
                                                <option value="20" {{ old('tenor') == 20 ? 'selected' : null }}>20
                                                    Tahun</option>
                                            </select>
                                        </div>
                                        @error('tenor')
                                            <span class="icon is-small is-right has-text-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="has-text-weight-bold has-text-danger">
                                                * {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="bi" class="label has-text-weight-bold">Status BI Checking</label>
                                    <div class="control @error('bi') has-icons-left @enderror">
                                        <div class="select is-fullwidth @error('bi') is-danger @enderror">
                                            <select id="bi" name="bi">
                                                <option value="">Pilih Status BI Checking</option>
                                                <option value="100" {{ old('bi') == 100 ? 'selected' : null }}>Skor 1
                                                </option>
                                                <option value="80" {{ old('bi') == 80 ? 'selected' : null }}>Skor 2
                                                </option>
                                                <option value="40" {{ old('bi') == 40 ? 'selected' : null }}>Skor 3
                                                </option>
                                                <option value="30" {{ old('bi') == 30 ? 'selected' : null }}>Skor 4
                                                </option>
                                                <option value="20" {{ old('bi') == 20 ? 'selected' : null }}>Skor 5
                                                </option>
                                            </select>
                                        </div>
                                        @error('bi')
                                            <span class="icon is-small is-right has-text-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="has-text-weight-bold has-text-danger">
                                                * {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column is-6-desktop is-12-mobile">
                                        <a class="button is-danger is-fullwidth has-text-weight-bold"
                                            href="{{ route('rumah.index') }}">
                                            <i class="fa fa-chevron-left"></i>
                                            &nbsp;
                                            Kembali
                                        </a>
                                    </div>
                                    <div class="column is-6-desktop is-12-mobile">
                                        <button type="submit" class="button is-info is-fullwidth has-text-weight-bold">
                                            <i class="fa fa-save"></i>
                                            &nbsp;
                                            Simpan
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
