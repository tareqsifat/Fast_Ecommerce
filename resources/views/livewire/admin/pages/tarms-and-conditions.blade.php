<form id="product_create_form" action="{{route('admin.tarmsandcondition.post')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        @section('title')
        {{'terms & conditions'}}
        @endsection
        <!-- Main content -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Body</label>
                        @if($errors->first('description')) <span class="text-danger">{{ $errors->first('description') }}</span> @endif
                        <textarea class="form-control" name="description" id="editable">{{$findpage->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-block btn-info">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>