<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure you want to delete this category?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible">{{ session('message') }}</div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
    
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            Category 
                        </h3>
                        <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-primary btm-sm float-end text-white">Add Category</a>
                        <p class="card-description">
                            Manage product categories here
                        </p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->status == 1 ? 'Hidden' : 'Visible'}}</td>
                                        <td>
                                            <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success text-white">Edit</a>
                                            <a href="" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger text-white"  data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>{{$categories->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    </div>
</div>
@push('script')
<script>

    window.addEventListener('close-modal', event => {
    
        $('#deleteModal').modal('hide');
        // alert('Name updated to: ' + event.detail.newName);
    
    })
    
</script>
@endpush