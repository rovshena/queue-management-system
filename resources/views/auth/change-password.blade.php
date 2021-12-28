@extends('layouts.admin.app')

@section('title', __('Parol çalyşmak'))

@php
    $breadcrumbs[] = ['label' => __('Baş sahypa'), 'url' => route('admin.index')];
    $breadcrumbs[] = ['label' => __('Parol çalyşmak')];
@endphp

@section('content')
    <header class="page-title-bar">
        @include('plugins.breadcrumb', ['breadcrumbs' => $breadcrumbs])
        <h1 class="page-title text-truncate">
            <i class="fas fa-key fa-fw mr-2 text-muted"></i>
            {{ __('Parol çalyşmak') }}
        </h1>
    </header>
    <div class="page-section">
        <div class="section-block">
            <div class="card card-body">
                <form method="post" action="{{ route('admin.change-password.update') }}" onsubmit="disableSubmitButton();">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current_password">
                            {{ __('Häzirki parol') }} <abbr title="{{ __('Hökman doldurmaly') }}">*</abbr>
                        </label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required autofocus>
                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">
                            {{ __('Täze parol') }} <abbr title="{{ __('Hökman doldurmaly') }}">*</abbr>
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
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center" id="submit-button">
                            <span id="loading" class="spinner-border spinner-border-sm d-none mr-2" role="status" aria-hidden="true"></span>
                            {{ __('Üýtgetmek') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
