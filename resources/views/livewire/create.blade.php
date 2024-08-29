<form>
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
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
    
    
</form>