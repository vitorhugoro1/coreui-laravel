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
                                            <v-select v-model="master_id" inputId="master_id" :options="{{ $users->toJson() }}" placeholder="Select an Master"></v-select>
                                            <input type="hidden" name="master_id" :value="master_id">
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
    <script src="{{ asset('js/academies/app.js') }}"></script>
@endsection