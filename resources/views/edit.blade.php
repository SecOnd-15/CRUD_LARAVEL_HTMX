<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id"></label>
                <input type="hidden" name="id" class="form-control" readonly value="{{ $event->id }}" required>
            </div>
            <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" name="event_name" class="form-control" value="{{ $event->event_name }}" required>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" name="event_date" class="form-control" value="{{ $event->event_date }}" required>
            </div>
            <div class="form-group">
                <label for="event_time">Event Time</label>
                <input type="time" name="event_time" class="form-control" value="{{ $event->event_time }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $event->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Event</button>
        </form>
    </div>
</body>
</html>
