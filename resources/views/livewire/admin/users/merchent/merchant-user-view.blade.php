<div wire:ignore.self class="modal fade" id="merchantUserView" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Shop Details</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <img width="50px" src='{{(!empty($data->profile_photo_path) ? asset("uploads/user/profile/$data->profile_photo_path") : asset("defaults/user.png") )}}' alt="">
                    </div>
                    <div class="col-6 mb-3">
                        <h4>Shop Name: {{(!empty($data->name)) ? $data->name : ' NULL'}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tbody>
                                <tr><strong>Basic Info</strong></tr>
                                <tr>
                                    <th>Owner:</th>
                                    <td>{{(!empty($data->fast_name)) ? $data->fast_name : ''}} {{(!empty($data->last_name)) ? $data->last_name : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <th>Phone: </th>
                                    <td>{{(!empty($data->phone)) ? $data->phone : ''}}</td>
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
                                    <th>Delevery System:</th>
                                    <td>{{(!empty($data->delevery_system)) ? $data->delevery_system : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <th>Gander:</th>
                                    <td>{{(!empty($data->gander)) ? $data->gander : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <th>About Shop:</th>
                                    <td>{{(!empty($data->description)) ? $data->description : ' NULL'}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">NID</label>
                                        <img width="100px" src='{{(!empty($data->nid) ? asset("uploads/user/profile/nid/$data->nid") : asset("defaults/default-blank-img.jpg") )}}'>
                                    </td>
                                    <td>
                                        <label for="">Trade Image</label>
                                        <img width="100px" src='{{(!empty($data->tid) ? asset("uploads/user/profile/tid/$data->tid") : asset("defaults/default-blank-img.jpg") )}}'>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>