@extends('layouts.app')

@section('content')
				<div class="card">
								<div class="card-body p-lg-17">
												<div class="mb-18">
																<div class="mb-10">
																				<div class="text-center mb-15">
																								<div>
																												@if ($content->contentHeader)
																																{!! $content->contentHeader !!}
																												@endif
																								</div>
																				</div>
																				<div class="overlay">
																								@if ($content->image)
																												<img class="w-100 card-rounded" src="{{ asset($content->image) }}" alt="" id="img-main" />
																								@endif
																								<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
																												<a href="{{ route('register') }}" class="btn btn-primary ms-3">
																																Become Talent
																												</a>
																								</div>
																				</div>
																</div>
																<div class="fs-5 fw-bold text-gray-600 text-center">
																				@if ($content->contentMain)
																								{!! $content->contentMain !!}
																				@endif
																</div>
												</div>

												<div class="text-center mb-20">
																<div class="mb-13">
																				<h3 class="fs-2hx text-dark mb-5">Join Us</h3>
																				<div class="fs-5 text-muted fw-bold">
																								@if ($content->contentFooter)
																												{!! $content->contentFooter !!}
																								@endif
																				</div>
																</div>
																<a href="{{ route('register') }}" class="btn btn-primary mb-5">Become Talent</a>
												</div>
								</div>
				</div>
@endsection

@section('custom_scripts')
				{{-- <script>
								try {
												fetch("https://source.unsplash.com/1200x400/?team")
																.then((response) => {
																				return response.blob();
																})
																.then((blob) => {
																				const objectURL = URL.createObjectURL(blob);
																				const imgMain = document.querySelector("#img-main");
																				imgMain.src = objectURL;
																});
								} catch (error) {}
				</script> --}}
@endsection
