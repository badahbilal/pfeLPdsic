@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nomClient" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control @error('nomClient') is-invalid @enderror"
                                       name="nomClient" value="{{ old('nomClient') }}"
                                       required autocomplete="name" autofocus>

                                @error('nomClient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenomClient" class="col-md-4 col-form-label text-md-right">Prénom</label>

                            <div class="col-md-6">
                                <input id="prenomClient" type="text"
                                       class="form-control @error('prenomClient') is-invalid @enderror"
                                       name="prenomClient" value="{{ old('prenomClient') }}"
                                       required autocomplete="name" autofocus>

                                @error('prenomClient')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adrsClient" class="col-md-4 col-form-label text-md-right">Adresse</label>

                            <div class="col-md-6">
                                <input id="adrsClient" type="text"
                                       class="form-control @error('adrsClient') is-invalid @enderror"
                                       name="adrsClient" value="{{ old('adrsClient') }}"
                                       required autocomplete="adrsClient" autofocus>

                                @error('prenomClient')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teleClient" class="col-md-4 col-form-label text-md-right">Téléphone</label>

                            <div class="col-md-6">
                                <input pattern="(0|\\+212|00212)(6|7)[0-9]{8}" placeholder="(0|+212|00212)(6|7)XXXXXXXX" id="teleClient" type="tel"
                                       class="form-control @error('teleClient') is-invalid @enderror"
                                       name="teleClient" value="{{ old('teleClient') }}"
                                       required autocomplete="name" autofocus>

                                @error('prenomClient')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateNaissClient" class="col-md-4 col-form-label text-md-right">Date de naissance</label>

                            <div class="col-md-6">
                                <input id="dateNaissClient" type="date"
                                       class="form-control @error('dateNaissClient') is-invalid @enderror"
                                       name="dateNaissClient" value="{{ old('dateNaissClient') }}"
                                       required autocomplete="name" autofocus>

                                @error('prenomClient')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmer Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
