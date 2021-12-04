<div wire:ignore.self class="modal fade" id="editmodalspecificationForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Update Specification</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="form-group">
                        <label for="title">Specification Title:</label>
                        @if($errors->has('title'))<br> <span class="text-danger">{{$errors->first('title')}}</span> @endif
                        <input wire:model="title" id="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                    </div>
                    @foreach($pSpData as $key => $oPspData)
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                @error('name.'.$key)<span class="text-danger error">{{ $message }}</span>@enderror
                                <input type="text" class="form-control" placeholder="Name" wire:model="oname.{{ $key }}">
                                <input type="hidden" wire:model="oid.{{ $key }}">
                            </div>
                        </div>
                        <div class=" col-md-5">
                            <div class="form-group">
                                @error('description.$key') <span class="text-danger error">{{ $message }}</span>@enderror
                                <textarea wire:model="odescription.{{ $key }}" class="form-control" placeholder="Description" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn text-white btn-danger btn-sm" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="psPAction({{$oPspData->id}}, 'oldItemsdelete')"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    @endforeach
                    @foreach($inputs as $key => $value)
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                @error('name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                <input type="text" class="form-control" placeholder="Name" wire:model="name.{{ $value }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                @error('description.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                <textarea class="form-control" wire:model="description.{{ $value }}" placeholder="Description" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                <button wire:click.prevent="save()" class="btn btn-sm btn-info"> Save</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    window.addEventListener('openPsPupdateModal', event => {
        $('#editmodalspecificationForm').modal('show');
    })
    window.addEventListener('closeModal', event => {
        $('#editmodalspecificationForm').modal('hide');
    })
</script>
@endpush