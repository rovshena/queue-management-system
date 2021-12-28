@extends('layouts.visitor.app')

@section('content')
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center min-vh-100">
                <div class="col-6 text-center">
                    <queue-messages :messages="messages"></queue-messages>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page.js')
    <script src="{{ mix('assets/js/app.js') }}"></script>
@endpush
