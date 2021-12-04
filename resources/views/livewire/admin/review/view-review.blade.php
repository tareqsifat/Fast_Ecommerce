<div wire:ignore.self class="modal fade" id="modalBrandForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Review</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($data)
                <div class="row">
                    <div class="col-6">
                        <img width="50px" src='{{(!empty($data->user->profile_photo_path) ? asset("uploads/user/profile/$data->user->profile_photo_path") : asset("defaults/user.png") )}}'>
                    </div>
                    <div class="col-6 mb-3">
                        <h4>Name: {{(!empty($data->user->name)) ? $data->user->name : "$data->fast_name" ." "."$data->last_name"}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tbody>
                                <tr><strong>Basic Info</strong></tr>
                                <tr>
                                    <td width="25%">{{$data->product->title}}</td>
                                    <td> <img width="50px" src='{{asset("uploads/products/thumbnails/".$data->product->thumbnail)}}' alt="{{$data->product->thumbnail}}"></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$data->user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{$data->user->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Comment:</th>
                                    <td>{{$data->comment}}</td>
                                </tr>

                                <tr>
                                    <th>Review:</th>
                                    <td>@for($i = 0; $i < 5;$i++ ) <i class="fas fa-star {{($data->review > $i)?'text-warning':''}}"></i> @endfor</td>
                                </tr>

                                <tr>
                                    <th>Images:</th>
                                    @if($data->reviewImage)
                                    <td>
                                        @foreach($data->reviewImage as $iItem)
                                        <img class="mr-2" width="150px" src='{{asset("uploads/reviews/$iItem->image")}}' alt="{{$iItem->image}}">
                                        @endforeach
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>