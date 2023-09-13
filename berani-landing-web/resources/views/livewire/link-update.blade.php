<div>
				@foreach ($links as $link)
								<form action="" wire:submit.prevent="updateLink">
												<div class="row my-5">

																<div class="col-md-10 fv-row">
																				<label class="fs-5 fw-bold mb-2">
																								🔗 {{ $link->name }}
																				</label>
																				<input wire:model="{{ $link }}-1" type="text"
																								class="form-control form-control-solid @error('addressLink') is-invalid @enderror"
																								placeholder="Link Address..." />
																				@error('addressLink')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror
																</div>

																<div class="col-md-2 d-flex align-items-end">
																				<button class="btn btn-warning text-dark">Edit</button>
																</div>
												</div>
								</form>
				@endforeach

</div>
