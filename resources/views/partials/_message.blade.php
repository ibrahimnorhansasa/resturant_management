@if(Session::has('success'))
<div class="container alert alert-success">
<script>
    swal({
  position: 'top-center',
  type: 'success',
  title: "{{Session::get('success')}}",
  showConfirmButton: false,
  timer: 1500
})
</script>
</div>


@endif
