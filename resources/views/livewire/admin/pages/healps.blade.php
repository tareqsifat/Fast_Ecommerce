<form id="product_create_form" action="{{route('admin.healps.post')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        @section('title')
        {{'healps'}}
        @endsection
        <!-- Main content -->
        @livewire('admin.faq.merchent-faq-c-u')
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="mt-0 header-title">All Frequently Ask Questions For Help</h4>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalBrandForm">
                                + Add New
                            </button>
                        </div>
                    </div>
                    <div id="accordion" class="mt-3">
                        @foreach($globalfaq as $key=>$faqitem)
                        <div class="card mb-0">
                            <div class="card-header" id="heading{{$key}}">
                                <h5 class="mb-0 mt-0 font-14">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}" class="text-dark collapsed">
                                        #{{$key+1}} {{$faqitem->title}}
                                    </a>
                                    <div class="d-flex">
                                        <div class="btn btn-sm my-2" wire:click="selectItem({{$faqitem->id}}, 'edit')" class="mr-1"><i class="fas fa-edit text-info"></i></div>
                                        <div class="btn btn-sm my-2" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$faqitem->id}})" class=""><i class="fas fa-trash text-danger"></i></div>
                                    </div>
                                </h5>
                            </div>
                            <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                <div class="card-body">
                                    {{$faqitem->description}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group mt-4">
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