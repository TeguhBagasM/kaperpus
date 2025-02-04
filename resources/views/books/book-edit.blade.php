@extends('layouts.mainlayout')

@section('title', 'Update Book')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
    <div class="row mb-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-dark pt-2">Update Book</h4>
                </div>
                <div class="card-body">
                    <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label" for="book_code">Book Code</label>
                            <div class="col-sm-9">
                                <input type="text" name="book_code" value="{{ $book->book_code }}" class="form-control" id="book_code">
                                @error('book_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label" for="title">Book Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" value="{{ $book->title }}" id="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label" for="author">Author</label>
                            <div class="col-sm-9">
                                <input type="text" name="author" class="form-control" value="{{ $book->author }}" id="author">
                                @error('author')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label" for="publisher">Publisher</label>
                            <div class="col-sm-9">
                                <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}" id="publisher">
                                @error('publisher')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="cover">Previous Cover</label>
                            <div class="col-sm-9">
                                @if($book->cover != '')
                                <img src="{{asset('storage/cover/'.$book->cover)}}" class="img-fluid" width="100px" height="110px" alt="{{ $book->title }}">
                                @else
                                <img src="{{asset('assets/img/cover-not-available.jpg')}}" class="img-fluid" alt="Cover Not Available">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label" for="image">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="cover">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="categories[]" id="categories" class="form-control select-multiple" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if(in_array($category->id, $book->categories->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="currentCategory" class="col-sm-3 col-form-label">Current Category</label>
                            <div class="col-sm-9">
                                <ul class="list-unstyled">
                                    @foreach ($book->categories as $category)
                                    <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="/books" class="btn btn-dark">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
@endsection
