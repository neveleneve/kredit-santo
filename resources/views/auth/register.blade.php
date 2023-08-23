@extends('layouts.app')

@section('content')
    <div class="uk-flex uk-flex-center uk-margin-medium-top uk-text-center" uk-grid>
        <form class="uk-card uk-card-body uk-width-1-2 uk-border-rounded uk-box-shadow-medium" method="POST"
            action="{{ route('register') }}">
            <h2 class="uk-text-bold">Daftar</h2>
            @if (count($errors) > 0)
                <div class="uk-alert-primary" uk-alert>
                    <ul class="uk-list">
                        @foreach ($errors->all() as $message)
                            <li class="uk-text-secondary">{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <label for="name" class="uk-text-bold">Nama</label>
            <input class="uk-input uk-margin-medium-bottom uk-margin-small-top @error('name') uk-form-danger @enderror"
                type="text" name="name" id="name" value="{{ old('name') }}" required>
            <label for="email" class="uk-text-bold">Alamat E-mail</label>
            <input class="uk-input uk-margin-medium-bottom uk-margin-small-top @error('email') uk-form-danger @enderror"
                type="text" name="email" id="email" value="{{ old('email') }}" required>
            <label for="password" class="uk-text-bold">Kata Sandi</label>
            <input class="uk-input uk-margin-medium-bottom uk-margin-small-top @error('password') uk-form-danger @enderror"
                type="password" name="password" id="password" required>
            <label for="password_confirmation" class="uk-text-bold">Konfirmasi Kata Sandi</label>
            <input class="uk-input uk-margin-medium-bottom uk-margin-small-top" type="password" name="password_confirmation"
                id="password_confirmation" required>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-text-bold">Daftar</button>
        </form>
    </div>
@endsection
