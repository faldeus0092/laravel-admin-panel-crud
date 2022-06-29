<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        @if (session('message'))
                <div class="alert alert-success alert-dismissible">{{ session('message') }}</div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        Brands List
                    </h3>
                    <a href="#" class="btn btn-sm btn-small btn-primary float-end text-white" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brands</a>
                    <p class="card-description">
                        Manage product brands here
                    </p>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success btn-sm text-white">Edit</a>
                                        <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-danger btn-sm text-white">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        No Brands Found
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $brands -> links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>

    window.addEventListener('close-modal', event => {
    
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
        // alert('Name updated to: ' + event.detail.newName);
    
    })
    
</script>
@endpush
