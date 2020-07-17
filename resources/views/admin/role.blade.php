@extends('main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <a class="btn btn-primary text-white mb-2 mt-2" data-toggle="modal" data-target="#showmodal">New Role</a>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role as $key => $r)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $r->name }}</td>
                            <td>
                                <a class="btn btn-warning btn-menu" data-role-id="{{ $r->id }}" data-toggle="modal" data-target="#menumodal">Menu Access</a>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modallabel">New Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                    @csrf
                    <input type="text" class="form-control" name="name" placeholder="Role Name">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </div>
        <div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modallabel">Give Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @foreach ($menu as $key => $item)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" class="id" data-id="{{ $item->id }}" autocomplete="off">
                          </div>
                        </div>
                        <input type="text" class="form-control" value="{{ $item->name }}" readonly>
                      </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-save">Save</button>
                </div>
            </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.btn-menu').on('click', function(){
                $('.id').removeAttr('checked')

                let roleId = $(this).data('role-id')

                $.ajax({
                    url: '/admin/role/getActiveMenu',
                    type: 'POST',
                    data: {
                        _token: $('input[name=_token]').val(),
                        role_id: roleId
                    },
                    success: function(data){
                        data.forEach(id => {
                            $('.id').each(function() {
                                if ($(this).data('id') == id) {
                                    $('input[data-id = ' + id + ']').attr('checked', true)
                                }
                            })
                        });

                        $('.id').on('change', function(){
                            let menuId = $(this).data('id')
                            if ($(this).attr('checked', true)) {
                                $.ajax({
                                    url: '/admin/user/giveRoleMenu',
                                    data: {
                                        _token:  $('input[name=_token]').val(),
                                        role_id: roleId,
                                        menu_id: menuId,
                                    },
                                    type: 'POST',
                                    success: function(){
                                        console.log('success')
                                    }
                                })
                            }

                            $('#menumodal').on('hidden.bs.modal', function () {
                                location.reload(true);
                            })

                        })
                    }
                })

            })


        })
    </script>
@endsection
