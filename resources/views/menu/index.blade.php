@extends('main')

@section('content')

<div class="container">
    <h1 class="mb-2">Menu</h1>
    <a href="" class="btn btn-info mb-4" data-toggle="modal" data-target="#addmenu">Add Menu</a>
</div>
    <div class="card border-secondary">
        <h5 class="card-header bg-secondary text-white">Menu List</h5>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th>Name</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $m)
                        <tr>
                            <td >{{ $m->name }}</td>
                            <td class="text-white text-right">
                                <a href="/menu/{{ $m->id }}/builder" class="btn btn-success">Builder</a>
                                <a class="btn btn-info">Edit</a>
                                <a class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-info">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/menu/addmenu" method="POST">
                @method('put')
                @csrf
                <div class="modal-body">
                <div class="row">
                    <div class="col form-group">
                        <label for="name" class="form-label">Menu Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Add Item</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection

