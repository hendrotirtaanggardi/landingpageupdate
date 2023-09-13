<div class="row my-3">
    <form wire:submit.prevent="create">
        <div class="row">
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror"
                    name="name" placeholder="Add framework/library name..." wire:model="name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>