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

                                <div class="columns">
                                    <div class="column is-6-desktop is-12-mobile">
                                        <a class="button is-danger is-fullwidth has-text-weight-bold"
                                            href="{{ route('penilaian.index') }}">
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
