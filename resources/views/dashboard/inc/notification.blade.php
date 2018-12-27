
@if(session('success'))
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>
		{{ session('success') }}
	</div>
@endif

@if(session('info'))
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>
		{{ session('info') }}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <h4><i class="icon fa fa-info"></i> Pemberitahuan!</h4>
	    {{ session('error') }}
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger alert-dismissible">
	   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	   <h4><i class="icon fa fa-info"></i> Pemberitahuan!</h4>
	    {{ $errors->first() }}
	</div>
@endif