<div class="row">
    @section('title')
    {{'Headline'}}
    @endsection
    <!-- Main content -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="headline">Headline</label>
                        @if($errors->has('headline'))<span class="text-danger">{{$errors->first('headline')}}</span> @endif
                        <textarea class="form-control" wire:model.lazy="headline" placeholder="Headline" id="headline" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="speed">Speed</label>
                                @if($errors->has('speed'))<span class="text-danger">{{$errors->first('speed')}}</span> @endif
                                <input wire:model.lazy="speed" type="number" class="form-control" placeholder="Speed">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="color">Color</label>
                                @if($errors->has('color'))<span class="text-danger">{{$errors->first('color')}}</span> @endif
                                <input wire:model.lazy="color" type="color" class="form-control" placeholder="color">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="behavior">Behavior</label>
                                @if($errors->has('behavior'))<span class="text-danger">{{$errors->first('behavior')}}</span> @endif
                                <select wire:model.lazy="behavior" id="behavior" class="form-control">
                                    <option>---SELECT---</option>
                                    <option value="sliding">Sliding</option>
                                    <option value="scrolling">Scrolling</option>
                                    <option value="alternate">Alternate</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="direction">Direction</label>
                                @if($errors->has('direction'))<span class="text-danger">{{$errors->first('direction')}}</span> @endif
                                <select wire:model.lazy="direction" id="direction" class="form-control">
                                    <option>---SELECT---</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="up">Up</option>
                                    <option value="down">Down</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Headline ON/OFF </label>
                        <?php
                        $dbData = DB::table('headlines')->first();
                        ?>
                        @if($dbData)
                        @if($dbData->status == 0)
                        <button wire:click.prevent="changeStatus({{$dbData->id}})" class="btn btn-sm btn-success">ON
                            <span wire:loading wire:target="changeStatus({{$dbData->id}})" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </button>
                        @else
                        <button wire:click.prevent="changeStatus({{$dbData->id}})" class="btn btn-sm btn-warning">OFF
                            <span wire:loading wire:target="changeStatus({{$dbData->id}})" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </button>
                        @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info ">Save
                            <span wire:loading wire:target="save" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>