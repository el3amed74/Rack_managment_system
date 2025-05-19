<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Our Clients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

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

    <div class="container">
        <div class="header-text">
            <div class="welcome-message">Welcome Back {{ Auth::user()->name ?? 'User' }}</div>
        </div>
        <div class="header-row">
            <h2>Our Clients</h2>
            <div>
                <a href="{{ route('hotels.create') }}" class="btn-dark">+ Add Hotel</a>
                <img src="{{ asset('images/hotels/filter.png') }}" alt="Filter" title="Filter" class="filter-icon" />
            </div>
        </div>

        <div class="grid">
            @if($hotels->count())
                @foreach ($hotels as $hotel)
                    <a href="{{ url('hotels/' . $hotel->id . '/buildings') }}">
                        <img src="{{ asset($hotel->logo) }}" alt="{{ $hotel->name }}" />
                    </a>
                @endforeach
            @else
                <p>No hotels found.</p>
            @endif
        </div>

    </div>

</body>

</html>