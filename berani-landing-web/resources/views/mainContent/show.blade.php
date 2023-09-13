@php
				use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('custom_styles')
				<style>
								trix-editor,
								trix-toolbar {
												pointer-events: none;

								}

								trix-editor {
												background-color: rgb(238, 238, 238);
								}
				</style>
@endsection

@section('content')
				<div class="card border border-primary">
								<div class="card-body">
												<blockquote class="blockquote mb-0">
																<p class="fs-2 fw-bolder text-center">Main Content {{ $maincontent->id }}</p>
												</blockquote>
												<p class="text-center fs-4 mt-5">
																<small class="text-center">Last updated
																				{{ Carbon::parse($maincontent->updated_at)->diffForHumans() }}</small>
												</p>
								</div>
				</div>

				<form action="/maincontents/{{ $maincontent->id }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-success" role="alert">
																				<h2 class="text-center" style="font-weight: 700">What is this main content talking about?</h2>
																</div>

																<div class="input-group mb-3">
																				<input type="text"
																								class="form-control border-2 opacity-100 border-secondary @error('about') border-1 border-danger is-invalid @enderror"
																								placeholder="You can give a little taste here..." value="{{ old('about', $maincontent->about) }}"
																								name="about" disabled>
																</div>
												</div>
								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-success" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Header</h2>
																</div>

																<input id="header" type="hidden" name="contentHeader"
																				value="{{ old('contentHeader', $maincontent->contentHeader) }}"
																				class="@error('contentHeader') border-1 border-danger is-invalid @enderror">
																<trix-editor input="header"></trix-editor>
												</div>
								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-primary" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Main</h2>
																</div>

																<input id="main" type="hidden" name="contentMain"
																				value="{{ old('contentMain', $maincontent->contentMain) }}"
																				class="@error('contentMain') border-1 border-danger is-invalid @enderror">
																<trix-editor input="main"></trix-editor>
												</div>

								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-danger" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Footer</h2>
																</div>

																<input id="footer" type="hidden" name="contentFooter"
																				value="{{ old('contentFooter', $maincontent->contentFooter) }}"
																				class="@error('contentFooter') border-1 border-danger is-invalid @enderror">
																<trix-editor input="footer"></trix-editor>
												</div>

								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">
																<div class="alert alert-warning" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Image</h2>
																</div>

																<div class="card">
																				<img src="{{ asset($maincontent->image) }}" class="card-img-top w-100" alt="{{ $maincontent->about }}"
																								style="max-height: 400px;">
																</div>

												</div>
								</div>

								<a href="/maincontents/{{ $maincontent->id }}/edit" class="btn btn-warning text-dark my-5">Edit Content</a>

				</form>
@endsection
