@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="bg-robo">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header text-center">{{ __('Mon Compte') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" required autocomplete="new-password">

                                    @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation nouveau mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editer mes informations') }}
                                    </button>
                                </div>
                            </div>

                            <div>
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                            </div>
                            <div class="card-header text-center mt-4">{{ __('MON ESPACE') }}</div>
                            <div class="row m-4 justify-content-center">

                            <a href="{{ route('surveys.index') }}">
                                <img src="/images/list.png" alt="">
                            </a>

                            <a href="{{ route('surveys.index') }}">
                                <img src="/images/list2.png" alt="">
                            </a>
                        </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
