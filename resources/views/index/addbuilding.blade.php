<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Add building</title>
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-lg p-4 rounded-4">
            <h2 class="mb-4 text-center">Add New Building</h2>
            <form method="POST" action="{{ route('storebuilding') }}">
                @csrf <!-- include this if it's a Laravel form -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="rackId" class="form-label">Rack ID</label>
                    <input type="text" name="rackid" id="rackId" class="form-control" placeholder="Enter Rack ID"
                        required>
                </div>

                <div class="mb-3">
                    <label for="brackId" class="form-label">Building Rack ID</label>
                    <input type="text" name="brackid" id="brackId" class="form-control"
                        placeholder="Enter Building Rack ID" required>
                </div>

                <div class="mb-3">
                    <label for="buildingName" class="form-label">Building Name</label>
                    <input type="text" name="buildingName" id="buildingName" class="form-control"
                        placeholder="Enter Building Name" required>
                </div>

                <div class="mb-3">
                    <label for="hotelId" class="form-label">Select Hotel</label>
                    <select name="hotel_id" id="hotelId" class="form-select" required>
                        <option value="">-- Select a Hotel --</option>
                        @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-3">Add Building</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
