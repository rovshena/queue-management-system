@extends('layouts.admin.app')

@section('title', __('Ulanyjy goşmak'))

@php
    $breadcrumbs[] = ['label' => __('Baş sahypa'), 'url' => route('admin.index')];
    $breadcrumbs[] = ['label' => __('Ulanyjylar'), 'url' => route('admin.users.index')];
    $breadcrumbs[] = ['label' => __('Ulanyjy goşmak')];
@endphp

@section('content')
    <header class="page-title-bar">
        @include('plugins.breadcrumb', ['breadcrumbs' => $breadcrumbs])
        <h1 class="page-title text-truncate">
            <i class="fas fa-user-friends fa-fw mr-2 text-muted"></i>
            {{ __('Ulanyjy goşmak') }}
        </h1>
    </header>
    <div class="page-section">
        <div class="section-block">
            <div class="card card-body">
                <form method="post" action="{{ route('admin.users.store') }}" onsubmit="disableSubmitButton();">
                    @csrf
                    <div class="form-group">
                        <label for="username">
                            {{ __('Ulanyjy ady') }} <abbr title="{{ __('Hökman doldurmaly') }}">*</abbr>
                        </label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" name="username" required autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">
                            {{ __('Ady') }} <abbr title="{{ __('Hökman doldurmaly') }}">*</abbr>
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">
                            {{ __('Parol') }} <abbr title="{{ __('Hökman doldurmaly') }}">*</abbr>
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">
                            {{ __('Paroly gaýtala') }} <abbr title="{{ __('Hökman doldurmaly') }}">*</abbr>
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm" name="password_confirmation" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gate">
                            {{ __('Gapy') }} <abbr title="{{ __('Hökman doldurmaly') }}">*</abbr>
                        </label>
                        <input type="text" class="form-control @error('gate') is-invalid @enderror" id="gate" value="{{ old('gate') }}" name="gate" required>
                        @error('gate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center" id="submit-button">
                            <span id="loading" class="spinner-border spinner-border-sm d-none mr-2" role="status" aria-hidden="true"></span> {{ __('Ulanyjy goşmak') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
