<div wire:ignore.self class="modal fade" id="modalviewForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Customers Details</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if($data)
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <img width="50px" src='{{(!empty($data->profile_photo_path) ? asset("uploads/user/profile/$data->profile_photo_path") : asset("defaults/user.png") )}}' alt="">
                    </div>
                    <div class="col-6 mb-3">
                        <h4>{{(!empty($data->name)) ? $data->name : ''}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tbody>
                                <tr><strong>Basic Info</strong></tr>
                                <tr>
                                    <th>Full Name:</th>
                                    <td>{{(!empty($data->fast_name)) ? $data->fast_name : ''}} {{(!empty($data->last_name)) ? $data->last_name : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <th>Phone: </th>
                                    <td>{{ $data->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <td>{{(!empty($data->email)) ? $data->email : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{(!empty($data->adress)) ? $data->adress : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <th>Present Address:</th>
                                    <td>{{(!empty($data->present_address)) ? $data->present_address : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <th>Gander:</th>
                                    <td>{{(!empty($data->gander)) ? $data->gander : ' NULL'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>