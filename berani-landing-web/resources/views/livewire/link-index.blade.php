<div>
				{{-- @livewire('link-update', ['links' => $links]) --}}

				@foreach ($links as $link)
								<div class="row mb-5">
												<div class="col-md-10 fv-row">
																<label class="fs-5 fw-bold mb-2">
																				🔗 {{ $link->name }}
																</label>
																<input type="text" class="form-control form-control-solid @error('linkedin') is-invalid @enderror"
																				value="{{ $link->address }}" disabled />
												</div>
												<div class="col-md-2 fv-row d-flex align-items-end">

																<button class="btn btn-danger" wire:click="delete({{ $link->id }})">Delete</button>
												</div>
								</div>
				@endforeach

				@if (session()->has('store'))
								<div class="alert alert-success" role="alert">
												{{ session('store') }}
								</div>
				@endif

				@if (session()->has('delete'))
								<div class="alert alert-success" role="alert">
												{{ session('delete') }}
								</div>
				@endif

				@livewire('link-create', ['links' => $links])
</div>
