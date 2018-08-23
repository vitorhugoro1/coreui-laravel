@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Create Championship</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.roles.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required>
                                            @if($errors->has('title'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('title') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                                <option value="published" selected>Publish</option>
                                                <option value="drafted">Draft</option>
                                                <option value="deleted">Delete</option>
                                            </select>
                                            @if($errors->has('status'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('status') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="period">Event Periods</label>
                                            <date-range id="period" name="period"></date-range>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <ckeditor content="" id="content" name="content" :readonlymode="false"></ckeditor>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <h3>Subscription</h3>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
                                                    <i class="icon-calculator"></i> Subscription Values</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">
                                                    <i class="icon-basket-loaded"></i> Bank Accounts</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#messages3" role="tab" aria-controls="messages">
                                                    <i class="icon-pie-chart"></i> Charts</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="home3" role="tabpanel">
                                                <div class="form-group">
                                                    <label class="col-md-1 p-0">Is Free?</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" id="input-is_free-1" value="true" name="is_free" type="radio">
                                                        <label class="form-check-label" for="input-is_free-1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" id="input-is_free-2" value="false" name="is_free" type="radio">
                                                        <label class="form-check-label" for="input-is_free-2">No</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Amount</label>
                                                    <div class="controls">
                                                        <div class="input-prepend input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input id="amount" name="amount" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="additional_amount">Additional Amount</label>
                                                    <div class="controls">
                                                        <div class="input-prepend input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input id="additional_amount" name="additional_amount" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payment_method">Payment Methods</label>
                                                    <select name="payment_method[]" id="payment_method" class="form-control" multiple>
                                                        <option value="paypal">PayPal</option>
                                                        <option value="pagseguro">PagSeguro</option>
                                                        <option value="bank_cash">Bank Cash</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="profile3" role="tabpanel">
                                                <table class="table-responsive table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <input type="checkbox">
                                                            </th>
                                                            <th>#ID</th>
                                                            <th>Name</th>
                                                            <th>Account Owner</th>
                                                            <th>Owner Document</th>
                                                            <th>Bank</th>
                                                            <th>Agency</th>
                                                            <th>Account Nº</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox">
                                                            </td>
                                                            <th>1</th>
                                                            <td>Bradesco</td>
                                                            <td>Vitor Hugo</td>
                                                            <td>425.239.728-67</td>
                                                            <td>Bradesco</td>
                                                            <td>1628</td>
                                                            <td>75296-7</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>
                                                                <input type="checkbox">
                                                            </th>
                                                            <th>#ID</th>
                                                            <th>Name</th>
                                                            <th>Account Owner</th>
                                                            <th>Owner Document</th>
                                                            <th>Bank</th>
                                                            <th>Agency</th>
                                                            <th>Account Nº</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <button type="button" class="btn btn-outline-secondary">Add Account</button>
                                            </div>
                                            <div class="tab-pane" id="messages3" role="tabpanel">
                                                3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
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
    <script src="{{ asset('js/championship/app.js') }}"></script>
@endsection