<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/tap-icon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px 0;
            position: relative;
            /* For absolute positioning children */
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .header-text {
            text-align: left;
            position: absolute;
            top: 10px;
            left: 40px;
            z-index: 10;
        }

        .welcome-message {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            margin: 0;
        }
    </style>
</head>

<body>
    @auth
        @if (Auth::user()->role_id === 'admin')
        
            <div class="container position-relative bg-white rounded shadow" style="min-height: 120px;">
                <div class="header-text">
                    <p class="welcome-message mb-1">
                        Welcome back, {{ Auth::user()->name ?? 'User' }}
                    </p>
                    <p class="hotel-name">
                        Role: {{ Auth::user()->role_id ?? 'User' }}
                    </p>
                </div>

                <div class="d-flex position-absolute" style="top: 20px; right: 40px; gap: 15px;">
                    <a href="{{ route('hotels.index') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                        Hotels
                    </a>
                    <a href="{{ route('logOut') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                        logout
                    </a>
                </div>
            </div>

            {{-- Form Card --}}
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Create new user</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->has('usercreated'))
                                    <div class="alert alert-success">
                                        {{ $errors->first('usercreated') }}
                                    </div>
                                @endif
                                <form action="{{ route('createuser') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit" class="btn btn-primary w-100">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container d-flex justify-content-center align-items-center min-vh-100">
                    <h1 class="text-center">Access denied, you have no permission</h1>
                </div>
            </div>
        @endif
    @endauth


</body>

</html>
