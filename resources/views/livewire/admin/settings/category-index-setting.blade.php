<div class="content">
    @section('title')
    {{'Settings'}}
    @endsection
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <form wire:submit.prevent="save">
                @foreach($oldcountdata as $key => $oldvalue)
                <div class="card mb-1">
                    <div class="card-body p-1">
                        <div class="float-left">#{{$oldvalue->id}}. {{$oldvalue->name}}</div>
                        <div class="float-right"><i wire:click.prevent="removeOld({{$oldvalue->id}})" class="fa fa-trash btn text-danger"></i></div>
                    </div>
                </div>
                @endforeach
                @foreach($newCountData as $key => $value)
                <?php $dbcatdata = DB::table('categories')->where('id', $value)->first() ?>
                <div class="card mb-1">
                    <div class="card-body p-1">
                        <div class="float-left">#{{$value}}. {{$dbcatdata->name}}</div>
                        <input type="hidden" wire:model.lazy="value" value="{{$value}}">
                        <div class="float-right"><i wire:click.prevent="remove({{$key}})" class="fa fa-trash btn text-danger"></i></div>
                    </div>
                </div>
                @endforeach

                @if(!empty($newCountData))
                <input type="submit" value="Submit" class="btn btn-info btn-lg">
                @endif
            </form>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card">
                <div class="card-body p-1">
                    @foreach($datas as $ndata)
                    <div class="form-group m-0">
                        <a href="javascript:void(0)" wire:click.prevent="add({{$ndata->id}})">{{$ndata->id}} {{$ndata->name}} @if($ndata->product->count()>0) <span class="text-info">({{$ndata->product->count()}}</span> @endif</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>