@extends('layouts.mainlayout')

@section('title', 'Deleted Category')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary text-light">
                <h4 class="my-3">Deleted Category Lists</h4>
            </div>
            <div class="card-body p-3">
                @if(session('success-status'))
                    <div class="alert alert-success">
                        {{ session('success-status') }}
                    </div>
                @elseif(session('danger-status'))
                    <div class="alert alert-danger">
                        {{ session('danger-status') }}
                    </div>
                @endif

                <div class="mb-3 d-flex justify-content-end">
                    <a href="/categories" class="btn btn-dark me-3">
                        <i class="fa fa-sign-out"></i> Back</a>
                </div>

                <table class="table table-striped table-bordered">
                    <thead class="table-info text-center">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($deletedList) > 0)
                            @foreach ($deletedList as $data)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <a href="category-restore/{{ $data->slug }}" class="btn btn-primary"><i class="fa fa-undo"></i> Restore</a>
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
