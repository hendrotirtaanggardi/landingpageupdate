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

const myDropzone = new Dropzone("#kt_dropzonejs", {
    url: "/api/talent/files",
    paramName: "file",
    acceptedFiles: ".pdf,.jpeg,.jpg,.png",
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        "X-User-Id": document.querySelector(`input[name="${btoa("id")}"]`)
            .value,
    },
    maxFiles: 10,
    maxFilesize: 10,
    preventDuplicates: true,
    addRemoveLinks: true,
    createImageThumbnails: false,
    removedfile: function (file) {
        fetch("api/talent/files", {
            method: "DELETE",
            headers: {
                "X-User-Id": document.querySelector(
                    `input[name="${btoa("id")}"]`
                ).value,
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                file: file.name,
            }),
        }).then((response) => {
            file.previewElement.remove();
        });
    },
    init: function () {
        thisDropzone = this;
        fetch("api/talent/files", {
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "X-User-Id": document.querySelector(
                    `input[name="${btoa("id")}"]`
                ).value,
            },
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                data.forEach((file) => {
                    const mockFile = { name: file.name, size: file.size };
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    thisDropzone.emit("complete", mockFile);
                });
            });
    },
    success: function (file, response) {
        if (!response.success) {
            file.previewElement.remove();
            toastr.options = {
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: false,
                positionClass: "toastr-top-right",
                preventDuplicates: false,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
            };
            toastr.error(response.message);
        }
    },
    error: function (file, response) {
        file.previewElement.remove();
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toastr-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        toastr.error("File upload error");
    },
});

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
} catch (error) {}
