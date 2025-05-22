<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Racks - {{ $building->building_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            padding: 40px;
        }

        .logo {
            display: block;
            margin: 30px auto;
            max-width: 200px;
        }

        .rack-container {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            background-color: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .rack-box {
            width: 150px;
            height: 100px;
            border: 2px solid #000;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            position: relative;
        }

        .rack-box::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 10%;
            right: 10%;
            height: 4px;
            background-color: #000;
            border-radius: 2px;
        }

        .btn-add-rack {
            position: absolute;
            top: 10px;
            right: 20px;
            background-color: #000;
            color: white;
            border-radius: 25px;
            font-weight: bold;
            padding: 8px 20px;
            border: none;
            font-size: 14px;
        }

        .breadcrumb-text {
            color: #6c757d;
            margin-top: 10px;
            font-size: 14px;
            text-align: left;
        }
    </style>
</head>

<body>
    @auth
        @if (Auth::user()->role_id === 'admin')
            <div class="container text-center">
                <!-- Left-aligned text block -->
                <div class="text-start mb-3">
                    <h4 class="mb-1">Welcome Back {{ Auth::user()->name ?? 'User' }}</h4>
                    <h5 class="fw-bold">{{ $building->building_name }}</h5>
                    <div class="breadcrumb-text">/Buildings > {{ $building->building_name }}</div>
                </div>
                <!-- Centered logo -->
                <img src="{{ asset($hotel->logo) }}" alt="{{ $hotel->name }}" class="logo">
                <a href="{{ route('addrack', ['hotel_id' => $hotel->id]) }}" class="btn btn-dark fw-semibold">
                    + Add Rack
                </a>
                <a href="{{ route('addswitch', ['hotel_id' => $hotel->id]) }}" class="btn btn-dark fw-semibold">
                    + Add Switch
                </a>
                <!-- Centered rack boxes -->
                <div class="rack-container mt-4">


                    @if ($racks->count())
                        @foreach ($racks as $rack)
                            <a href="{{ route('rackinfo', ['hotel_id' => $hotel->id, 'buildingRId' => $building->building_r_id]) }}"
                                class="rack-box text-decoration-none">
                                Rack {{ $rack->rack_number }},{{ $building->building_r_id }}
                            </a>
                        @endforeach
                    @else
                        <p class="text-gray-500 col-span-full">No Racks found.</p>
                    @endif
                </div>
            </div>
            @else
            <div class="container text-center">
                <!-- Left-aligned text block -->
                <div class="text-start mb-3">
                    <h4 class="mb-1">Welcome Back {{ Auth::user()->name ?? 'User' }}</h4>
                    <h5 class="fw-bold">{{ $building->building_name }}</h5>
                    
                </div>
                <!-- Centered logo -->
                <img src="{{ asset($hotel->logo) }}" alt="{{ $hotel->name }}" class="logo">
<!-- Centered rack boxes -->
                <div class="rack-container mt-4">


                    @if ($racks->count())
                        @foreach ($racks as $rack)
                            <a href="{{ route('rackinfo', ['hotel_id' => $hotel->id, 'buildingRId' => $building->building_r_id]) }}"
                                class="rack-box text-decoration-none">
                                Rack {{ $rack->rack_number }},{{ $building->building_r_id }}
                            </a>
                        @endforeach
                    @else
                        <p class="text-gray-500 col-span-full">No Racks found.</p>
                    @endif
                </div>
            </div>
             @endif
    @endauth
    </body>

    </html>
