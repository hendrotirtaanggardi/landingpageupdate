@extends('layouts.app')

@section('content')
				@livewire('talent-index', ['content' => $content])
@endsection

@section('custom_scripts')
				<script src="{{ asset('js/custom.js') }}"></script>
@endsection
