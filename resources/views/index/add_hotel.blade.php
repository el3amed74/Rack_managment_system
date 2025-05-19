<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f4f5f7;
        }

        .container {
            max-width: 600px;
            padding: 40px;
            margin: 50px auto;
            background-color: #f8f8f9;
            border-radius: 10px;
            box-shadow: none; /* removed shadow for cleaner look */
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            color: #212529;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
            color: #212529;
        }

        input[type="text"], input[type="file"] {
            width: 50%;
            padding: 8px;
            border: 3px solid #ddd;
            border-radius: 20px;
            background-color: white;
            border-color: #eaeae8;
        }

        input[type="file"] {
            cursor: pointer;
        }

        button.btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #4c8fcd;
            border: none;
            border-radius: 20px;
            color: white;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.btn-primary:hover {
            background-color: #3b6fa3;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
            padding: 15px;
            font-size: 16px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: inherit;
        }
    </style>
</head>
<body>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>There were some problems with your input:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-title">Add Hotel</div>

        <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Hotel Name</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Enter hotel name" />
            </div>

            <div class="form-group">
                <label for="building_id">Building Number</label>
                <input type="text" id="building_id" name="building_id" class="form-control" required placeholder="e.g., B1, Tower-3" />
            </div>

            <div class="form-group">
                <label for="logo">Logo Image</label>
                <input type="file" id="logo" name="logo" class="form-control" accept="image/*" required />
            </div>

            <button type="submit" class="btn btn-primary">Save Hotel</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
