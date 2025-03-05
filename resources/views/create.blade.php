<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #ffe4e1; /* Soft pink background */
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #fff0f5; /* Light pink card */
        }
        .btn-primary {
            background-color: #ff69b4; /* Hot pink button */
            border: none;
            transition: 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #ff1493; /* Darker pink on hover */
            transform: scale(1.05);
        }
        .btn-secondary {
            background-color: #6c757d; /* Gray cancel button */
            border: none;
            transition: 0.3s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Darker gray on hover */
            transform: scale(1.05);
        }
        .form-label {
            color: #d63384; /* Dark pink labels */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="text-center text-dark mb-4">🎀 Create New Event 🎀</h2>

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('events.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="event_name" class="form-label">Event Name</label>
                            <input type="text" name="event_name" class="form-control @error('event_name') is-invalid @enderror" placeholder="Enter event name" required value="{{ old('event_name') }}">
                            @error('event_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" name="event_date" class="form-control @error('event_date') is-invalid @enderror" required value="{{ old('event_date') }}">
                            @error('event_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="event_time" class="form-label">Event Time</label>
                            <input type="time" name="event_time" class="form-control @error('event_time') is-invalid @enderror" required value="{{ old('event_time') }}">
                            @error('event_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Write a short description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">💖 Create Event 💖</button>
                            <a href="{{ route('events.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
