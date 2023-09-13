<div>
				<form action="" wire:submit.prevent="storeLink">
								<div class="row mb-5">
												<div class="col-md-5 fv-row">
																<label class="fs-5 fw-bold mb-2">
																				🔗 Add New Link
																</label>
																<input wire:model="nameLink" type="text"
																				class="form-control form-control-solid @error('nameLink') is-invalid @enderror"
																				placeholder="Link Name..." />
																@error('nameLink')
																				<span class="invalid-feedback" role="alert">
																								<strong>{{ $message }}</strong>
																				</span>
																@enderror
												</div>

												<div class="col-md-5 fv-row">
																<label class="fs-5 fw-bold mb-2">
																				Link Address
																</label>
																<input wire:model="addressLink" type="text"
																				class="form-control form-control-solid @error('addressLink') is-invalid @enderror"
																				placeholder="Link Address..." />
																@error('addressLink')
																				<span class="invalid-feedback" role="alert">
																								<strong>{{ $message }}</strong>
																				</span>
																@enderror
												</div>

												<div class="col-md-2 d-flex align-items-end">
																<button class="btn btn-primary">Submit</button>
												</div>
								</div>
				</form>
</div>
