<div class="card">
				<div class="card-body p-lg-17">
								<div wire:ignore>
												<div class="position-relative mb-17">
																<div class="overlay overlay-show">
																				<div id="bg-main" class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px">
																				</div>
																				<div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
																</div>
																<div class="position-absolute text-white mb-8 ms-10 bottom-0">
																				<h3 class="text-white fs-2qx fw-bolder mb-3 m">
																								{{ __('🔎 Find Talent') }}
																				</h3>
																				<div class="fs-5 fw-bold">
																								{{ __('You can find suitable talent and contact them here!') }}
																				</div>
																</div>
												</div>
								</div>

								<div class="d-flex flex-column flex-lg-row mb-17">
												<div class="flex-lg-row-fluid me-0">
													<div class="row">
														<div class="col-sm-2 mb-3">
																<div class="card bg-light">
																	<div class="card-body text-center">
																		<h5 class="card-title">Talent</h5>
																		<p class="card-text">{{ $talents->count() }}</p>
																	</div>
																</div>
														</div>
														<div class="col-sm-2 mb-3">
															<div class="card bg-light">
																<div class="card-body text-center">
																	<h5 class="card-title">Programming Languages</h5>
																	<p class="card-text">{{ $programmingLanguages->count() }}</p>
																</div>
															</div>
														</div>
														<div class="col-sm-2 mb-3">
															<div class="card bg-light">
																<div class="card-body text-center">
																	<h5 class="card-title">Framework Libraries</h5>
																	<p class="card-text">{{ $frameworkLibraries->count() }}</p>
																</div>
															</div>
														</div>
														<div class="col-sm-2 mb-3">
															<div class="card bg-light">
																<div class="card-body text-center">
																	<h5 class="card-title">Tools</h5>
																	<p class="card-text">{{ $tools->count() }}</p>
																</div>
															</div>
														</div>
														<div class="col-sm-2 mb-3">
															<div class="card bg-light">
																<div class="card-body text-center">
																	<h5 class="card-title">Files</h5>
																	<p class="card-text">{{ $files->count() }}</p>
																</div>
															</div>
														</div>
														<div class="col-sm-2 mb-3">
															<div class="card bg-light">
																<div class="card-body text-center">
																	<h5 class="card-title">Content</h5>
																	<p class="card-text">{{ $content->count() }}</p>
																</div>
															</div>
														</div>
																<div class="row mb-5 text-center">
																				<div class="col-md-12">
																								<a href="{{ route('programming-languages') }}" class="btn btn-primary btn-sm me-3 mb-3">Manage
																												Programming Languages</a>
																								<a href="{{ route('framework-libraries') }}" class="btn btn-primary btn-sm me-3 mb-3">Manage
																												Framework Libraries</a>
																								<a href="{{ route('tools') }}" class="btn btn-primary btn-sm me-3 mb-3">Manage Tools</a>
																								<a href="{{ route('files') }}" class="btn btn-primary btn-sm me-3 mb-3">Manage Files</a>
																								<a href="/maincontents" class="btn btn-primary btn-sm me-3 mb-3">Manage Content</a>
																				</div>
																</div>
																<div class="row mb-5">
																				<div class="col-md-4 mb-3">
																								<div class="d-flex align-items-center position-relative">
																												<span class="svg-icon svg-icon-1 position-absolute ms-6">
																																<i class="fa-solid fa-magnifying-glass"></i>
																												</span>
																												<input type="text" class="form-control form-control-solid ps-15" placeholder="Search"
																																name="keyword" autocomplete="off" wire:model='search' />
																								</div>
																				</div>
																				<div class="col-md-2 mb-3">
																								<div wire:ignore>
																												<select class="form-select form-select-solid" data-control="select2" id="orderBy"
																																data-placeholder="Order by...">
																																<option></option>
																																<option selected value="desc">Newest</option>
																																<option value="asc">Oldest</option>
																												</select>
																								</div>
																				</div>
																				<div class="col-md-2 mb-3">
																								<div wire:ignore>
																												<select class="form-select form-select-solid" data-control="select2" id="paginationNumber"
																																data-placeholder="Pagination Number...">
																																<option></option>
																																<option selected value="10">10</option>
																																@for ($i = 15; $i <= 50; $i = $i + 5)
																																				<option value="{{ $i }}">{{ $i }}</option>
																																@endfor
																												</select>
																								</div>
																				</div>
																</div>
																<div class="row mb-5">
																				<div class="col-md-4 mb-3">
																								<div wire:ignore>
																									<select class="form-select form-select-solid" id="filterByProgrammingLanguage"
																																data-control="select2" data-placeholder="Filter by Programming Languages..."
																																data-allow-clear="true" multiple="multiple">
																																<option></option>
																																@foreach ($programmingLanguages as $item)
																																				<option value="{{ $item->id }}">{{ $item->name }}</option>
																																@endforeach

																												</select>
																								</div>
																				</div>
																				<div class="col-md-4 mb-3">
																								<div wire:ignore>
																												<select class="form-select form-select-solid" data-control="select2"
																																id="filterByFrameworkLibrary" data-placeholder="Filter by Framework Libraries..."
																																data-allow-clear="true" multiple="multiple">
																																<option></option>
																																@foreach ($frameworkLibraries as $item)
																																				<option value="{{ $item->id }}">{{ $item->name }}</option>
																																@endforeach
																												</select>
																								</div>
																				</div>
																				<div class="col-md-4 mb-3">
																								<div wire:ignore>
																												<select class="form-select form-select-solid" data-control="select2" id="filterByTool"
																																data-placeholder="Filter by Tools..." data-allow-clear="true" multiple="multiple">
																																<option></option>
																																@foreach ($tools as $item)
																																				<option value="{{ $item->id }}">{{ $item->name }}</option>
																																@endforeach
																												</select>
																								</div>
																				</div>
																</div>
																<div class="row">
																				<div class="col-md-12">
																								<div class="table-responsive mb-15 border">
																												<table class="table table-row-bordered gy-7 gs-7" wire:poll.keep-alive>
																																<thead>
																																				<tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
																																								<th>No.</th>
																																								<th>Name</th>
																																								<th>Email</th>
																																								<th></th>
																																				</tr>
																																</thead>
																																<tbody>
																																				@forelse ($talents as $talent)
																																								<tr>
																																												<td>{{ ($talents->currentPage() - 1) * $talents->perPage() + $loop->iteration }}
																																												</td>
																																												<td>{{ $talent->name }}</td>
																																												<td>{{ $talent->email }}</td>
																																												<td class="text-end">
																																																<button class="btn btn-primary btn-sm"
																																																				wire:click="redirectToTalent({{ $talent->id }})">
																																																				Detail
																																																</button>
																																												</td>
																																								</tr>
																																				@empty
																																								<tr>
																																												<td colspan="4">
																																																<div class="text-center">
																																																				<h3 class="text-gray-800">
																																																								{{ __('No talents found!') }}
																																																				</h3>
																																																</div>
																																												</td>
																																								</tr>
																																				@endforelse
																																</tbody>
																												</table>
																								</div>
																				</div>
																</div>
																<div class="d-flex justify-content-center my-3">
																				{{ $talents->links() }}
																</div>
												</div>
								</div>
				</div>
</div>

@push('scripts')
				<script>
								$(document).ready(function() {
												$('#filterByProgrammingLanguage').on('change', function(e) {
																@this.set('filterByProgrammingLanguage', JSON.stringify($('#filterByProgrammingLanguage')
																				.select2("val")));
												});
								});
								$(document).ready(function() {
												$('#filterByFrameworkLibrary').on('change', function(e) {
																@this.set('filterByFrameworkLibrary', JSON.stringify($('#filterByFrameworkLibrary').select2(
																				"val")));
												});
								});
								$(document).ready(function() {
												$('#filterByTool').on('change', function(e) {
																@this.set('filterByTool', JSON.stringify($('#filterByTool').select2("val")));
												});
								});
								$(document).ready(function() {
												$('#orderBy').on('change', function(e) {
																@this.set('orderBy', $('#orderBy').select2("val"));
												});
								});
								$(document).ready(function() {
												$('#paginationNumber').on('change', function(e) {
																@this.set('paginationNumber', $('#paginationNumber').select2("val"));
												});
								});
				</script>
@endpush
