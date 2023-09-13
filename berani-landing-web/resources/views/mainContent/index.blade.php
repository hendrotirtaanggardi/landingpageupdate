@php
				use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('content')
				@if (session()->has('update'))
								<div class="alert alert-success fs-2" role="alert">
												{{ session('update') }}
								</div>
				@endif

				@if (session()->has('create'))
								<div class="alert alert-success fs-2" role="alert">
												{{ session('create') }}
								</div>
				@endif

				@if (session()->has('delete'))
								<div class="alert alert-success fs-2" role="alert">
												{{ session('delete') }}
								</div>
				@endif

				@if (session()->has('errorDelete'))
								<div class="alert alert-danger fs-2" role="alert">
												{{ session('errorDelete') }}
								</div>
				@endif

				@if (session()->has('errorDeleteContent'))
								<div class="alert alert-danger fs-2" role="alert">
												{{ session('errorDeleteContent') }}
								</div>
				@endif

				@if (session()->has('create_content'))
								<div class="alert alert-success fs-2" role="alert">
												{{ session('create_content') }}
								</div>
				@endif

				@if (session()->has('update_content'))
								<div class="alert alert-success fs-2" role="alert">
												{{ session('update_content') }}
								</div>
				@endif

				@if (session()->has('error'))
								<div class="alert alert-danger fs-2" role="alert">
												{{ session('error') }}
								</div>
				@endif


				<a href="/contents/create" class="btn btn-primary fs-3 mt-5">Create new Content</a>

				<div class="accordion my-5" id="accordionExample">
								<div class="accordion-item">
												<h2 class="accordion-header" id="headingOne">
																<button class="accordion-button fs-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
																				aria-expanded="true" aria-controls="collapseOne">
																				About Sections
																</button>
												</h2>
												<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
																data-bs-parent="#accordionExample">
																<div class="accordion-body fs-4">
																				<table id="example1" class="table table-bordered table-striped p-3">
																								<thead>
																												<tr>
																																<th>#</th>
																																<th>Content ID</th>
																																<th>Content Description</th>
																																<th>Active (Main Content ID)</th>
																																<th>Action</th>
																												</tr>
																								</thead>
																								<tbody>
																												@foreach ($contents as $content)
																																@if ($content->id != 1)
																																				<tr>
																																								<th scope="row">{{ $loop->iteration }}</th>
																																								<td>{{ $content->id }}</td>
																																								<td>{{ $content->about }}</td>
																																								<td>
																																												@if ($content->maincontents->count() > 0)
																																																@foreach ($content->maincontents as $maincontent)
																																																				<a class="btn-primary btn-sm text-light fs-4"
																																																								href="/maincontents/{{ $maincontent->id }}">{{ $maincontent->id }}</a>
																																																@endforeach
																																												@else
																																																there isn't any
																																												@endif
																																								</td>
																																								<td>
																																												<div class="d-flex flex-row gap-2 align-items-center">
																																																<button type="button" class="btn btn-warning text-dark fs-6"
																																																				data-bs-toggle="modal"
																																																				data-bs-target="#edit-content-{{ $content->id }}">
																																																				Edit Content
																																																</button>

																																																<form action="/contents/{{ $content->id }}" method="POST">
																																																				@csrf
																																																				@method('DELETE')

																																																				<button type="submit" class="btn btn-danger"
																																																								onclick="if (!confirm('Are you sure to delete content with ID {{ $content->id }}?')) return false">Delete</button>

																																																</form>
																																												</div>
																																												<!-- Button trigger modal -->


																																												<!-- Modal -->
																																												<div class="modal fade" id="edit-content-{{ $content->id }}" tabindex="-1"
																																																aria-labelledby="exampleModalLabel" aria-hidden="true">
																																																<div class="modal-dialog modal-xl">
																																																				<div class="modal-content">
																																																								<div class="modal-header">
																																																												<h1 class="modal-title fs-3" id="exampleModalLabel">Edit Content
																																																																with ID {{ $content->id }}</h1>
																																																												<button type="button" class="btn-close" data-bs-dismiss="modal"
																																																																aria-label="Close"></button>
																																																								</div>
																																																								<form action="/contents/{{ $content->id }}" method="POST">
																																																												@csrf
																																																												@method('PUT')

																																																												<div class="modal-body">

																																																																<div class="row mb-5">
																																																																				<div class="col-sm-2">
																																																																								<span class="input-group-text">Content ID</span>
																																																																				</div>
																																																																				<div class="col-sm-10">
																																																																								<input type="text" class="form-control"
																																																																												value="{{ $content->id }}" disabled>
																																																																				</div>
																																																																</div>

																																																																<div class="row mb-5">
																																																																				<div class="col-sm-2">
																																																																								<span class="input-group-text">Content About</span>
																																																																				</div>
																																																																				<div class="col-sm-10">
																																																																								<input type="text"
																																																																												class="form-control @error('about') border-1 border-danger is-invalid @enderror"
																																																																												value="{{ old('about', $content->about) }}"
																																																																												name="about">

																																																																								@error('about')
																																																																												<div class="text-danger">
																																																																																{{ $message }}
																																																																												</div>
																																																																								@enderror
																																																																				</div>
																																																																</div>

																																																																<div class="row mb-5">
																																																																				<div class="col-sm-2">
																																																																								<span class="input-group-text">Main Content</span>
																																																																				</div>

																																																																				<div class="col-sm-10">
																																																																								<select class="form-select"
																																																																												aria-label="Default select example"
																																																																												name="maincontent_id">
																																																																												@foreach ($maincontents as $maincontent)
																																																																																@if ($content->id == $maincontent->content_id)
																																																																																				<option selected
																																																																																								value={{ $maincontent->id }}>
																																																																																								{{ $maincontent->about }} (id:
																																																																																								{{ $maincontent->id }})
																																																																																				</option>
																																																																																@else
																																																																																				<option value={{ $maincontent->id }}>
																																																																																								{{ $maincontent->about }} (id:
																																																																																								{{ $maincontent->id }})
																																																																																				</option>
																																																																																@endif
																																																																												@endforeach

																																																																								</select>
																																																																				</div>
																																																																</div>

																																																												</div>
																																																												<div class="modal-footer">
																																																																<button type="submit" class="btn btn-primary fs-5">Save
																																																																				changes</button>
																																																												</div>
																																																								</form>

																																																				</div>
																																																</div>
																																												</div>
																																								</td>
																																				</tr>
																																@endif
																												@endforeach
																								</tbody>
																				</table>
																</div>
												</div>
								</div>
				</div>

				<a href="/maincontents/create" class="btn btn-primary fs-3 mt-5">Create new Main Content</a>

				<div class="accordion" id="accordionTwo">
								<div class="accordion-item">
												<h2 class="accordion-header" id="headingOne">
																<button class="accordion-button fs-3" type="button" data-bs-toggle="collapse"
																				data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
																				All Main Contents
																</button>
												</h2>
												<div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne"
																data-bs-parent="#accordionTwo">
																@foreach ($maincontents as $maincontent)
																				<div class="row my-3">
																								<div class="col-sm-12 my-3">
																												<div class="card">
																																<div class="row g-0">
																																				<div class="col-md-4">
																																								<img src="{{ asset($maincontent->image) }}" class="img-fluid rounded-start"
																																												alt="{{ $maincontent->about }}" style="max-height: 200px; width: 100%">
																																				</div>
																																				<div class="col-md-8">
																																								<div class="card-body">
																																												<h5 class="card-title fs-2">{{ $maincontent->about }}</h5>
																																												<p class="card-text fs-4">
																																																@if ($maincontent->content_id != 1)
																																																				Used for
																																																@endif
																																																"<span
																																																				class="fw-bold fst-italic">{{ $maincontent->content->about }}</span>"
																																												</p>
																																												<p class="card-text">
																																																<small class="text-muted">Last updated
																																																				{{ Carbon::parse($maincontent->updated_at)->diffForHumans() }}
																																																</small>
																																												</p>
																																												<div class="d-flex flex-wrap gap-3">
																																																<a href="/maincontents/{{ $maincontent->id }}"
																																																				class="btn-sm btn-primary text-light" style="cursor: pointer">Take a
																																																				look</a>
																																																<a href="/maincontents/{{ $maincontent->id }}/edit"
																																																				class="btn-sm btn-warning" style="cursor: pointer">Edit Content</a>
																																																<form action="/maincontents/{{ $maincontent->id }}" method="POST">
																																																				@csrf
																																																				@method('DELETE')

																																																				<button type="submit" class="btn-sm btn-danger text-light"
																																																								onclick="if (!confirm('Are you sure to delete main content with ID {{ $maincontent->id }}?')) return false">Delete</button>
																																																</form>
																																												</div>

																																								</div>
																																				</div>
																																</div>
																												</div>
																								</div>
																				</div>
																@endforeach
												</div>
								</div>
				</div>


@endsection

@section('custom_scripts')
@endsection
