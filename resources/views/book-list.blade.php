@extends('layouts.mainlayout')

@section('title', 'Book-List')

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
                            <div class="col-auto">  <div class="input-group input-group-sm">  
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
            <div class="row">
            @foreach ($bookList as $data)
                <div class="col-md-4">
                <div class="card mb-3 h-100">
                    <div class="card-header bg-light">
                    <h6 class="card-title">{{ $data->title }}</h6>
                    </div>
                    <div class="card-body">
                    <p class="card-text">
                        <b>Cateory:</b> 
                        @foreach ($data->categories as $category)
                        <span>{{ $category->name }}</span>, 
                        @endforeach
                        <br>
                        <b>Author:</b> {{ $data->author }}<br>
                    </p>
                    @if ($data->cover != '')
                        <img src="{{asset('storage/cover/'.$data->cover)}}" draggable="false" class="card-img-top" alt="{{ $data->title }}">
                    @else
                        <img src="{{asset('assets/img/cover-not-available.jpg')}}" draggable="false" class="card-img-top" alt="{{ $data->title }}">
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
        img {
            height: 300px;
        }
    </style>
@endsection