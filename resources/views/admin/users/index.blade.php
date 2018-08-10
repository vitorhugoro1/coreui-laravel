@extends('master')
@section('content')
<div class="container-fluid">
	<div class="animate fadeIn">
		<h1>Users</h1>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"></div>
					<div class="card-body">
						<table-component :data="{{ $users->toJson() }}" table-class="table table-striped table-responsive-sm" filter-input-class="mb-md-2 form-control col-md-3 float-right" :show-caption="false">
							<table-column show="name" label="Name"></table-column>
							<table-column show="email" label="Email"></table-column>
						</table-component>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection