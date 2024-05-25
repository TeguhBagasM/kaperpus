@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')
    <div class="container">
        <div class="card shadow">
         <div class="card-header bg-primary text-light">
                <h4 class="my-3">Category List</h4>
            </div>
            <div class="card-body p-3">
                @if (session('success-status'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    {{ session('success-status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session('danger-status'))
                <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                    {{ session('danger-status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="mb-3 d-flex justify-content-end">
                    <a href="category-deleted-list" class="btn btn-dark me-3"><i class="fa fa-eye"></i> View Deleted Data</a>
                    <a href="category-add" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
                </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered mt-4">
                    <thead class="table-info text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categoriesList) > 0)
                        @foreach ($categoriesList as $data)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <a href="/category-edit/{{ $data->slug }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                <a href="/category-delete/{{ $data->slug }}" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="text-center">
                            <td colspan="3">No data available</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
