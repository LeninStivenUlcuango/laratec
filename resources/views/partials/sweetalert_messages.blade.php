<script type="module">
    @if(session()->has('message'))
    Toast.fire({
            icon: 'success',
            title: "{{session('message')}}",
    });
    @endif
</script>