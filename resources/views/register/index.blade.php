@extends('layout.main')

@section('content')
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Register </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="sign-in.css" rel="stylesheet">
    <style></style>
  </head>
  <body>
  <main class="w-50 m-auto ">
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
            <label for="name">Your Name</label>
        </div>
        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            <label for="password_confirmation">Confirm Password</label>
        </div>
        <p>Already have an account? <a href="{{ url('/login') }}">Sign in</a></p>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary w-50" type="submit">Register</button>
        </div>
    </form>
</main>

  
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

@endsection
