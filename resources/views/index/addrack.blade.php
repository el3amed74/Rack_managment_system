<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add new Rack</title>
</head>

<body>
    <div class="container my-5">
        <div class="card p-4 shadow rounded-4">
            <h2 class="text-center mb-4">Add New Rack</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('storerack') }}" method="POST">
                @csrf <!-- Laravel CSRF token -->
                @method('POST')
                <div class="row">
                    <!-- Product Data Column -->
                    <div class="col-md-6">
                        <h5 class="mb-3">Product Data</h5>

                        <div class="mb-3">
                            <label class="form-label">Building Rack ID</label>
                            <select name="building_r_id" id="building_r_id" class="form-select" required>
                                <option value="">-- Select a Building and Rack --</option>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->building_r_id }}">BName :{{$building->building_name}}: RackId {{ $building->building_r_id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Switch ID</label>
                            <select name="switch_id" id="switch_id" class="form-select" required>
                                <option value="">-- Select a switch --</option>
                                @foreach ($switches as $switche)
                                    <option value="{{ $switche->id }}">{{$switche->serial_number}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Panel</label>
                            <input type="text" name="product_panal" class="form-control" placeholder="product_panal">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Serial</label>
                            <input type="text" name="product_serial" class="form-control"
                                placeholder="product_serial">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product MAC</label>
                            <input type="text" name="product_mac" class="form-control" placeholder="product_mac">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Model</label>
                            <input type="text" name="product_model" class="form-control" placeholder="product_model">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Port</label>
                            <input type="text" name="product_port" class="form-control" placeholder="product_port">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Device Name</label>
                            <input type="text" name="device_name" class="form-control" placeholder="device_name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Site Name</label>
                            <input type="text" name="site_name" class="form-control" placeholder="site_name">
                        </div>
                    </div>

                    <!-- Switch Data Column -->
                    {{-- <div class="col-md-6">
                        <h5 class="mb-3">Switch Data</h5>

                        <div class="mb-3">
                            <label class="form-label">Switch Name</label>
                            <input type="text" name="switchname" class="form-control" placeholder="switchname">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" name="serial_number" class="form-control" placeholder="serial_number">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">MAC Address</label>
                            <input type="text" name="mac_add" class="form-control" placeholder="mac_add">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">IP Address</label>
                            <input type="text" name="ip_add" class="form-control" placeholder="ip_add">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Uplink Core 1</label>
                            <input type="text" name="up_link_core1" class="form-control"
                                placeholder="up_link_core1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Uplink Core 2</label>
                            <input type="text" name="up_link_core2" class="form-control"
                                placeholder="up_link_core2">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Port Number</label>
                            <input type="text" name="port_number" class="form-control" placeholder="port_number">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <input type="text" name="model" class="form-control" placeholder="model">
                        </div>
                    </div>
                </div> --}}

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2">Add Rack</button>
                    </div>
            </form>
        </div>
    </div>

</body>

</html>
