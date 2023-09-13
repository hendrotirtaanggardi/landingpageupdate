@extends('layouts.app')

@section('content')
<livewire:recruiter-index />
@endsection

@section('custom_scripts')
<script>
    try {
    fetch("https://source.unsplash.com/1600x800/?technologies")
    .then((response) => {
    return response.blob();
    })
    .then((blob) => {
    const objectURL = URL.createObjectURL(blob);
    const bgMain = document.querySelector("#bg-main");
    bgMain.style.backgroundImage = `url(${objectURL})`;
    });
    } catch (error) {
    }
</script>

@stack('scripts')

@endsection