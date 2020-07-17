@extends('main')

@section('content')
    <button class="swal">CLick</button>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.swal').on('click', function(){
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })
            })
        })
    </script>
@endsection
