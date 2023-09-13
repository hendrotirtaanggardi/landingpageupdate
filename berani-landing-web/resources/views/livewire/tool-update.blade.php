<div class="row my-3">
    <form wire:submit.prevent="update">
        <div class="row">
            <input type="hidden" name="id" wire:model="toolId">
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror"
                    name="name" placeholder="Edit Tool name..." wire:model="name">
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