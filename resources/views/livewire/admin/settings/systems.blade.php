<div>
    @section('title')
    {{'Systems Settings'}}
    @endsection
    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <span wire:click.prevent="clear_cache" class="btn btn-primary">Clear Cache
                            <span wire:loading wire:target="clear_cache" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>