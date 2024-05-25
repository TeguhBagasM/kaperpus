<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KAPERPUS | @yield('title')</title>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3498db;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fas fa-book me-2 ms-4"></i> KAPERPUS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block text-center" id="navbarSupportedContent">
                @if (Auth::user())
                        
                    @if (Auth::user()->role_id == 1)
                    <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active bg-primary" @endif><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="/books" @if (request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-edit/{slug}' || request()->route()->uri == 'book-deleted-list')) class="active bg-primary" @endif><i class="fas fa-book"></i> Books</a>
                    <a href="/categories" @if (request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-deleted-list') class="active bg-primary" @endif><i class="fas fa-list"></i> Categories</a>
                    <a href="/users" @if (request()->route()->uri == 'users' || request()->route()->uri =='registered-user' || request()->route()->uri == 'user-detail/{slug}') class="active bg-primary" @endif><i class="fas fa-users"></i> Users</a>
                    <a href="/loans" @if (request()->route()->uri == 'loans') class="active bg-primary" @endif><i class="fas fa-hand-holding-usd"></i> Book Loans</a>
                    <a href="/return-book" @if (request()->route()->uri == 'return-book') class="active bg-primary" @endif><i class="fas fa-undo"></i> Book Return</a>
                    <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    @else  
                    <a href="profile" @if (request()->route()->uri == 'profile') class="active bg-primary" @endif><i class="fas fa-user"></i> Profile</a>
                    <a href="/" @if (request()->route()->uri == '/') class="active bg-primary" @endif><i class="fas fa-book"></i> Book List</a>
                    <a href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    @endif
                    @else
                    <a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
                @endif
                
                </div> 
                
                    <div class="content p-5 col-lg-10">
                        @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>