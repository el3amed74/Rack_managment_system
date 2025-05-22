<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add new Switch</title>
</head>

<body>
    <div class="container my-5">
        <div class="card p-4 shadow rounded-4">
            <h2 class="text-center mb-4">Add New Switch</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('storeswitch') }}" method="POST">
                @csrf <!-- Laravel CSRF token -->
                @method('POST')
                <!-- Switch Data Column -->
                <div class="col-md-6">
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
                        <input type="text" name="up_link_core1" class="form-control" placeholder="up_link_core1">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uplink Core 2</label>
                        <input type="text" name="up_link_core2" class="form-control" placeholder="up_link_core2">
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
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5 py-2">Add Rack</button>
        </div>
        </form>
</body>

</html>
