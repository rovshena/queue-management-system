@extends('layouts.visitor.app')

@section('content')
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center min-vh-100">
                <div class="col text-center">
                    <a href="{{ route('queue.store') }}" class="btn btn-primary p-6 font-weight-bolder" style="height: auto !important">
                        <span style="font-size: 50px;">
                            Nobata ýazylmak üçin basyň!
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
