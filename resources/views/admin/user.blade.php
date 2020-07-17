@extends('main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title</h5>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <table class="table table-bordered table-hover table-responsive-sm">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $s)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->email }}</td>
                                    <td>
                                        <a href="" class="give-role btn btn-secondary" data-user-id="{{ $s->id }}" data-toggle="modal" data-target="#showmodal">Give Role</a>
                                        <a href="" class="btn btn-warning">Permission</a>
                                        <a href="" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modallabel">Give Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.role') }}" method="POST">
                    @csrf
                    <div class="show-role"></div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.give-role').on('click', function(){
                let userId = $(this).data('user-id')
                let token = $('input[name=_token]').val()
                $.ajax({
                    url: '/admin/user/getActiveRole',
                    data: {
                        _token: token,
                        user_id: userId,
                    },
                    type: 'POST',
                    success: function(data){
                        $('.show-role').html(data)
                        $('.role').on('change', function(){
                            let roleId = $(this).data('role-id')
                            $.ajax({
                                url: '/admin/user/giveRole',
                                data: {
                                    _token: token,
                                    user_id: userId,
                                    role_id: roleId,
                                },
                                type: 'POST',
                                success: function(){
                                    console.log('success')
                                    $('#showmodal').modal('hide')
                                }
                            })
                        })
                    }
                })
            })


        })
    </script>
@endsection
