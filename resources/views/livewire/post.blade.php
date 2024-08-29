<div>
    <div class="col-md-12">
        <div>
            <input wire:model.live="search" type="text" class="form-control" placeholder="search users">
        </div>
     <br>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
            {{-- /????/ --}}

                <div class="alert alert-success" role="alert">
                    {{ session()->get('sucess') }}
            {{-- /????/ --}}

                </div>
                    
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
                    
                @endif
    
                <div class="table-response">
                    <table class="table">
                        <th>
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                        </th>
                    </thead>
                        <tbody>
                            @if(count($posts) > 0)
                            @foreach ($posts as $rs )
                                
                            <tr>
                                <td>{{ $rs->name }}</td>
                                <td>{{ $rs->description }}</td>
                                <td>
                                    <button wire:click="edit({{$rs->id}})" class="bnt btn-primary btn-sm">Edit</button>
                                    <button wire:click="delete({{$rs->id}})" class="bnt btn-danger btn-sm">Delete</button>

                                </td>

                            </tr>
                            @endforeach
                            @else
                            
                            <tr>
                                <td colspan="3" align="center">Record not found</td>
                            </tr>
                            @endif
                        
                            @include('livewire.create')

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
</div>
{{-- <script>
    function deletePost(id){
        if(confirm("are you want to delete??"))
        window.livewire.emit('deletePost',id);

    }
</script> --}}