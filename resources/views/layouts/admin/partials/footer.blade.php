<footer class="app-footer">
	<div class="copyright">
		&copy;
		@if (date('Y')==2021)
		2021
		@else
		2021 - {{ date('Y') }}
		@endif
        &nbsp;
		{{ __('Ähli hukuklary goralan.') }}
	</div>
</footer>
