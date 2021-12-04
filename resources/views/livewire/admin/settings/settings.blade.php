<div>
    @section('title')
    {{'Settings'}}
    @endsection
    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="my-4 header-title font-weight-bold">Bassic Settings</h4>
                        <!-- title  -->
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Site Title:</label>
                            <div class="col-sm-8">
                                @if($errors->has('title'))
                                <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                                <input class="form-control" type="text" wire:model="title" placeholder="Site Title">
                            </div>
                            <div class="col-sm-2">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('title')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('title')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- logo  -->
                        <div class="form-group row">
                            <label for="logo" class="col-sm-2 col-form-label">Logo:</label>
                            <div class="col-sm-3">
                                @if($errors->has('logo'))
                                <span class="text-danger">{{$errors->first('logo')}}</span>
                                @endif
                                <input id="logo{{$logoinstance}}" type="file" wire:model="logo">
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-3">
                                @if(isset($datas->logo))
                                <img width="60px" src='{{asset("uploads/logo/$datas->logo")}}' alt="{{$datas->logo}}">
                                @endif
                            </div>
                            <div class="col-sm-2 mt-1">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('saveLogo')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('saveLogo')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- logo  -->
                        <div class="form-group row">
                            <label for="favicon" class="col-sm-2 col-form-label">favicon:</label>
                            <div class="col-sm-3">
                                @if($errors->has('favicon'))
                                <span class="text-danger">{{$errors->first('favicon')}}</span>
                                @endif
                                <input id="{{$faviconinstance}}" type="file" wire:model="favicon">
                            </div>
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-3">
                                @if(isset($datas->favicon))
                                <img width="60px" src="{{asset('uploads/favicon').'/'.$datas->favicon}}" alt="{{$datas->favicon}}">
                                @endif
                            </div>
                            <div class="col-sm-2 mt-1 float-right">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('savefavicon')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('savefavicon')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- copyright  -->
                        <div class="form-group row">
                            <label for="copyright" class="col-sm-2 col-form-label">Copyright Text:</label>
                            <div class="col-sm-8">
                                @if($errors->has('copyright'))
                                <span class="text-danger">{{$errors->first('copyright')}}</span>
                                @endif
                                <input class="form-control" type="text" wire:model="copyright" placeholder="Copyright">
                            </div>
                            <div class="col-sm-2 mt-1">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('copyright')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('copyright')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- copyright  -->
                        <div class="form-group row">
                            <label for="sitedescription" class="col-sm-2 col-form-label">Site Description:</label>
                            <div class="col-sm-8">
                                @if($errors->has('sitedescription'))
                                <span class="text-danger">{{$errors->first('sitedescription')}}</span>
                                @endif
                                <textarea wire:model="sitedescription" id="sitedescription" class="form-control" cols="30" rows="2">{{$datas->sitedescription}}</textarea>
                            </div>
                            <div class="col-sm-2 mt-1">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('sitedescription')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('sitedescription')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                    <div class="card-body">
                        <h4 class="my-4 header-title font-weight-bold">Contact Information</h4>
                        <!-- email  -->
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Contact Mail:</label>
                            <div class="col-sm-8">
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                                <input class="form-control" type="email" wire:model="email" placeholder="Email">
                            </div>
                            <div class="col-sm-2">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('email')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('email')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- phone  -->
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
                            <div class="col-sm-8">
                                @if($errors->has('phone'))
                                <span class="text-danger">{{$errors->first('phone')}}</span>
                                @endif
                                <input class="form-control" type="phone" wire:model="phone" placeholder="Phone">
                            </div>
                            <div class="col-sm-2">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('phone')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('phone')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- title  -->
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-8">
                                @if($errors->has('address'))
                                <span class="text-danger">{{$errors->first('address')}}</span>
                                @endif
                                <textarea wire:model="address" placeholder="Address" class="form-control" id="address" cols="30" rows="5"></textarea>
                            </div>
                            <div class="col-sm-2">
                                <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('address')" class="btn btn-sm btn-info">Save Change
                                    <div wire:loading wire:target="saveItem('address')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
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