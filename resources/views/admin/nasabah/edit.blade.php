@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title has-text-weight-bold">
                                Perbarui Data Nasabah
                            </p>
                        </div>
                        <div class="card-content">
                            <form class="content" action="{{ route('nasabah.update', ['nasabah' => $nasabah->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h3 class="has-text-weight-bold has-text-centered">Data Nasabah</h3>
                                <hr>
                                @livewire('edit-nasabah', ['nasabah_id' => $nasabah->id])
                                <div class="columns">
                                    <div class="column is-6-desktop is-12-mobile">
                                        <a class="button is-danger is-fullwidth is-outlined has-text-weight-bold"
                                            href="{{ route('nasabah.index') }}">
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
