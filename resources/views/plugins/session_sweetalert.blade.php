@if (session()->has('success'))
    <script>
        swal.fire({
            title: "{{ __('Üstünlikli!') }}",
            text: "{{ session('success') }}",
            type: "success"
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        swal.fire({
            title: "{{ __('Näsazlyk!') }}",
            text: "{{ session('error') }}",
            type: "error"
        });
    </script>
@endif

@if (session()->has('info'))
    <script>
        swal.fire({
            title: "{{ __('Üns beriň!') }}",
            text: "{{ session('info') }}",
            type: "info"
        });
    </script>
@endif

@if ($errors->any())
    <script>
        swal.fire({
            title: "{{ __('Näsazlyk!') }}",
            text: "{{ implode(" ", $errors->all()) }}",
            type: "error"
        });
    </script>
@endif
