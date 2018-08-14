@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Create Role</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.roles.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                            @if($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="guard">Guard</label>
                                            <input type="text" name="guard_name" id="guard" class="form-control{{ $errors->has('guard') ? ' is-invalid' : '' }}" required>
                                            @if($errors->has('guard'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('guard') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if($permissions->isNotEmpty())
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="permissions">Assign Permissions</label>
                                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                                @foreach($permissions as $permission)
                                                    <option value="{{ $permission['id'] }}">{{ $permission['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('permissions'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('permissions') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection