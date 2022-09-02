<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/css/style.css">

    <style>
        body {
            background-image: url(img/background.jpg);
            background-size: cover;
        }
    </style>

    <title>TEMANS' Store | {{ $title }}</title>
</head>
<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @if (session()->has("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session("success") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has("loginError"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session("loginError") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-signin">
                    <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>

                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control @error('email')
                                is-invalid
                            @enderror" id="email">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                    
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                        {{-- <small class="d-block text-center mt-3"> Not registered? <a href="/register">Register now!</a></small> --}}
                    </form>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+IlRH9sENBO0LRN5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="/js/firebase-conf.js"></script>
    
</body>
</html>