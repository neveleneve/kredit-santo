@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-8-desktop is-12-mobile">
                    <div class="card">
                        <header class="card-header">
                            <h1 class="card-header-title is-centered">
                                Login
                            </h1>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="field">
                                        <label class="label" for="email">Alamat E-mail</label>
                                        <div class="control has-icons-left @error('email') has-icons-right @enderror">
                                            <input class="input" type="email" id="email" name="email"
                                                placeholder="Alamat E-mail" value="{{ old('email') }}">
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            @error('email')
                                                <span class="icon is-small is-right">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                            @enderror
                                        </div>
                                        @error('email')
                                            <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label" for="password">Kata Sandi</label>
                                        <div class="control has-icons-left @error('password') has-icons-right @enderror">
                                            <input class="input" type="password" id="password" name="password"
                                                placeholder="Kata Sandi" value="{{ old('password') }}">
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            @error('password')
                                                <span class="icon is-small is-right">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                            @enderror
                                        </div>
                                        @error('password')
                                            <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-dark is-outlined is-fullwidth has-text-weight-bold">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
