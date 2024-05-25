@extends('layouts.mainlayout')

@section('title', 'Deleted Books')

@section('content')
    <div class="container">  <div class="card shadow">
        <div class="card-header bg-primary text-light">
            <h4 class="my-3">Deleted Book Lists</h4>
        </div>
        <div class="card-body p-3">
            @if (session('success-status'))
            <div class="alert alert-success">
                {{ session('success-status') }}
            </div>
            @elseif (session('danger-status'))
            <div class="alert alert-danger">
                {{ session('danger-status') }}
            </div>
            @endif

            <div class="mb-3 d-flex justify-content-end">
            <a href="/books" class="btn btn-dark me-3">
                <i class="fa fa-sign-out"></i> Back
            </a>
            </div>

            <table class="table table-striped table-bordered">
            <thead class="table-info text-center">
                <tr>
                <th>#</th>
                <th>Book Code</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Cover</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($deletedBooks) > 0)
                @foreach ($deletedBooks as $data)
                    <tr class="text-center">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->book_code }}</td>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->author }}</td>
                    <td>{{ $data->publisher ?? 'N/A' }}  </td>
                    <td>
                        @if ($data->cover != '')
                        <img src="{{ asset('storage/cover/'.$data->cover) }}" width="100px" height="110px" alt="{{ $data->title }}">
                        @else
                        <img src="{{ asset('assets/img/cover-not-available.jpg') }}" width="100px" height="110px" alt="Cover Not Available">
                        @endif
                    </td>
                    <td>
                        <a href="book-restore/{{ $data->slug }}" class="btn btn-primary"><i class="fa fa-undo"></i> Restore</a>
                    </td>
                    </tr>
                @endforeach
                @else
                <tr class="text-center">
                    <td colspan="7">No deleted books found.</td>
                </tr>
                @endif
            </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection
