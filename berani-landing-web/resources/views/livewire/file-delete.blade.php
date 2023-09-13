<div class="row mb-5">
    <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">
        <button type="button" class="position-absolute top-0 end-0 m-2 btn btn-icon btn-icon-danger text-danger"
            data-bs-dismiss="alert" wire:click='cancelDeleteFile'>
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
                        fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                        fill="currentColor">
                    </rect>
                </svg>
            </span>
        </button>
        <div class="text-center">
            <h1 class="fw-bold mb-5">Are you sure?</h1>
            <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
            <div class="mb-9 text-dark">
                <p class="mb-0">You are about to delete this talent file. This action cannot be undone.</p>
            </div>
            <div class="d-flex flex-center flex-wrap">
                <button type="button" class="btn btn-sm btn-outline btn-outline-danger btn-active-danger m-2"
                    wire:click='cancelDeleteFile'>Cancel</button>
                <button type="button" class="btn btn-sm btn-danger m-2" wire:click='delete'>Yes</button>
            </div>
        </div>
    </div>
</div>