<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $hotel->name }} - Buildings</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/tap-icon.svg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 40px 0;
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

        .hotel-name {
            font-size: 20px;
            font-weight: 600;
            color: #6c757d;
            margin: 0;
        }

        .logo-container {
            position: relative;
            /* normal flow, not absolute */
            /* space below header-text, centered horizontally */
            text-align: center;
            max-width: 100%;
            z-index: 10;
        }

        .hotel-logo {
            max-height: 120px;
        }

        .main-box {
            background-color: white;
            border: 3px solid #ccc;
            border-radius: 24px;
            padding: 30px;
            max-width: 1000px;
            margin: 60px auto 40px auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .add-building-btn {
            float: right;
            margin-bottom: 20px;
            background-color: #000;
            color: white;
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            /* More rounded */
            text-decoration: none;
        }

        .add-building-btn:hover {
            background-color: #333;
            color: white;
        }

        .building-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding-bottom: 20px;
        }

        .building-box {
            width: 180px;
            height: 100px;
            border-radius: 20px;
            /* More rounded */
            background-color: white;
            border: 2px solid black;
            /* Black border */
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            font-size: 16px;
            color: #333;
            border-bottom: 6px solid black;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.2s ease;
            padding: 10px;
            text-align: center;
            box-sizing: border-box;
        }

        .building-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }
    </style>
</head>

<body>
    @auth
        @if (Auth::user()->role_id === 'admin')
            {{-- header --}}
            <div class="container position-relative bg-white rounded shadow" style="min-height: 100px;">
                <div class="header-text">
                    <p class="welcome-message mb-1">
                        Welcome back, {{ Auth::user()->name ?? 'User' }}
                    </p>
                    <p class="hotel-name">
                        Role: {{ Auth::user()->role_id ?? 'User' }}
                    </p>
                </div>

                <div class="d-flex position-absolute" style="top: 20px; right: 40px; gap: 15px;">
                    <a href="{{ url('hotels/' . $hotel->id . '/buildings/create') }}" class="btn btn-dark fw-semibold">
                        + Add Building
                    </a>
                    <a href="{{ route('adduser') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                        + Add User
                    </a>
                    <a href="{{ route('hotels.index') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                        Hotels
                    </a>
                    <a href="{{ route('logOut') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                        logout
                    </a>
                </div>
            </div>

            <div class="container ">

                {{-- Logo --}}
                @if ($hotel->logo)
                    <div class="logo-container mb-4">
                        <img src="{{ asset($hotel->logo) }}" alt="Hotel Logo" class="hotel-logo">
                    </div>
                @endif

                {{-- Main Content Box --}}
                <div class="main-box">

                    <div class="clearfix"></div>

                    {{-- Buildings Grid --}}
                    <div class="building-grid mt-4">
                        @forelse($hotel->buildings as $building)
                            <div class="building-box">
                                Building {{ $building->building_r_id ?? $building->id }}
                            </div>
                        @empty
                            <p class="text-center w-100">No buildings found for this hotel.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @else
            {{-- header --}}
            <div class="container position-relative bg-white rounded shadow" style="min-height: 100px;">
                <div class="header-text">
                    <p class="welcome-message mb-1">
                        Welcome back, {{ Auth::user()->name ?? 'User' }}
                    </p>
                    <p class="hotel-name">
                        Role: {{ Auth::user()->role_id ?? 'User' }}
                    </p>
                </div>
                <div class="d-flex position-absolute" style="top: 20px; right: 40px; gap: 15px;">

                        <a href="{{ route('logOut') }}" class="btn btn-dark fw-semibold px-4 py-2 rounded">
                            logout
                        </a>

                    </div>

            </div>

            <div class="container ">

                {{-- Logo --}}
                @if ($hotel->logo)
                    <div class="logo-container mb-4">
                        <img src="{{ asset($hotel->logo) }}" alt="Hotel Logo" class="hotel-logo">
                    </div>
                @endif

                {{-- Main Content Box --}}
                <div class="main-box">

                    <div class="clearfix"></div>

                    {{-- Buildings Grid --}}
                    <div class="building-grid mt-4">
                        @forelse($hotel->buildings as $building)
                            <div class="building-box">
                                Building {{ $building->building_r_id ?? $building->id }}
                            </div>
                        @empty
                            <p class="text-center w-100">No buildings found for this hotel.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
    @endauth
</body>

</html>
