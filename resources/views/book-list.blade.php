@extends('layouts.mainlayout')

@section('title', 'Book List')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-light">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="my-3">Book List</h4>
                <div class="d-flex">
                    <form class="form-inline me-2" method="GET">
                        <div class="row g-2">
                            <div class="col-auto">
                                <select class="form-select form-select-sm" name="category" aria-label="Category">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm">
                                    <input type="search" class="form-control" name="title" placeholder="Search by Title" aria-label="Search">
                                    <button type="submit" class="btn btn-outline-light btn-sm">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($bookList as $data)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-light">
                            <h6 class="card-title">{{ $data->title }}</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <b>Category:</b>
                                @foreach ($data->categories as $category)
                                <span>{{ $category->name }}</span>,
                                @endforeach
                                <br>
                                <b>Author:</b> {{ $data->author }}<br>
                            </p>
                            @if ($data->cover != '')
                            <img src="{{ asset('storage/cover/'.$data->cover) }}" class="card-img-top img-fluid" alt="{{ $data->title }}">
                            @else
                            <img src="{{ asset('assets/img/cover-not-available.jpg') }}" class="card-img-top img-fluid" alt="{{ $data->title }}">
                            @endif
                            <p class="card-text text-end fw-bold mt-3 {{ $data->status == 'in stock' ? 'text-success' : 'text-danger' }}">{{ $data->status }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .card-img-top {
        max-height: 300px;
        object-fit: cover;
    }
</style>

@endsection
