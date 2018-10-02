@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Categories</h1>

            @includeWhen(session('message'), 'helpers.alert', [ 'type' => 'success' ])

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-outline-primary" href="{{ route('admin.categories.create') }}">Create</a>
                            <table class="table table-striped table-responsive-sm mt-2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Is Professional</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->type }}</td>
                                        <td>{{ $category->is_professional }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                @hasallroles('admin|collaborator')
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}`" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                    @if(auth()->user()->isCollaborator() && $category->createdByMe() ||
                                                        auth()->user()->isAdmin())
                                                        <a class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endif
                                                @endhasallroles
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Not has categories</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $categories->links() }}
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