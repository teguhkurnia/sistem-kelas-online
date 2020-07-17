@extends('main')

@section('css')
    {{-- <style>
        .ui-state-highlight { line-height: 1.2em; border: 1px solid black}
    </style> --}}
@endsection

@section('content')
<div class="container">
    <h1>Menu Builder</h1>
    <button type="button" class="btn btn-success add-btn mb-4" data-toggle="modal" data-target="#exampleModal">
        Add
    </button>

    <div class="alert alert-primary" role="alert">
        Drag Item to Change Order!
    </div>
</div>

    @if ($menuItem->count() > 0)
    <div class="card">
        <h5 class="card-header">Menu Items on {{ $menu->name }}</h5>
        <div class="card-body">
            <ul class="list-group sortable1">
            @foreach ($menuItem as $mi)
            <div class="s1" id="{{ $mi->id }}">
                <li class="list-group-item list-group-item-action mb-1">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h5>{{ $mi->title }}<small class="ml-2">{{ parse_url($mi->link(), PHP_URL_PATH) }}</small></h5>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-info edit-btn py-1 text-white" data-toggle="modal" data-target="#exampleModal" data-id="{{ $mi->id }}">Edit</a>
                            <a href="/menu/builder/{{$mi->id}}/delete" class="btn btn-danger py-1">Delete</a>
                        </div>
                    </div>
                </li>
                @if ($mi->child)
                <ul class="list-group justify-content-end sortable2">
                    @foreach ($mi->child as $child)
                    <div class="row s2" id="{{ $child }}">
                        <div class="col-md-1 col-2">
                            <span class="material-icons h1 ml-md-5">
                            subdirectory_arrow_right
                            </span>
                        </div>
                        <div class="col-md-11 col-10">
                            <li class="list-group-item list-group-item-action mb-1">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>{{$child->title}}<small class="ml-2">{{ parse_url($child->link(), PHP_URL_PATH) }}</small></h6>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="btn btn-info edit-btn py-1 text-white" data-toggle="modal" data-target="#exampleModal" data-id="{{ $child->id }}">Edit</a>
                                        <a href="/menu/builder/{{$child->id}}/delete" class="btn btn-danger py-1">Delete</a>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
                    @endforeach
                </ul>
            </div>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Menu on {{ $menu->name }}</h5>
            <div class="text-center">
                <p class="card-text">No Item</p>
            </div>
        </div>
    </div>
    @endif

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-info">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/menu/additem" method="POST">
                @method('put')
                @csrf
                <input type="hidden" name="menu_id" value="{{$menu->id}}">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" id="ischild">
                          </div>
                        </div>
                        <input type="text" class="form-control" value="Is Dropdown Item?" readonly>
                      </div>
                    <div class="row mb-1">
                        <div class="col parent" hidden>
                            <label for="parent">Parent</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">- Select Parent -</option>
                                @foreach ($menuItem as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="title">Tittle Of The Menu Item</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="type">Url Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="dynamic" selected>Dynamic Route</option>
                                <option value="url">Url</option>
                            </select>
                        </div>
                    </div>
                    <section class="url p-0">

                    </section>

                <div class="row">
                    <div class="col form-group">
                        <label for="icon">Font Icon Class (Use FontAwesome)</label>
                        <input type="text" name="icon" id="icon" class="form-control">
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

@section('js')
    <script>
        $(document).ready(function(){
            $('#type').on('change', function(){
                console.log($(this).val())
                if ($(this).find('option:selected').val() == 'url') {
                    $('.url').html(
                        `
                            <label for="url">Url</label>
                            <input type="text" name="url" id="url" class="form-control">
                        `
                    )

                } else {
                    $('.url').load('/url')
                }
            })

            $('#ischild').on('change', function(){
                if(this.checked){
                    $('.parent').attr('hidden', false)
                } else {
                    $('.parent').attr('hidden', true)
                }
            })
        })
    </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('dist/js/jquery.ui.touch-punch.min.js') }}"></script>
<script>

    $( function() {
        let idsInOrder;
        $( ".sortable1" ).sortable({
            items: ".s1",
            placeholder: "ui-state-highlight",
            start: function(e, ui){
                ui.placeholder.height(ui.item.height())
                ui.placeholder.addClass('border-secondary')
            },
            stop: function(){
                $.ajax({
                    url: '/menu/neworder',
                    type: 'POST',
                    data: {
                        order: $( ".sortable1" ).sortable( "toArray", {attribute: 'id'}),
                        _token: $('input[name=_token]').val()
                    },
                    success: console.log('New Order')
                })
                $('.c-sidebar').load('/sidebar')
            }
        });
            $( ".sortable1" ).disableSelection();

        $( ".sortable2" ).sortable({
            items: ".s2",
            placeholder: "ui-state-highlight",
            start: function(e, ui){
                ui.placeholder.height(ui.item.height())
                ui.placeholder.addClass('border-secondary')
            },
            stop: function(){
                $.ajax({
                    url: '/menu/neworder',
                    type: 'POST',
                    data: {
                        order: $( ".sortable1" ).sortable( "toArray", {attribute: 'id'}),
                        _token: $('input[name=_token]').val()
                    },
                    success: console.log('New Order')
                })
                $('.c-sidebar').load('/sidebar')
            }
        });
            $( ".sortable2" ).disableSelection();
    });
</script>
<script>
    $(document).ready(function(){
        $('.edit-btn').on('click', function(){
           $.ajax({
               url: '/menu/getItem',
               type: 'Post',
               data: {
                   _token: $('input[name=_token]').val(),
                   id: $(this).data('id')
               },
               success: function(data){
                   $('form').attr('action', '/menu/editItem')
                   $('#id').val(data.id)
                   if (data.parent_id) {
                       $('#ischild').attr('checked', true)
                       $('.parent').attr('hidden', false)
                       $('#parent_id').val(data.parent_id)
                   }else {
                       $('#ischild').attr('checked', false)
                       $('.parent').attr('hidden', true)
                       $('#parent_id').val('')
                   }
                    $('#title').val(data.title)
                    if(data.route !== null){
                        $('.url').load('/url')
                        $('#type').val('dynamic')
                        $('#route').val(data.route)
                        $('#params').val(data.prams)
                        $('#url').val('')
                    }else{
                        $('.url').html(
                            `<label for="url">Url</label>
                            <input type="text" name="url" id="url" class="form-control">`
                            )
                            $('#url').val(data.url)
                    }
                    $('#icon').val(data.icon)
                    $('button[type=submit]').html('Edit')
               }
           })
        })

        $('.add-btn').on('click', function(){
            $('form').attr('action', '/menu/addItem')
                    $('#id').val('')
                       $('#ischild').attr('checked', false)
                       $('.parent').attr('hidden', true)
                       $('#parent_id').val('')
                    $('#title').val('')
                    $('.url').load('/url')
                    $('#url').val('')
                    $('#icon').val('')
                    $('button[type=submit]').html('Add')
        })


    })
</script>
@endsection
