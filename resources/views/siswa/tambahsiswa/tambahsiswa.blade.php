@extends('main')

@section('css')
    <link rel="stylesheet" href="{{asset('/dist/css/progres.css')}}">
@endsection

@section('content')
<!-- MultiStep Form -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Tambah Data Siswa</h3>
                    <hr>
                    <form action="{{ route('form.add') }}" method="POST" id="msform" class="form-horizontal form-label-left">
                        @csrf
                        <div class="container">
                            <ul id="progressbar" >
                                <li class="active" id="account">Data Pribadi</li>
                                <li id="personal">Sekolah Sebelumnya</li>
                                <li id="payment">Orang Tua</li>
                                <li id="confirm">Lain - Lain</li>
                            </ul>
                        </div>
                        {{-- Step 1 --}}
                        @include('siswa.tambahsiswa.tambahsiswa_step1')
                        {{-- step 2 --}}
                        @include('siswa.tambahsiswa.tambahsiswa_step2')
                        {{-- step 3 --}}
                        @include('siswa.tambahsiswa.tambahsiswa_step3')
                        {{-- step 4 --}}
                        @include('siswa.tambahsiswa.tambahsiswa_step4')
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$(".submit").click(function(){
return false;
})

function fetch_wilayah(wilayah, id1) {
    $.ajax({
        url: '/siswa/form/fetch_wilayah?wilayah='+wilayah+'&id='+id1,
        success: function(data){
            $('#'+wilayah).html(data)
        }

    })
}

$('.wilayah').on('change', function(){
    let wilayah = $(this).data('nama_wilayah')
    console.log(wilayah)
    let wilayah_id = $(this).find('option:selected').data('id')
    let wilayahs = ''
    if (wilayah == 'provinsi'){
        wilayahs = 'kabupaten'
    }else if(wilayah == 'kabupaten'){
        wilayahs = 'kecamatan'
    }else if(wilayah == 'kecamatan'){
        wilayahs = 'desa'
    }
    fetch_wilayah(wilayahs, wilayah_id)
})

$('.jk').on('click', function(){
    if($(this).val() == 'Laki-Laki'){
        $('#foto').val('default-male.jpg')
    }else{
        $('#foto').val('default-female.jpg')
    }
})


});

</script>
@endsection
