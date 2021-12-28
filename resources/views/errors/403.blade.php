@extends('errors::minimal')

@section('title', __('Size gadagan edilen!'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Size gadagan edilen!'))
