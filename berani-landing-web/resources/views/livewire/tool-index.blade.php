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
                        {{ __('🧰 Manage Tool') }}
                    </h3>
                    <div class="fs-5 fw-bold">
                        {{ __('You can manage tools that talent can pick here!') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-lg-row mb-17">
            <div class="flex-lg-row-fluid me-0">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <a href="{{ route('recruiter') }}" class="btn btn-primary btn-sm me-3 mb-3">Back</a>
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
                                data-placeholder="Order by..." wire:model='orderBy'>
                                <option></option>
                                <option selected value="desc">Newest</option>
                                <option value="asc">Oldest</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div wire:ignore>
                            <select class="form-select form-select-solid" data-control="select2" id="paginationNumber"
                                data-placeholder="Pagination Number..." wire:model='paginationNumber'>
                                <option></option>
                                <option selected value="10">10</option>
                                @for($i = 15; $i <= 50; $i=$i + 5) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>
                @if (session()->has('message'))
                <div class=" row mb-5">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="h5">
                            {{ session('message') }}
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                @if ($editClicked)
                <livewire:tool-update />
                @else
                <livewire:tool-create />
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mb-15 border">
                            <table class="table table-row-bordered gy-7 gs-7">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Talent Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tools as $tool)
                                    <tr>
                                        <td>{{ ($tools->currentPage() - 1) *
                                            $tools->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $tool->name }}</td>
                                        <td>{{ $tool->users->count() }}</td>
                                        <td class="text-end">
                                            <button class="btn btn-light btn-sm me-1 mb-2" type="button"
                                                wire:click="getTool({{ $tool->id }})">✏️</button>
                                            <button class="btn btn-light btn-sm mb-2" type="button"
                                                wire:click="deleteTool({{ $tool->id }})">❌</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="text-center">
                                                <h3 class="text-gray-800">
                                                    {{ __('No tool found!') }}
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
                    {{ $tools->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#orderBy').on('change', function (e) {
            @this.set('orderBy', $('#orderBy').select2("val"));
        });
    });
    $(document).ready(function () {
        $('#paginationNumber').on('change', function (e) {
            @this.set('paginationNumber', $('#paginationNumber').select2("val"));
        });
    });
</script>
@endpush