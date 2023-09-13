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
                        {{ __('📄 Detail Talent Information Page') }}
                    </h3>
                    <div class="fs-5 fw-bold">
                        {{ __('Contains talent information about personal, skill, and technical here.') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-lg-row mb-17">
            <div class="flex-lg-row-fluid me-0">
                <div class="form" wire:poll.keep-alive>
                    <div class="row mb-10">
                        <div class="col-md-2 fv-row">
                            <a href="{{ route('recruiter') }}" class="btn btn-outline-primary">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
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
                            <input type="text" class="form-control form-control-solid" placeholder="" name="name"
                                value="{{ $talent->name }}" disabled />
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <label class="required fs-5 fw-bold mb-2">
                                {{ __('📧 Email') }}
                            </label>
                            <input class="form-control form-control-solid" name="email" value="{{ $talent->email }}"
                                disabled />
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                {{ __('📱 Phone Number') }}
                            </label>
                            <input type="text" class="form-control form-control-solid" name="phone_number"
                                value="{{ $talent->phone_number ?? false ? $talent->phone_number : '-' }}" disabled />
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                {{ __('🚩 Country') }}
                            </label>
                            <input type="text" class="form-control form-control-solid" name="country"
                                value="{{ $talent->country ?? false ? $talent->country : '-' }}" disabled />
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                {{ __('🏙️ City') }}
                            </label>
                            <input type="text" class="form-control form-control-solid" name="city"
                                value="{{ $talent->city ?? false ? $talent->city : '-' }}" disabled />
                        </div>
                    </div>
                    @if ($talent->linkedin || $talent->github)
                    <div class="row mt-15 mb-5">
                        <div class="separator separator-content border-secondary">
                            <span class="h3">{{ __('Links') }}</span>
                        </div>
                    </div>
                    @endif
                    @if ($talent->linkedin ?? false)
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                {{ __('🔗 LinkedIn') }}
                            </label>
                            <a href="{{ $talent->linkedin }}" class="fs-5">{{
                                $talent->linkedin
                                }}</a>
                        </div>
                    </div>
                    @endif
                    @if ($talent->github ?? false)
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                {{ __('🔗 Github') }}
                            </label>
                            <a href="{{ $talent->github }}" class="fs-5">{{ $talent->github
                                }}</a>
                        </div>
                    </div>
                    @endif
                    <div class="row mt-15 mb-5">
                        <div class="separator separator-content border-secondary">
                            <span class="h3">{{ __('Technologies') }}</span>
                        </div>
                    </div>
                    <div wire:ignore>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                <span>
                                    {{ __('👨‍💻️ Programming Languages') }}
                                </span>
                            </label>
                            <textarea readonly id="programming_languages"
                                class="form-control form-control form-control-solid" data-kt-autosize="true"
                                name="programming_languages">@if($talent->programming_languages ?? false)@foreach ($talent->programming_languages as $item)@if($item->programming_language->id == $talent->programming_languages->last()->programming_language->id){{$item->programming_language->name}}@else{{ $item->programming_language->name.','}}@endif @endforeach @endif</textarea>
                        </div>
                    </div>
                    <div wire:ignore>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                <span>
                                    {{ __('📦 Frameworks or Libraries') }}
                                </span>
                            </label>
                            <textarea readonly id="framework_libraries"
                                class="form-control form-control form-control-solid" data-kt-autosize="true"
                                name="framework_libraries">@if($talent->framework_libraries ?? false)@foreach ($talent->framework_libraries as
                                $item)@if($item->framework_library->id ==
                                $talent->framework_libraries->last()->framework_library->id){{$item->framework_library->name}}@else{{
                                    $item->framework_library->name.','}}@endif @endforeach @endif</textarea>
                        </div>
                    </div>
                    <div wire:ignore>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                <span>
                                    {{ __('🧰 Tools') }}
                                </span>
                            </label>
                            <textarea readonly id="tools" class="form-control form-control form-control-solid"
                                data-kt-autosize="true" name="tools">@if($talent->tools ?? false)@foreach ($talent->tools as
                                $item)@if($item->tool->id ==
                                $talent->tools->last()->tool->id){{$item->tool->name}}@else{{
                                    $item->tool->name.','}}@endif @endforeach @endif</textarea>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="fs-5 fw-bold mb-2">
                            <span>
                                {{ __('📁 Files') }}
                            </span>
                        </label>
                        <ul class="list-unstyled">
                            <style>
                                #codeDownload:hover {
                                    text-decoration: underline;
                                    cursor: pointer;
                                }
                            </style>
                            @forelse ($talent->files as $file)
                            <li class="mb-5">
                                <code id="codeDownload" wire:click="download('{{ $talent->id }}', '{{ $file->file }}')">
                                        {{ $file->file }}
                                </code>
                            </li>
                            @empty
                            <li class="mb-5">
                                {{ __('No files') }}
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <div wire:ignore>
                        <a href="mailto:{{ $talent->email }}" class="btn btn-primary">
                            {{ __('Contact') }}
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>