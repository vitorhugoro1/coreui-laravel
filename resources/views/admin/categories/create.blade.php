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
                                <div class="row mb-2">
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
                                            <label for="type">Type</label>
                                            <select name="type" id="type" class="form-control" required @change="changeType(typeInput)" v-model="typeInput">
                                                <option value="forms">Forms</option>
                                                <option value="weights">Weights</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="is_professional">Is Professional?</label>
                                            <select name="is_professional" id="is_professional" class="form-control" required>
                                                <option value="false">Not</option>
                                                <option value="true">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" v-if="typeInput != 'forms'">
                                        <div class="form-group">
                                            <label for="by_gender">By Gender</label>
                                            <select name="by_gender" id="by_gender" v-model="genderInput" class="form-control" required @change="changeGender(genderInput)">
                                                <option value="false">Not</option>
                                                <option value="true">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="has_weapon">Has Weapon</label>
                                            <select name="has_weapon" id="has_weapon" class="form-control" required>
                                                <option value="false">Not</option>
                                                <option value="true">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="has_age_bracket">Has Age Bracket</label>
                                            <select name="has_age_bracket" id="has_age_bracket" class="form-control" required>
                                                <option value="false">Not</option>
                                                <option value="true">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <weights-creator-component :gender="gender" v-if="typeInput != 'forms'"></weights-creator-component>
                                        <forms-creator-component :gender="gender" v-if="typeInput === 'forms'"></forms-creator-component>
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
        $('.select2').each(function () {
            $(this).select2({
                theme: 'bootstrap'
            });
        });
    </script>
@endsection