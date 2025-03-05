<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $event->id }}">

            <div class="mb-3">
                <label for="event_name" class="form-label">Event Name</label>
                <input type="text" name="event_name" class="form-control" value="{{ $event->event_name }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="{{ $event->event_date }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="event_time" class="form-label">Event Time</label>
                    <input type="time" name="event_time" class="form-control" value="{{ $event->event_time }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter event details...">{{ $event->description }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Update Event</button>
                <a href="{{ route('events.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
