@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Create Academy</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.academies.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
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
                                            <label for="master_id">Master</label>
                                            <select class="form-control select2" name="master_id" id="master_id">
                                                    <option value="">Select an User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user['value'] }}">{{ $user['label'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            HERE MAPA
                                        </div>
                                    </div>
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

@section('myscript')
    <script src="{{ asset('js/categories/app.js') }}"></script>
    <script>
        $('select').each(function () {
            $(this).select2({
                theme: 'bootstrap'
            });
        });
    </script>
@endsection