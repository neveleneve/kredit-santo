@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title has-text-weight-bold">
                                Tambah Data Rumah
                            </p>
                        </div>
                        <div class="card-content">
                            <form class="content" action="{{ route('rumah.store') }}" method="POST">
                                @csrf
                                <div class="field">
                                    <label for="nama" class="label has-text-weight-bold">Nama</label>
                                    <div class="control @error('nama') has-icons-left @enderror">
                                        <input type="text" class="input @error('nama') is-danger @enderror"
                                            placeholder="Nama Rumah" id="nama" name="nama"
                                            value="{{ old('nama') }}">
                                        @error('nama')
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
                                    <label for="tipe" class="label has-text-weight-bold">Tipe Rumah</label>
                                    <div class="control @error('tipe') has-icons-left @enderror">
                                        <div class="select is-fullwidth @error('tipe') is-danger @enderror">
                                            <select id="tipe" name="tipe">
                                                <option value="">Pilih Tipe Rumah</option>
                                                <option value="36" {{ old('tipe') == 36 ? 'selected' : null }}>36
                                                </option>
                                                <option value="45" {{ old('tipe') == 45 ? 'selected' : null }}>45
                                                </option>
                                                <option value="72" {{ old('tipe') == 72 ? 'selected' : null }}>72
                                                </option>
                                            </select>
                                        </div>
                                        @error('tipe')
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
                                    <label for="tanah" class="label has-text-weight-bold">Luas Tanah
                                        (m<sup>2</sup>)</label>
                                    <div class="control @error('tanah') has-icons-left @enderror">
                                        <input type="text" class="input @error('tanah') is-danger @enderror"
                                            placeholder="Luas Tanah" id="tanah" name="tanah"
                                            value="{{ old('tanah') }}">
                                        @error('tanah')
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
                                    <label for="harga" class="label has-text-weight-bold">Harga (Rp)</label>
                                    <div class="control @error('harga') has-icons-left @enderror">
                                        <input type="number" class="input @error('harga') is-danger @enderror"
                                            placeholder="Harga" id="harga" name="harga" value="{{ old('harga') }}">
                                        @error('harga')
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
                                    <label for="detail" class="label has-text-weight-bold">Detail Rumah</label>
                                    <div class="control">
                                        <textarea name="detail" id="detail" cols="30" rows="10" placeholder="Detail Rumah"
                                            class="textarea @error('detail') is-danger @enderror">{{ old('detail') }}</textarea>
                                        @error('detail')
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
