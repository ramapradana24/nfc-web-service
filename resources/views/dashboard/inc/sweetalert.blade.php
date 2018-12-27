@if(session('success'))
    <script type="text/javascript">
        setTimeout(function(){
        	swal("SUKSES!", "{{ session('success') }}", "success");
        }, 600);
    </script>
@endif