<div>
    @section('title')
    {{'Themes'}}
    @endsection
    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="my-4 header-title font-weight-bold">Bassic Settings</h4>
                        <!-- addToCartColor  -->
                        <div class="form-group row">
                            <label for="example-color-input" class="col-sm-2 col-form-label">Menue Background</label>
                            <div class="col-sm-8">
                                <div>
                                    <input id="{{$resetaddToCartColor}}" type="color" wire:model="addToCartColor" value="{{$addToCartColor}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('addToCartColor')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('addToCartColor')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div onclick="confirm('Are you sure to reset it?') || event.stopImmediatePropagation()" wire:click="saveItem('resetaddToCartColor')" class="btn btn-sm btn-warning">Reset
                                    <div wire:loading wire:target="saveItem('resetaddToCartColor')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    <!-- /.content -->