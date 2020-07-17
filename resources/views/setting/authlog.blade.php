@extends('main')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Title</h5>

        <table class="table table-bordered table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>#</th>
                    <th><i class="far fa-clock mr-1"></i>Time</th>
                    <th><i class="far fa-file-alt mr-1"></i>Tipe</th>
                    <th><i class="far fa-user mr-1"></i>Username</th>
                    <th><i class="fas fa-user-tag mr-1"></i>Role</th>
                    <th><i class="fas fa-map-marker-alt mr-1"></i>Ip Address</th>
                    <th><i class="fas fa-laptop mr-1"></i>OS</th>
                    <th><i class="fas fa-laptop mr-1"></i>Browser</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log as $key => $l)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $l->time->diffForHumans() }}</td>
                        <td><i class="fas {{ ($l->tipe == 'login') ? 'fa-sign-in-alt text-info' : 'fa-sign-out-alt text-danger' }} mr-1"></i>{{ $l->tipe }}</td>
                        <td><span class="badge badge-info">{{ $l->username }}</span></td>
                        <td><span class="badge badge-success">{{ $l->role->name }}</span></td>
                        <td>{{ $l->ip_address }}</td>
                        <td><i class="fab fa-{{ $l->iconos }} mr-1"></i>{{ $l->os }}</td>
                        <td><i class="fab fa-{{ $l->iconbrow }} mr-1"></i>{{ $l->browser }}</td>
                        <td>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
