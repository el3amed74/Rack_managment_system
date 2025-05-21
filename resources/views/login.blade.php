<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/tap-icon.svg') }}">

    <title>Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            background: url('{{ asset("images/background.png") }}') no-repeat center center fixed;
            background-size: cover;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.386);
            padding: 40px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            border-radius: 20px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: row;
        }
          .login-left {
            flex: 1;
            background: url('{{ asset("images/login-image.png") }}') no-repeat  center center ;
            
        }

        .login-right {
            flex: 1;
            padding: 0px 30px;
        }

        .login-logo {
            width: 250px;
            height: 250px;
            display: block;
            margin: 0 auto;
        }

        .login-form h3 {
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-control {
            padding: 12px 15px;
            font-size: 16px;
        }

        .btn-primary {
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                height: 200px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-container">
            <!-- Left Image -->
            {{-- <div class="login-left d-none d-md-block">
                <img src="{{ asset("images/login-image.png") }}" alt="" srcset="">
            </div> --}}
            <div class="login-left d-none d-md-block"></div>
            <!-- Right Form -->
            <div class="login-right">
                <div class="flex align-center"></div>
                <img src="{{ asset('images/logo.png') }}" alt="Project Logo" class="login-logo">
                @if ($errors->has('login_error'))
                    <div class="alert alert-danger">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif
                <form method="POST" action="/login" class="login-form">
                    @csrf
                    <h3>Welcome Back</h3>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <p class="text-center">PowerSMTP IT Solutions </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>