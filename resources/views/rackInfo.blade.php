<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Rack Info - Split Tables</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        
        .table-container {
            margin-top: 60px;
        }

        

        .table-sm td,
        .table-sm th {
            padding: 0.3rem;
        }

        .table-responsive {
            max-height: 50vh;
            overflow-y: auto;
            margin-bottom: 40px;
        }

        h2 {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="container table-container">
        

        @if ($hotel->logo)
                    <div class="logo-container mb-4 ">
                        <img src="{{ asset($hotel->logo) }}" alt="Hotel Logo" class="hotel-logo">
                    </div>
                @endif
        @if($rackinfo->count())
        <!-- Product & Device Info Table -->
        <div class="container table-container">
            
            <h4>Product & Device Info</h4>
            <div class="table-responsive">
                
                <table class="table table-bordered table-striped table-hover table-sm align-middle text-center">
                    <thead>
                        <tr>
                            <th class="th">Building Rack ID</th>
                            <th>Product Panel</th>
                            <th>Product Serial</th>
                            <th>Product MAC</th>
                            <th>Product Model</th>
                            <th>Product Port</th>
                            <th>Device Name</th>
                            <th>Site Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rackinfo as $rack)
                            <tr>
                                <td>{{ $rack->building_r_id }}</td>
                                <td>{{ $rack->product_panal }}</td>
                                <td>{{ $rack->product_serial }}</td>
                                <td>{{ $rack->product_mac }}</td>
                                <td>{{ $rack->product_model }}</td>
                                <td>{{ $rack->product_port }}</td>
                                <td>{{ $rack->device_name }}</td>
                                <td>{{ $rack->site_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            

            <!-- Network & Switch Info Table -->
            <h4>Network & Switch Info</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm align-middle text-center">
                    <thead>
                        <tr>
                            <th>Switch ID</th>
                            <th>Serial Number</th>
                            <th>MAC Address</th>
                            <th>IP Address</th>
                            <th>Uplink Core 1</th>
                            <th>Uplink Core 2</th>
                            <th>Port Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rackinfo as $rack)
                            <tr>
                                <td>{{ $rack->switch_id }}</td>
                                <td>{{ $rack->serial_number }}</td>
                                <td>{{ $rack->mac_add }}</td>
                                <td>{{ $rack->ip_add }}</td>
                                <td>{{ $rack->up_link_core1 }}</td>
                                <td>{{ $rack->up_link_core2 }}</td>
                                <td>{{ $rack->port_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p class="text-gray-500 col-span-full">No Racks found.</p>
            @endif
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>