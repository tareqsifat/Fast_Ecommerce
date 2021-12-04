<div>
    @section('title')
    {{'Header Top'}}
    @endsection
    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-2"> <label for="phone">Phone: <small><i></i></small></label></div>
                                    <div class="col-sm-10">
                                        @if($errors->has('phone'))<span class="text-danger">{{$errors->first('phone')}}</span> @endif
                                        <input wire:model="phone" placeholder="phone" id="phone" type="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('phone')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('phone')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-2">
                                        <label for="email">Email: <small><i></i></small></label>
                                    </div>
                                    <div class="col-sm-10">
                                        @if($errors->has('email'))<span class="text-danger">{{$errors->first('email')}}</span> @endif
                                        <input wire:model="email" id="email" placeholder="Email" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('email')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('email')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- button -->
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-2">
                                        <label for="button">Right Link Text: <small><i></i></small></label>
                                    </div>
                                    <div class="col-sm-10">
                                        @if($errors->has('button'))<span class="text-danger">{{$errors->first('button')}}</span> @endif
                                        <input wire:model="button" id="button" placeholder="Text" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('button')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('button')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- url -->
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-2">
                                        <label for="url">Url: <small><i></i></small></label>
                                    </div>
                                    <div class="col-sm-10">
                                        @if($errors->has('url'))<span class="text-danger">{{$errors->first('url')}}</span> @endif
                                        <input wire:model="url" id="url" placeholder="URL" type="url" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('url')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('url')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="my-4 header-title font-weight-bold">Styles</h4>
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-3">
                                        <label for="url">Background Color: <small><i></i></small></label>
                                    </div>
                                    <div class="col-sm-9">
                                        @if($errors->has('header_bg'))<span class="text-danger">{{$errors->first('header_bg')}}</span> @endif
                                        <input type="color" class="form-control" wire:model="header_bg" data-color-format="rgba">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_bg')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('header_bg')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div onclick="confirm('Are you sure to reset it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_bg_reset')" class="btn btn-sm btn-warning">Reset
                                        <div wire:loading wire:target="saveItem('header_bg_reset')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-3">
                                        <label for="url">Text Color: <small><i></i></small></label>
                                    </div>
                                    <div class="col-sm-9">
                                        @if($errors->has('header_text_color'))<span class="text-danger">{{$errors->first('header_text_color')}}</span> @endif
                                        <input type="color" class="form-control" wire:model="header_text_color" data-color-format="rgba">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_text_color')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('header_text_color')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div onclick="confirm('Are you sure to reset it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_text_color_reset')" class="btn btn-sm btn-warning">Reset
                                        <div wire:loading wire:target="saveItem('header_text_color_reset')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-3">
                                        <label for="url">Icon Color: <small><i></i></small></label>
                                    </div>
                                    <div class="col-sm-9">
                                        @if($errors->has('header_icon_color'))<span class="text-danger">{{$errors->first('header_icon_color')}}</span> @endif
                                        <input type="color" class="form-control" wire:model="header_icon_color" data-color-format="rgba">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_icon_color')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('header_icon_color')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div onclick="confirm('Are you sure to reset it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_icon_color_reset')" class="btn btn-sm btn-warning">Reset
                                        <div wire:loading wire:target="saveItem('header_icon_color_reset')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-9 d-flex">
                                    <div class="col-sm-3">
                                        <label for="url">Hever Text Color: <small><i></i></small></label>
                                    </div>
                                    <div class="col-sm-9">
                                        @if($errors->has('header_hover_color'))<span class="text-danger">{{$errors->first('header_hover_color')}}</span> @endif
                                        <input type="color" class="form-control" wire:model="header_hover_color" data-color-format="rgba">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div onclick="confirm('Are you sure to change it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_hover_color')" class="btn btn-sm btn-info">Save Change
                                        <div wire:loading wire:target="saveItem('header_hover_color')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div onclick="confirm('Are you sure to reset it?') || event.stopImmediatePropagation()" wire:click="saveItem('header_hover_color_reset')" class="btn btn-sm btn-warning">Reset
                                        <div wire:loading wire:target="saveItem('header_hover_color_reset')" class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
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