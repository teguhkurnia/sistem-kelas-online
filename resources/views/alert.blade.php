@if (session()->get('success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{session()->get("success")}}'
        })
    </script>
@elseif (session()->get('error'))
<script>
    Toast.fire({
        icon: 'error',
        title: '{{session()->get("error")}}'
    })
</script>

@elseif($errors->any())
@foreach ($errors->all() as $error)
<script>
    Toast.fire({
        icon: 'error',
        title: '{{$error}}'
    })
</script>
@endforeach
@endif
