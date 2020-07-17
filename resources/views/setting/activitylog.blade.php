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
                    <th><i class="fas fa-user-tag mr-1"></i>Subject</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log as $key => $l)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $l->created_at->diffForHumans() }}</td>
                        <td>{{ $l->description }}</td>
                        <td>{{ $l->causer->name }}</td>
                        <td>{{ $l->subject_type . ' :' . $l->subject_id}}</td>
                        <td>
                            <a href="/setting/activitylog/{{ $l->id }}" class="btn btn-warning">Detail</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
