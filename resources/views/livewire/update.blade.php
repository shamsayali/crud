<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group mb-3">
        <label>Name:</label>
        <input type="text" class="form-control @error('name') is-invalid     
        @enderror" id="postName" placeholder="Enter your name" wire:model="name">
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror

    </div>
    <div class="form-group mb-3">
        <label>Description:</label>
        <input type="text" class="form-control @error('name') is-invalid 
            
        @enderror" id="postDescription" placeholder="Enter your Description" wire:model="description">
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-success btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>

    </div>
    
    
</form>