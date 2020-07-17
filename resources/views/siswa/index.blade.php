@extends('main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-sm-4">
                            <h3 class="card-title">Tabel Data Siswa</h3>
                        </div>
                        <div class="col-sm-2 col-md-2 text-right">
                            <a href="/siswa/exportAll" class="text-success">Export To Excel <i class="far fa-file-excel"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <a class="btn btn-primary" href="/siswa/form"><i class="fa fa-user-plus"></i> Add Data</a>
                        <a class="btn btn-primary" href="/siswa/form"><i class="fas fa-file-import"></i> Import From Excel</a>
                    </div>

                    <div class="row justify-content-between">
                        <div class="col-md-5 col-sm-5 mt-2">
                            <select name="paginate" id="paginate" class="form-control col-md-2 col-sm-2">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                            <label for="paginate" class="label-control col-md-5 col-sm-5">Data Per Halaman</label>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" name="search" id="search" class="form-control">
                        </div>
                    </div>

                    <table class="table table-bordered table-responsive-sm mt-2">
                        <thead>
                            <tr>
                                <th class="sorting" data-sorting_type="asc" data-column_name="id" ># <i class="" id="id_icon"></i></th>
                                <th>Foto</th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="nis_lokal" >Nis / Nama Siswa <i class="" id="nis_lokal_icon"></i></th>
                                <th>Kelas</th>
                                <th>Nomor Ortu / Wali</th>
                                <th>Alamat</th>
                                <th>Status Siswa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('siswa.datasiswa_data')
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1">
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id">
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        function fetch_data(page, sort_type, sort_by, query, paginate)
        {
            var paginate = $('#paginate').find('option:selected').val()
            $.ajax({
                url:"/siswa/fetch_data?page="+page+"&sortby="+sort_by+'&sorttype='+sort_type+'&paginate='+paginate+'&query='+query,
                success:function(data){
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        $('#search').on('keyup', function () {
            var query = $(this).val()
            var column_name = $('#hidden_column_name').val()
            var sort_type = $('#hidden_sort_type').val()
            var page = $('#hidden_page').val()
            fetch_data(page, sort_type, column_name, query)
        })

        $('#paginate').on('change', function(){
            var query = $('#search').val()
            var column_name = $('#hidden_column_name').val()
            var sort_type = $('#hidden_sort_type').val()
            var page = $('#hidden_page').val()
            var paginate = $(this).find('option:selected').val()
            fetch_data(page, sort_type, column_name, query, paginate)
        })

        $(document).on('click', '.sorting', function(){
            var column_name = $(this).data('column_name')
            var order_type = $(this).data('sorting_type')
            var reverse_order = ''
            if(order_type == 'asc'){
                $(this).data('sorting_type', 'desc')
                reverse_order = 'desc'
                $('#'+column_name+'_icon').attr('class', 'fas fa-caret-down')
            }
            if(order_type == 'desc'){
                $(this).data('sorting_type', 'asc')
                reverse_order = 'asc'
                $('#'+column_name+'_icon').attr('class', 'fas fa-caret-up')
            }

            $('#hidden_column_name').val(column_name)
            $('#hidden_sort_type').val(reverse_order)
            var page = $('#hidden_page').val()
            var query = $('#search').val()
            var paginate = $('#paginate').find('option:selected').val()
            fetch_data(page, reverse_order, column_name, query ,paginate)
        })
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1]
            $('#hidden_page').val(page);
            var column_name = $('#hidden_column_name').val()
            var sort_type = $('#hidden_sort_type').val()
            var query = $('#search').val()
            var paginate = $('#paginate').find('option:selected').val()
            fetch_data(page, sort_type, column_name, query, paginate)
        })
        $('.ubahfoto').on('click', function(){
            var nis_lokal = $(this).data('nis')
            $.ajax({
                url: '/siswa/ubahfoto/'+nis_lokal,
                success: function(data) {
                    $('.modal-body').html(data)
                }
            })
        })

    });

</script>
@endsection
