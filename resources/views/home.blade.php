@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6-dekstop is-12-mobile">
                    <div class="card has-background-primary">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <div class="columns is-vcentered">
                                        <div class="column is-narrow">
                                            <span class="icon is-size-4">
                                                <i class="fas fa-users"></i>
                                            </span>
                                        </div>
                                        <div class="column">
                                            <div class="content">
                                                <p class="title is-3">Jumlah Nasabah</p>
                                                <p class="subtitle is-4">{{ $nasabah['total'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6-dekstop is-12-mobile">
                    <div class="card has-background-info">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <div class="columns is-vcentered">
                                        <div class="column is-narrow">
                                            <span class="icon is-size-4">
                                                <i class="fas fa-users"></i>
                                            </span>
                                        </div>
                                        <div class="column">
                                            <div class="content">
                                                <p class="title is-3">Jumlah Nasabah Terverifikasi</p>
                                                <p class="subtitle is-4">0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
