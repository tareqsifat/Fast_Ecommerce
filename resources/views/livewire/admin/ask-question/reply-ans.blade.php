<div wire:ignore.self class="modal fade" id="modalBrandForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Reply Questions</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-3">

                    @foreach($allreply as $rpItem)
                    <div class="form-group">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        {{$rpItem->answer}}
                                    </div>
                                    <div class="col-1"><button onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$rpItem->id}})" class="btn"><i class="fa fa-trash"></i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label for="description">Answer</label>
                        @if($errors->has('answer'))<span class="text-danger">{{$errors->first('answer')}}</span> @endif
                        <textarea wire:model="answer" id="answer" type="text" class="form-control" placeholder="Write Ans" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                <button wire:click="save" class="btn btn-sm btn-info"> Save</button>
            </div>
        </div>
    </div>
</div>