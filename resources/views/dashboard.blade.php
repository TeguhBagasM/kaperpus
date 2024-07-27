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
@endsection