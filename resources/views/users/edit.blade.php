@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Edit user</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update',[$user->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Firstname') }}</label>

                                <div class="col-md-6">
                                    <input id="firstname"
                                           type="text"
                                           class="form-control @error('firstname') is-invalid @enderror"
                                           name="firstname"
                                           value="{{ $user->firstname ?? old('firstname') }}"
                                           required autocomplete="firstname"
                                           autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname"
                                           type="text"
                                           class="form-control @error('lastname') is-invalid @enderror"
                                           name="lastname"
                                           value="{{ $user->lastname ?? old('lastname') }}"
                                           required autocomplete="lastname"
                                           autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ $user->email ?? old('email') }}"
                                           required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number"
                                           type="tel"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           name="phone_number"
                                           value="{{ $user->phone_number ?? old('phone_number') }}"
                                           required autocomplete="phone_number"
                                           autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address"
                                           type="text"
                                           class="form-control @error('address') is-invalid @enderror"
                                           name="address"
                                           value="{{ $user->address ?? old('address') }}"
                                           required autocomplete="address"
                                           autofocus>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city"
                                           type="text"
                                           class="form-control @error('city') is-invalid @enderror"
                                           name="city"
                                           value="{{ $user->city ?? old('city') }}"
                                           required autocomplete="city"
                                           autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger">Abort</a>
                                    <button type="submit"
                                            class="btn btn-primary"
                                    onclick="return confirm('Are you sure you want to edit this user?')">
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
@endsection
