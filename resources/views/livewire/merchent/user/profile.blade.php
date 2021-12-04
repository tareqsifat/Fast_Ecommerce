<div class="row">
    @section('title')
    {{'Merchent Profile'}}
    @endsection
    @section('styles')
    <style>
        .dropzoon-lavel {
            height: 150px;
            content: "";
            width: 200px;
            border: 2px dashed #777;
            cursor: pointer;
            text-align: center;
            padding-top: 50px;
        }
    </style>
    @endsection
    <!-- Main content -->
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 border-right">
                        <div class="mb-2">
                            <h6 class="title text-muted">General</h6>
                            <span wire:click.prevent="chageAction('general')" class="btn @if($changeFiled == false) {{'text-success'}} @endif">Edit Shop</span>
                        </div>
                        <div class="mb-2">
                            <h6 class="title text-muted">Security</h6>
                            <span wire:click.prevent="chageAction('chagepass')" class="btn @if($changeFiled == true) {{'text-success'}} @endif">Change Passeword</span>
                        </div>
                    </div>
                    @if($changeFiled == false)
                    @livewire('merchent.user.merchent-general-profile')
                    @else
                    @livewire('merchent.user.merchent-reset-password')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>