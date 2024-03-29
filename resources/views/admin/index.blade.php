@extends('layouts.admin.app')

@section('title', __('Dolandyryş paneli'))

@section('content')
    <header class="page-title-bar">
        <h1 class="page-title text-truncate">
            <i class="fas fa-home fa-fw mr-2 text-muted"></i>
            {{ __('Dolandyryş paneli') }}
        </h1>
    </header>
    <div class="page-section">
        <div class="section-block">
            {{ __('Dolandyryş paneline hoş geldiňiz!') }}
        </div>
        <div class="section py-5">
            <a href="{{ route('admin.call.next') }}" class="btn btn-primary btn-lg">Raýat kabul etmek</a>
        </div>
    </div>
@endsection
