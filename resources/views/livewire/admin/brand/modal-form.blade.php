<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand" class="forms-sample">
            <div class="modal-body">
              <div class="form-group">
                <label class="form-label">Brand Name</label>
                <input type="text" wire:model.defer="name" class="form-control">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Brand Slug</label>
                <input type="text" wire:model.defer="slug" class="form-control">
                @error('slug')
                    <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Status</label><br>
                <input class="form-check-input" type="checkbox" wire:model.defer="status"/> Checked = hidden, Unchecked = visible
                @error('status')
                    <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary text-white">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent="updateBrand" class="forms-sample">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="form-label">Brand Name</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="form-label">Brand Slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control">
                    @error('slug')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="form-label">Status</label><br>
                    <input class="form-check-input" type="checkbox" wire:model.defer="status" style="width: 10px; height: 10px"/> Checked = hidden, Unchecked = visible
                    @error('status')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>
                <div class="modal-footer">
                  <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary text-white">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- Brand delete modal --}}
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brand Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyBrand">
            <div class="modal-body">
                <h6>Are you sure you want to delete this data?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </form>
    </div>
    </div>
</div>