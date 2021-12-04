<main id="main" class="main-site mt-3">
    @section('title')
    {{"user-profile"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <strong class="text-gray-600">Basic Information <i wire:click.prevent="editAction" class="fa fa-edit btn text_dark font-weight-bold"></i></strong>
                    </div>
                    <div class="card-body pt-5 bgffffff">
                        @if($profile == false)
                        <div class="information-area">
                            <div class="information_title my-3">
                                <span><i class="fa fa-file-text font-size-18 mr-2"></i></span>
                                <span class="text-uppercase text-gray-600">Personal Information</span>
                            </div>
                            <div class="p-3">
                                <div class="information-body">
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Name:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{ ucfirst($data->first_name) }} {{ucfirst($data->last_name) }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Phone:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{$data->phone}}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Email:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{$data->email}}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Gender:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{$data->gander}}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Birth Date:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{$data->brithdate}}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Member Since:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{ $data->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="information-area">
                            <div class="information_title my-3">
                                <span><i class="fa fa-vcard font-size-18 mr-2"></i></span>
                                <span class="text-uppercase text-gray-600">Contact Information</span>
                            </div>
                            <div class="p-3">
                                <div class="information-body">
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Phone:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{$data->phone}}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Email:</div>
                                        <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">{{$data->email}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="information-area">
                            <div class="p-3">
                                <div class="information-body">
                                    <form wire:submit.prevent="save">
                                        <div class="row my-2">
                                            <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">First Name:</div>
                                            <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">
                                                @if($errors->has('first_name')) <br> <span class="text-danger">{{$errors->first('first_name')}}</span> @endif
                                                <input wire:model.lazy="first_name" type="text" class="form-control" placeholder="first name">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Last Name:</div>
                                            @if($errors->has('last_name')) <br> <span class="text-danger">{{$errors->first('last_name')}}</span> @endif
                                            <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">
                                                <input wire:model.lazy="last_name" type="text" class="form-control" placeholder="Last name">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Email:</div>
                                            @if($errors->has('email')) <br> <span class="text-danger">{{$errors->first('email')}}</span> @endif
                                            <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">
                                                <input wire:model.lazy="email" type="email" class="form-control" placeholder="email">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">phone:</div>
                                            @if($errors->has('phone')) <br> <span class="text-danger">{{$errors->first('phone')}}</span> @endif
                                            <div class="font-size-14 col-sm-10 col-md-9 col-sm-9">
                                                <input wire:model.lazy="phone" type="tel" class="form-control" placeholder="phone">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Bith date:</div>
                                            <div class="font-size-14 col-sm-9 col-md-9">
                                                @if($errors->has('brithdate'))<br> <span class="text_danger">{{$errors->first('brithdate')}}</span> @endif
                                                <input class="form-control" wire:model.lazy="brithdate" type="date" id="frm-reg-cfpass" name="reg-cfpass">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="font-weight-bold font-size-15 col-sm-3 col-md-3">Gander*:</div>
                                            <div class="font-size-14 col-sm-9 col-md-9">
                                                @if($errors->has('gander'))<br> <span class="text_danger">{{$errors->first('gander')}}</span> @endif
                                                <div class="form-group desabledSelect_styled">
                                                    <select wire:model.lazy="gander" class="d-flex w-100">
                                                        <Option>Select</Option>
                                                        <Option>Male</Option>
                                                        <Option>Female</Option>
                                                        <Option>Other</Option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <input type="submit" value="Save Change" class="mt-2 btn btn-info">
                                        <div wire:click.prevent="close" class="btn btn-primary mt-2">Close</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .font-size-15 {
            font-size: 14px !important;
        }
    </style>
    <!--end container-->
</main>