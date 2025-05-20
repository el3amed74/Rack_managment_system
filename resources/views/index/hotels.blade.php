<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Our Clients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="icon" type="image/png" href="{{ asset('images/tap-icon.svg') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 28px;
            margin: 0;
            color: #333;
        }

        .btn-dark {
            background-color: #343a40;
            color: white;
            padding: 7px 15px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 14px;
            margin-right: 15px;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        img.filter-icon {
            width: 30px;
            height: 30px;
            cursor: pointer;
            vertical-align: middle;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .grid a {
            display: block;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .grid a:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .grid img {
            width: 100%;
            height: auto;
            object-fit: contain;
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
            {{-- header --}}
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
                    <a href="{{ route('hotels.create') }}"
                        class="btn-dark text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                        + Add Hotel
                    </a>
                    <a href="{{ route('adduser') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                        + Add User
                    </a>
                    <a href="{{ route('logOut') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                        logout
                    </a>
                </div>
            </div>
            <div class="container mx-auto px-4 py-6">

                {{-- Title --}}
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Our Clients</h2>
                </div>

                {{-- Hotel Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @if ($hotels->count())
                        @foreach ($hotels as $hotel)
                            <a href="{{ url('hotels/' . $hotel->id . '/buildings') }}"
                                class="block border rounded shadow hover:shadow-md transition">
                                <img src="{{ asset($hotel->logo) }}" alt="{{ $hotel->name }}"
                                    class="w-full h-32 object-contain p-2 bg-white" />
                            </a>
                        @endforeach
                    @else
                        <p class="text-gray-500 col-span-full">No hotels found.</p>
                    @endif
                </div>
            </div>
        @else
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <h1 class="text-center">Access denied, you have no permission</h1>
            </div>

        @endif
    @endauth

</body>

</html>
