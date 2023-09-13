<div class="card">

				<div class="card-body p-lg-17">
								<div wire:ignore>
												<div class="position-relative mb-17">
																<div class="overlay overlay-show">
																				<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
																								style="background-image: url('{{ $content->image }}')"></div>
																				<div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
																</div>
																<div class="position-absolute text-white mb-8 ms-10 bottom-0">
																				<div class="fs-4 lh-lg">
																								{!! $content->contentHeader !!}
																				</div>


																				{{-- <h3 class="text-white fs-2qx fw-bolder mb-3 m">
																								{{ __('📄 Your Information Page') }}
																				</h3>
																				<div class="fs-5 fw-bold">
																								{{ __('You can edit your information about personal, skill, and technical here. This information
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																								                        will used by Recruiter to find you project!') }}
																				</div> --}}
																</div>
												</div>
								</div>

								<div class="d-flex flex-column flex-lg-row mb-17">
												<div class="flex-lg-row-fluid me-0 me-lg-20">
																<form action="" class="form mb-15" method="post"
																				wire:submit.prevent="save(Object.fromEntries(new FormData($event.target)))">
																				<input type="hidden" name="{{ base64_encode('id') }}"
																								value="{{ base64_encode(auth()->user()->id) }}" />
																				@if (session()->has('message'))
																								<div class=" row mb-10">
																												<div class="alert alert-success alert-dismissible fade show" role="alert">
																																<p class="h5">
																																				{{ session('message') }}
																																</p>
																																<button type="button" class="btn-close" data-bs-dismiss="alert"
																																				aria-label="Close"></button>
																												</div>
																								</div>
																				@endif
																				@csrf
																				<div class="row mb-5">
																								<div class="separator separator-content border-secondary">
																												<span class="h3">{{ __('Personal') }}</span>
																								</div>
																				</div>
																				<div class="row mb-5">
																								<div class="col-md-12 fv-row">
																												<label class="required fs-5 fw-bold mb-2">
																																{{ __('☑️ Full Name') }}
																												</label>
																												<input wire:model="name" type="text"
																																class="form-control form-control-solid @error('name') is-invalid @enderror"
																																placeholder="" name="name" value="{{ old('name') }}" />
																												@error('name')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror
																								</div>
																				</div>
																				<div class="row mb-5">
																								<div class="col-md-6 fv-row">
																												<label class="required fs-5 fw-bold mb-2">
																																{{ __('📧 Email') }}
																												</label>
																												<input wire:model="email"
																																class="form-control form-control-solid @error('email') is-invalid @enderror"
																																name="email" value="{{ old('email') }}" disabled />
																												@error('email')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror
																								</div>
																								<div class="col-md-6 fv-row">
																												<label class="fs-5 fw-bold mb-2">
																																{{ __('📱 Phone Number') }}
																												</label>
																												<input wire:model="phone_number" type="text"
																																class="@error('phone_number') is-invalid @enderror form-control form-control-solid"
																																name="phone_number" value="{{ old('phone_number') }}"
																																oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
																												@error('phone_number')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror
																								</div>
																				</div>
																				<div class="row mb-5">
																								<div class="col-md-6 fv-row">
																												<label class="fs-5 fw-bold mb-2">
																																{{ __('🚩 Country') }}
																												</label>
																												<input wire:model="country" type="text"
																																class=" @error('country') is-invalid @enderror form-control form-control-solid"
																																name="country" value="{{ old('country') }}" />
																												@error('country')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror
																								</div>
																								<div class="col-md-6 fv-row">
																												<label class="fs-5 fw-bold mb-2">
																																{{ __('🏙️ City') }}
																												</label>
																												<input wire:model="city" type="text"
																																class=" @error('city') is-invalid @enderror form-control form-control-solid"
																																name="city" value="{{ old('city') }}" />
																												@error('city')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror
																								</div>
																				</div>

																				<div class="row mt-15 mb-5">
																								<div class="separator separator-content border-secondary">
																												<span class="h3">{{ __('Technologies') }}</span>
																								</div>
																				</div>
																				<div class="d-flex flex-column mb-5 fv-row">
																								<label class="d-flex align-items-center fs-5 fw-bold mb-2">
																												<span>
																																{{ __('👨‍💻️ Programming Languages') }}
																												</span>
																												<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
																																title="{{ __('Type and Hit Enter for Programming Languages that you master.') }}"></i>
																								</label>
																								<div wire:ignore>
																												<textarea id="programming_languages" class="form-control form-control form-control-solid" data-kt-autosize="true"
																												    name="programming_languages">
@if (auth()->user()->programming_languages ?? false)
@foreach (auth()->user()->programming_languages as $item)
@if (
				$item->programming_language->id ==
								auth()->user()->programming_languages->last()->programming_language->id)
{{ $item->programming_language->name }}@else{{ $item->programming_language->name . ',' }}
@endif
@endforeach
@endif
</textarea>
																								</div>
																				</div>
																				<div class="d-flex flex-column mb-5 fv-row">
																								<label class="d-flex align-items-center fs-5 fw-bold mb-2">
																												<span>
																																{{ __('📦 Frameworks or Libraries') }}
																												</span>
																												<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
																																title="{{ __('Type and Hit Enter for Frameworks or Libraries that you master.') }}"></i>
																								</label>
																								<div wire:ignore>
																												<textarea id="framework_libraries" class="form-control form-control form-control-solid" data-kt-autosize="true"
																												    name="framework_libraries">
@if (auth()->user()->framework_libraries ?? false)
@foreach (auth()->user()->framework_libraries as $item)
@if (
				$item->framework_library->id ==
								auth()->user()->framework_libraries->last()->framework_library->id)
{{ $item->framework_library->name }}@else{{ $item->framework_library->name . ',' }}
@endif
@endforeach
@endif
</textarea>
																								</div>
																				</div>
																				<div class="d-flex flex-column mb-5 fv-row">
																								<label class="d-flex align-items-center fs-5 fw-bold mb-2">
																												<span>
																																{{ __('🧰 Tools') }}
																												</span>
																												<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
																																title="{{ __('Type and Hit Enter for Tools that you master.') }}"></i>
																								</label>
																								<div wire:ignore>
																												<textarea id="tools" class="form-control form-control form-control-solid" data-kt-autosize="true"
																												    name="tools">
@if (auth()->user()->tools ?? false)
@foreach (auth()->user()->tools as $item)
@if (
				$item->tool->id ==
								auth()->user()->tools->last()->tool->id)
{{ $item->tool->name }}@else{{ $item->tool->name . ',' }}
@endif
@endforeach
@endif
</textarea>
																								</div>
																				</div>
																				<div class="d-flex flex-column mb-5 fv-row">
																								<label class="d-flex align-items-center fs-5 fw-bold mb-2">
																												<span>
																																{{ __('📁 Files') }}
																												</span>
																												<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
																																title="{{ __('Upload your CV, Portfolio, etc.') }}"></i>
																								</label>
																								<div wire:ignore>
																												<div class="dropzone" id="kt_dropzonejs">
																																<div class="dz-message needsclick">
																																				<i class="fa-solid fa-file-arrow-up text-primary fs-3x"></i>
																																				<div class="ms-4">
																																								<h3 class="fs-5 fw-bolder text-gray-900 mb-1">
																																												{{ __('Drop files here or click
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																												                                            to upload (PDF, PNG, JPEG).') }}
																																								</h3>
																																								<span class="fs-7 fw-bold text-gray-400">
																																												{{ __('Upload up to 10 files') }}
																																								</span>
																																				</div>
																																</div>
																												</div>
																								</div>
																				</div>

																				<div class="row mt-15 mb-5">
																								<div class="separator separator-content border-secondary">
																												<span class="h3">{{ __('Links') }}</span>
																								</div>
																				</div>
																				<div class="row mb-5">
																								<div class="col-md-12 fv-row">
																												<label class="fs-5 fw-bold mb-2">
																																{{ __('🔗 LinkedIn') }}
																												</label>
																												<input wire:model="linkedin" type="text"
																																class="form-control form-control-solid @error('linkedin') is-invalid @enderror"
																																placeholder="" name="linkedin" value="{{ old('linkedin') }}" />
																												@error('linkedin')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror
																								</div>
																				</div>
																				<div class="row mb-5">
																								<div class="col-md-12 fv-row">
																												<label class="fs-5 fw-bold mb-2">
																																{{ __('🔗 GitHub') }}
																												</label>
																												<input wire:model="github" type="text"
																																class="form-control form-control-solid @error('github') is-invalid @enderror"
																																placeholder="" name="github" value="{{ old('github') }}" />
																												@error('github')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror
																								</div>
																				</div>

																				<button type="Submit" class="btn btn-primary">
																								Save
																				</button>
																</form>

																<div class="row mt-15 mb-5">
																				<div class="separator separator-content border-secondary">
																								<span class="h3">Other Links</span>
																				</div>
																</div>

																<br>

																@livewire('link-index', ['links' => $links])

																<div class="separator border-4 my-10"></div>

																<div class="mb-10 mb-lg-0">
																				<div class="m-0">
																								<div class="fs-4 lh-lg">
																												{!! $content->contentFooter !!}
																								</div>


																								{{-- <h4 class="fs-1 text-gray-800 w-bolder mb-6">
																												{{ __('📝 Guidance Detail') }}
																								</h4>
																								<p class="fw-bold fs-4 text-gray-600 mb-2">
																												{{ __('We will offer you a project if we have a suitable project base on your information.
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																				                            We will contact you via email or your phone number. It might take a while.') }}
																								</p> --}}
																				</div>
																				{{-- <div class="m-0">
																								<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse"
																												data-bs-target="#kt_job_3_1">
																												<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																																<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
																																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																								viewBox="0 0 24 24" fill="none">
																																								<rect opacity="0.3" x="2" y="2" width="20"
																																												height="20" rx="5" fill="currentColor" />
																																								<rect x="6.0104" y="10.9247" width="12" height="2"
																																												rx="1" fill="currentColor" />
																																				</svg>
																																</span>
																																<span class="svg-icon toggle-off svg-icon-1">
																																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																								viewBox="0 0 24 24" fill="none">
																																								<rect opacity="0.3" x="2" y="2" width="20"
																																												height="20" rx="5" fill="currentColor" />
																																								<rect x="10.8891" y="17.8033" width="12" height="2"
																																												rx="1" transform="rotate(-90 10.8891 17.8033)"
																																												fill="currentColor" />
																																								<rect x="6.01041" y="10.9247" width="12" height="2"
																																												rx="1" fill="currentColor" />
																																				</svg>
																																</span>
																												</div>
																												<h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">
																																{{ __('What is the minimum requirements?') }}
																												</h4>
																								</div>
																								<div id="kt_job_3_1" class="collapse show fs-6 ms-1">
																												<div class="mb-4">
																																<div class="d-flex align-items-center ps-10 mb-n1">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Experience with at least one programming languages.') }}
																																				</div>
																																</div>
																												</div>
																												<div class="mb-4">
																																<div class="d-flex align-items-center ps-10 mb-n1">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Experience with at least one framework or library.') }}
																																				</div>
																																</div>
																												</div>
																												<div class="mb-4">
																																<div class="d-flex align-items-center ps-10 mb-n1">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Use modern tech tools.') }}
																																				</div>
																																</div>
																												</div>
																								</div>
																								<div class="separator separator-dashed"></div>
																				</div>
																				<div class="m-0">
																								<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse"
																												data-bs-target="#kt_job_3_2">
																												<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																																<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
																																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																								viewBox="0 0 24 24" fill="none">
																																								<rect opacity="0.3" x="2" y="2" width="20"
																																												height="20" rx="5" fill="currentColor" />
																																								<rect x="6.0104" y="10.9247" width="12" height="2"
																																												rx="1" fill="currentColor" />
																																				</svg>
																																</span>
																																<span class="svg-icon toggle-off svg-icon-1">
																																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																								viewBox="0 0 24 24" fill="none">
																																								<rect opacity="0.3" x="2" y="2" width="20"
																																												height="20" rx="5" fill="currentColor" />
																																								<rect x="10.8891" y="17.8033" width="12" height="2"
																																												rx="1" transform="rotate(-90 10.8891 17.8033)"
																																												fill="currentColor" />
																																								<rect x="6.01041" y="10.9247" width="12" height="2"
																																												rx="1" fill="currentColor" />
																																				</svg>
																																</span>
																												</div>
																												<h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">
																																{{ __('Are these free?') }}
																												</h4>
																								</div>
																								<div id="kt_job_3_2" class="collapse fs-6 ms-1">
																												<div class="mb-4">
																																<div class="d-flex align-items-center ps-10 mb-n1">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Absolutely 100% Free') }}
																																				</div>
																																</div>
																												</div>
																								</div>
																								<div class="separator separator-dashed"></div>
																				</div>
																				<div class="m-0">
																								<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse"
																												data-bs-target="#kt_job_3_3">
																												<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																																<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
																																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																								viewBox="0 0 24 24" fill="none">
																																								<rect opacity="0.3" x="2" y="2" width="20"
																																												height="20" rx="5" fill="currentColor" />
																																								<rect x="6.0104" y="10.9247" width="12" height="2"
																																												rx="1" fill="currentColor" />
																																				</svg>
																																</span>
																																<span class="svg-icon toggle-off svg-icon-1">
																																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																								viewBox="0 0 24 24" fill="none">
																																								<rect opacity="0.3" x="2" y="2" width="20"
																																												height="20" rx="5" fill="currentColor" />
																																								<rect x="10.8891" y="17.8033" width="12" height="2"
																																												rx="1" transform="rotate(-90 10.8891 17.8033)"
																																												fill="currentColor" />
																																								<rect x="6.01041" y="10.9247" width="12" height="2"
																																												rx="1" fill="currentColor" />
																																				</svg>
																																</span>
																												</div>
																												<h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">
																																{{ __('Is it going to be paid?') }}
																												</h4>
																								</div>
																								<div id="kt_job_3_3" class="collapse fs-6 ms-1">
																												<div class="mb-4">
																																<div class="d-flex align-items-center ps-10 mb-n1">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('We discuss that later after you get contacted by us.') }}
																																				</div>
																																</div>
																												</div>
																								</div>
																								<div class="separator separator-dashed"></div>
																				</div> --}}
																</div>
												</div>

												<!--begin::Sidebar-->
												<div class="flex-lg-row-auto w-100 w-lg-275px w-xxl-350px">
																<div class="card bg-light">
																				<div class="card-body">

																								<div class="fs-5 lh-lg">
																												{!! $content->contentMain !!}
																								</div>

																								{{-- <div class="mb-7">
																												<h2 class="fs-1 text-gray-800 w-bolder mb-6">{{ __('👋 About Us') }}</h2>
																												<p class="fw-bold fs-6 text-gray-600">
																																{{ __('We are part of Berani Digital ID, which focuses on finding talent to work on
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																                                projects. This platform is open to anyone that has the suitable skill and is capable to
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																                                fulfill the responsibility.') }}
																												</p>
																								</div>
																								<div class="mb-8">
																												<h4 class="text-gray-700 w-bolder mb-0">
																																{{ __('🙌 Our Goals') }}
																												</h4>
																												<div class="my-2">
																																<div class="d-flex align-items-center mb-3">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Become a place where the developer easily gets projects.') }}
																																				</div>
																																</div>
																																<div class="d-flex align-items-center mb-3">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Make a good tech ecosystem.') }}
																																				</div>
																																</div>
																																<div class="d-flex align-items-center mb-3">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Give real-world project development experience.') }}
																																				</div>
																																</div>
																																<div class="d-flex align-items-center">
																																				<span class="bullet me-3"></span>
																																				<div class="text-gray-600 fw-bold fs-6">
																																								{{ __('Help new developer to get projects.') }}
																																				</div>
																																</div>
																												</div>
																								</div> --}}
																				</div>
																				<div class="card-footer">
																								<a href="" class="link-primary fs-6 fw-bold">Contact Us</a>

																				</div>

																</div>
												</div>
												<!--end::Sidebar-->
								</div>

				</div>
				<!--end::Body-->
</div>
