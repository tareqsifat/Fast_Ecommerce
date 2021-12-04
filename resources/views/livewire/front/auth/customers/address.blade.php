<main id="main" class="main-site mt-3">
    @section('title')
    {{"user-Address"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <strong class="text-gray-600 font-family-nunito">Address</strong>
                    </div>
                    <div class="card-body pt-5 bgffffff">
                        <div class="information-area">
                            <div class="information_title my-3">
                                <span><i class="fa fa-file-text font-size-18 mr-2"></i></span>
                                <span class="text-uppercase text-gray-600 font-family-nunito">Present Address @if(empty($present_address)) <i wire:click.prevent='addItem("present_address")' class="fa fa-plus btn text_dark"></i> @else <i wire:click.prevent='addItem("present_address")' class="fa fa-edit btn text_dark"></i> @endif</span>
                            </div>
                            <div class="p-3">
                                <div class="information-body">
                                    <div class="row my-2">
                                        @if($present_address_form == false)
                                        @if($present_address !== NULL)
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">{{$present_address}}</div>
                                        @else
                                        <div class="text-align-center">
                                            <i class="dripicons-blog ask_question_icon"></i>
                                            <p class="mt-3 font-family-nunito">There are no address. Be the first you add your address.</p>
                                        </div>
                                        @endif
                                        @else
                                        <textarea wire:model.lazy="present_address" class="form-control" placeholder="Your Address" id="" cols="30" rows="10"></textarea>
                                        <div wire:click.prevent='saveItem("present_address")' class="btn btn-info mt-2">Save Change</div>
                                        <div wire:click.prevent='close' class="btn btn-primary mt-2">close</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="information-area">
                            <div class="information_title my-3">
                                <span><i class="fa fa-vcard font-size-18 mr-2"></i></span>
                                <span class="text-uppercase text-gray-600 font-family-nunito">Permanent Address @if(empty($adress)) <i wire:click.prevent='addItem("adress")' class="fa fa-plus btn text_dark"></i> @else <i wire:click.prevent='addItem("adress")' class="fa fa-edit btn text_dark"></i> @endif</span>
                            </div>
                            <div class="p-3">
                                <div class="information-body">
                                    <div class="row my-2">
                                        @if($adress_form == false)
                                        @if($adress !== NULL)
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">{{$adress}}</div>
                                        @else
                                        <div class="text-align-center">
                                            <i class="dripicons-blog ask_question_icon"></i>
                                            <p class="mt-3 font-family-nunito">There are no address. Be the first one you add your address.</p>
                                        </div>
                                        @endif
                                        @else
                                        <textarea wire:model.lazy="adress" class="form-control" placeholder="Your Address" id="" cols="30" rows="10"></textarea>
                                        <div wire:click.prevent='saveItem("adress")' class="btn btn-info mt-2">Save Change</div>
                                        <div wire:click.prevent='close' class="btn btn-primary mt-2">close</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>