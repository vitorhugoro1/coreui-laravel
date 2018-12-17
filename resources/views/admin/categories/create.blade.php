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
                                            <label for="professional">Is Professional?</label>
                                            <select name="professional" id="professional" class="form-control{{ $errors->has('professional') ? ' is-invalid' : '' }}" required>
                                                <option value="0">Not</option>
                                                <option value="1">True</option>
                                            </select>
                                            @if($errors->has('professional'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('professional') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6" v-show="typeInput != 'forms'">
                                        <div class="form-group" v-if="typeInput !== 'forms'">
                                            <label for="gender">By Gender</label>
                                            <select name="gender" id="gender" v-model="genderInput" class="form-control" required @change="changeGender(genderInput)">
                                                <option value="0">Not</option>
                                                <option value="1">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" v-show="typeInput != 'forms'">
                                        <div class="form-group" v-if="typeInput !== 'forms'">
                                            <label for="weapon">Has Weapon</label>
                                            <select name="weapon" id="weapon" class="form-control" required>
                                                <option value="0">Not</option>
                                                <option value="1">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" v-show="typeInput != 'forms'">
                                        <div class="form-group" v-if="typeInput !== 'forms'">
                                            <label for="age_bracket">Has Age Bracket</label>
                                            <select name="age_bracket" id="age_bracket" v-model="ageBracketInput" class="form-control" @change="changeAgeing(ageBracketInput)" required>
                                                <option value="0">Not</option>
                                                <option value="1">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" v-show="typeInput != 'forms'">
                                        <div class="form-group" v-if="typeInput !== 'forms'">
                                            <label for="team">Has Team</label>
                                            <select name="team" id="team" class="form-control" required>
                                                <option value="0">Not</option>
                                                <option value="1">True</option>
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
    <script src="{{ mix('js/categories/app.js') }}"></script>
    <script>
        $('.select2').each(function () {
            $(this).select2({
                theme: 'bootstrap'
            });
        });
    </script>
@endsection