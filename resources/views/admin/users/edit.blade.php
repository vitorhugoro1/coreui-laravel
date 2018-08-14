@extends('master')

@section('content')
<div class="container-fluid">
	<div class="animate fadeIn">
		<h1>Edit User</h1>
		<div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $erros->get('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $erros->get('email') }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection