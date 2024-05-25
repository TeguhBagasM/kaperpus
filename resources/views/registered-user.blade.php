@extends('layouts.mainlayout')

@section('title', 'Registered Users')

@section('content')
    <div class="container">
        <div class="card shadow">
         <div class="card-header bg-primary text-light">
                <h4 class="my-3">New Registered User Lists</h4>
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
                    <a href="/users" class="btn btn-primary"><i class="fa fa-sign-out"></i> Back</a>
                </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered mt-4">
                    <thead class="table-info text-center">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($registeredUsers) > 0)
                        @foreach ($registeredUsers as $data)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->username }}</td>
                            <td>
                                @if ($data->phone)
                                {{ $data->phone }}
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $data->status }}</td>                            
                            <td>
                                <a href="/user-detail/{{ $data->slug }}" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="text-center">
                            <td colspan="7">No Data Available</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
