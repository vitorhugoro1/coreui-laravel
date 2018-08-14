@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Roles</h1>
            @includeWhen(session('message'), 'helpers.alert', [ 'type' => 'success' ])
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-outline-primary" href="{{ route('admin.roles.create') }}">Create</a>
                            <table-component :data="{{ $roles->toJson() }}" table-class="table table-striped table-responsive-sm" filter-input-class="mb-md-2 form-control col-md-3 float-right" :show-caption="false">
                                <table-column show="name" label="Name"></table-column>
                                <table-column show="permissions_count" label="Permissions"></table-column>
                                <table-column show="users_count" label="Users"></table-column>
                                <table-column label="" :sortable="false" :filterable="false">
                                    <template slot-scope="row">
                                        <div class="btn-group" role="group">
                                            <a :href="`{{ url('admin/roles') }}/${row.id}/edit`" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                            @role('admin')
                                                <a class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            @endrole
                                        </div>
                                    </template>
                                </table-column>
                            </table-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection