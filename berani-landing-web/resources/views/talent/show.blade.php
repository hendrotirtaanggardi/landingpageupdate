@extends('layouts.app')

@section('content')
<livewire:talent-show :talent="$talent" />
@endsection

@section('custom_scripts')
<script>
    const fetchProgrammingLanguages = async () => {
    const response = await fetch("/api/programming-languages");
    const data = await response.json();
    return data;
    };
    
    const fetchFrameworkLibraries = async () => {
    const response = await fetch("/api/framework-libraries");
    const data = await response.json();
    return data;
    };
    
    const fetchTools = async () => {
    const response = await fetch("/api/tools");
    const data = await response.json();
    return data;
    };
    
    try {
    const programmingLanguages = document.querySelector(
    "#programming_languages"
    );
    const getProgrammingLanguages = async () => {
    const data = await fetchProgrammingLanguages();
    new Tagify(programmingLanguages, {
    whitelist: data,
    maxTags: 999,
    dropdown: {
    maxItems: 10,
    classname: "tagify__inline__suggestions",
    enabled: 0,
    closeOnSelect: false,
    },
    });
    };
    getProgrammingLanguages();
    } catch (error) {
    new Tagify(programmingLanguages, {
    whitelist: [],
    maxTags: 999,
    dropdown: {
    maxItems: 10,
    classname: "tagify__inline__suggestions",
    enabled: 0,
    closeOnSelect: false,
    },
    });
    }
    
    try {
    const tools = document.querySelector("#tools");
    const getTools = async () => {
    const data = await fetchTools();
    new Tagify(tools, {
    whitelist: data,
    maxTags: 999,
    dropdown: {
    maxItems: 10,
    classname: "tagify__inline__suggestions",
    enabled: 0,
    closeOnSelect: false,
    },
    });
    };
    getTools();
    } catch (error) {
    new Tagify(tools, {
    whitelist: [],
    maxTags: 999,
    dropdown: {
    maxItems: 10,
    classname: "tagify__inline__suggestions",
    enabled: 0,
    closeOnSelect: false,
    },
    });
    }
    
    try {
    const frameworkLibraries = document.querySelector("#framework_libraries");
    const getFrameworkLibraries = async () => {
    const data = await fetchFrameworkLibraries();
    new Tagify(frameworkLibraries, {
    whitelist: data,
    maxTags: 999,
    dropdown: {
    maxItems: 10,
    classname: "tagify__inline__suggestions",
    enabled: 0,
    closeOnSelect: false,
    },
    });
    };
    getFrameworkLibraries();
    } catch (error) {
    new Tagify(frameworkLibraries, {
    whitelist: [],
    maxTags: 999,
    dropdown: {
    maxItems: 10,
    classname: "tagify__inline__suggestions",
    enabled: 0,
    closeOnSelect: false,
    },
    });
    }
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

@endsection