@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

    <h2>Welcome, {{ Auth::user()->username }}</h2>
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6"><i class="fa fa-book"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="card-title">Books</div>
                        <div class="card-count">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6"><i class="fa fa-list"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="card-title">Categories</div>
                        <div class="card-count">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data user text-light">
                <div class="row">
                    <div class="col-6"><i class="fa fa-users"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="card-title">Users</div>
                        <div class="card-count">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>Loan Logs</h2>
        <table class="table table-striped table-bordered">
            <thead class="bg-dark text-light">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Book Title</th>
                    <th>Loan Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" class="text-center">No Data Available</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection