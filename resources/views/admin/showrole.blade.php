                    @foreach ($role as $r)
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            @if ($r->id == $userRole)
                                <input type='radio' class='role' data-role-id="{{ $r->id }}" name='role' checked>
                            @else
                                <input type='radio' class='role' data-role-id="{{ $r->id }}" name='role'>
                            @endif
                          </div>
                        </div>
                        <input type="text" class="form-control" readonly value="{{ $r->name }}">
                    </div>
                    @endforeach
