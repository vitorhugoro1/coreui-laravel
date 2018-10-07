@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Create Category</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.categories.store') }}" method="post">
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
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <v-select v-model="typeModel" inputId="type"
                                            :options="types" placeholder="Select an Type"></v-select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_professional">Is Professional?</label>
                                            <label class="switch switch-pill switch-primary">
                                                <input type="checkbox" class="switch-input" id="is_professional" name="is_professional" required>
                                                <span class="switch-slider"></span>
                                            </label>
                                            @if($errors->has('is_professional'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('is_professional') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12 my-2">
                                        <h3>Modalities</h3>
                                    </div>

                                    <div class="col-lg-12">
                                        <table class="table table-responsive table-striped">
                                            <thead>
                                                <tr>
                                                    <td>Begin Weigth</td>
                                                    <td>End Weigth</td>
                                                    <td>Gender</td>
                                                    <td>Age Bracket</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Begin Weigth</td>
                                                    <td>End Weigth</td>
                                                    <td>Gender</td>
                                                    <td>Age Bracket</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
@endsection