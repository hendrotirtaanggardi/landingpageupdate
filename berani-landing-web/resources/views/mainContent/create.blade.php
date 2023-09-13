@php
				use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('content')
				<div class="alert alert-info mb-5" role="alert">
								<h2 style="font-weight: 700" class="text-center">Create new Main Content</h2>
				</div>

				<hr class="border border-secondary border-3 opacity-100 my-5">

				<form action="/maincontents" method="POST" enctype="multipart/form-data">
								@csrf

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-success" role="alert">
																				<h2 class="text-center" style="font-weight: 700">What is this main content talking about?</h2>
																</div>

																<div class="input-group mb-3">
																				<input type="text"
																								class="form-control border-2 opacity-100 border-secondary @error('about') border-1 border-danger is-invalid @enderror"
																								placeholder="You can give a little taste here..." value="{{ old('about') }}" name="about">

																</div>

																@error('about')
																				<div class="text-danger">
																								{{ $message }}
																				</div>
																@enderror

												</div>
								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-success" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Header</h2>
																</div>

																<input id="header" type="hidden" name="contentHeader" value="{{ old('contentHeader') }}"
																				class="@error('about') border-1 border-danger is-invalid @enderror">
																<trix-editor input="header"></trix-editor>
												</div>

												@error('contentHeader')
																<div class="text-danger">
																				{{ $message }}
																</div>
												@enderror
								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-primary" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Main</h2>
																</div>

																<input id="main" type="hidden" name="contentMain" value="{{ old('contentMain') }}"
																				class="@error('about') border-1 border-danger is-invalid @enderror">
																<trix-editor input="main"></trix-editor>
												</div>

												@error('contentMain')
																<div class="text-danger">
																				{{ $message }}
																</div>
												@enderror
								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">

																<div class="alert alert-danger" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Footer</h2>
																</div>

																<input id="footer" type="hidden" name="contentFooter" value="{{ old('contentFooter') }}"
																				class="@error('about') border-1 border-danger is-invalid @enderror">
																<trix-editor input="footer"></trix-editor>
												</div>

												@error('contentFooter')
																<div class="text-danger">
																				{{ $message }}
																</div>
												@enderror
								</div>

								<div class="row my-5">
												<div class="col-sm-12 my-5">
																<div class="alert alert-warning" role="alert">
																				<h2 class="text-center" style="font-weight: 700">Content Image</h2>
																</div>

																<input class="form-control fs-4" type="file" id="formFile" name="image" value="{{ old('image') }}"
																				class="@error('about') border-1 border-danger is-invalid @enderror">

																@error('image')
																				<div class="text-danger">
																								{{ $message }}
																				</div>
																@enderror
												</div>
								</div>

								<button type="submit" class="btn btn-primary my-5">Submit</button>
				</form>
@endsection
