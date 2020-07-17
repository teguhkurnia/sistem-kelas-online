@extends('main')

@section('content')
<div class="card border-danger">
    <div class="card-header bg-danger text-white">
        <div class="row justify-content-between">
            <h5>Activity Log {{$act->id}}</h5>
            <a href="/setting/activitylog" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <div class="card-body">
      <div class="row">
          <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">
                  Activity Detail
                </h5>
                <div class="card-body">
                  <table class="table table-borderless">
                    <tbody>
                        <tr class="row">
                            <th class="col-6 text-right border-0 p-1">Activity Log Id</th>
                            <td class="col-6 border-0 p-1">{{$act->id}}</td>
                        </tr>
                        <tr class="row">
                            <th class="col-6 text-right border-0 p-1">Log Name</th>
                            <td class="col-6 border-0 p-1">{{$act->log_name}}</td>
                        </tr>
                        <tr class="row">
                            <th class="col-6 text-right border-0 p-1">Description</th>
                            <td class="col-6 border-0 p-1">{{$act->description}}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">
                  Subject Detail
                </h5>
                <div class="card-body">
                  <table class="table table-borderless">
                    <tbody>
                        <tr class="row">
                            <th class="col-6 text-right border-0 p-1">Subject Name</th>
                            <td class="col-6 border-0 p-1">{{$act->subject_type}}</td>
                        </tr>
                        <tr class="row">
                            <th class="col-6 text-right border-0 p-1">Subject Id</th>
                            <td class="col-6 border-0 p-1">{{$act->subject->id}}</td>
                        </tr>
                        <tr class="row">
                            <th class="col-6 text-right border-0 p-1">Description</th>
                            <td class="col-6 border-0 p-1">{{$act->description}}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>

          </div>
          <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Old Properties</h5>
                <div class="card-body">
                  @if ($act->description == 'updated')
                    <table>
                      <tbody>
                        <tr class="row">
                          <th class="col-6 text-right border-0 p-1">Old Property</th>
                          <td class="col-6 border-0 p-1">
                          @foreach ($act->changes->toArray()['old'] as $key => $item)

                              <ul>
                                  <li>{{ $key . ' : ' . $item }}</li>
                              </ul>
                              @endforeach
                          </td>
                      </tr>
                      </tbody>
                    </table>
                  @endif
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">{{ ($act->description == 'updated' ) ? 'Changed Properties' : 'New Properties'   }}</h5>
                <div class="card-body">
                  <table>
                    <tbody>
                      <tr class="row">
                        <th class="col-6 text-right border-0 p-1">Changed Property</th>
                        <td class="col-6 border-0 p-1">
                        @foreach ($act->changes->toArray()['attributes'] as $key => $item)

                            <ul>
                                <li>{{ $key . ' : ' . $item }}</li>
                            </ul>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>

      <div class="card">
        <h5 class="card-header">
          Causer Detail
        </h5>
        <div class="card-body">
          <table class="table table-borderless">
            <tbody>
                <tr class="row">
                    <th class="col-md-3 col-5 text-right border-0 p-1">User Name</th>
                    <td class="col-md-3 col-7 border-0 p-1">{{$act->causer->name}}</td>
                </tr>
                <tr class="row">
                    <th class="col-md-3 col-5 text-right border-0 p-1">User Role</th>
                    <td class="col-md-3 col-7 border-0 p-1">{{$act->causer->roles[0]->name}}</td>
                </tr>
                <tr class="row">
                    <th class="col-md-3 col-5 text-right border-0 p-1">User Email</th>
                    <td class="col-md-3 col-7 border-0 p-1">{{$act->causer->email}}</td>
                </tr>
                <tr class="row">
                    <th class="col-md-3 col-5 text-right border-0 p-1">Created at</th>
                    <td class="col-md-3 col-7 border-0 p-1">{{$act->causer->created_at}}</td>
                </tr>
                <tr class="row">
                    <th class="col-md-3 col-5 text-right border-0 p-1">Updated at</th>
                    <td class="col-md-3 col-7 border-0 p-1">{{$act->causer->updated_at}}</td>
                </tr>
            </tbody>
          </table>
        </div>
    </div>
  </div>
@endsection
