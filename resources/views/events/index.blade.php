<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Events</title>
    <script src="https://unpkg.com/htmx.org@1.9.6"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #ffe6f2; /* Light pink background */
        }
        .navbar {
            background-color: #ff69b4 !important; /* Hot pink */
        }
        .navbar-brand, .navbar a {
            color: #fff !important;
        }
        .container {
            max-width: 900px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table-hover tbody tr:hover {
            background-color: #ffd6e0; /* Light pink hover effect */
        }
        .btn-pink {
            background-color: #ff85c0; /* Soft pink */
            border-color: #ff69b4;
            color: white;
        }
        .btn-pink:hover {
            background-color: #ff5a9c;
        }
        .btn-danger:hover {
            background-color: #d63384;
        }
        .alert-success {
            background-color: #ffb3d9;
            color: #800040;
            border-color: #ff85c0;
        }
    </style>
</head>
<body>
   <!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">🎀Calendar Events🎀</a>

        <div class="d-flex">
            <!-- Add Event Button -->
            <button class="btn btn-success me-2" 
                hx-get="{{ route('events.create') }}" 
                hx-target="#event-form" 
                hx-swap="innerHTML">
                <i class="bi bi-plus-circle"></i> Add Event
            </button>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

    <!-- Event Creation Form (Loaded Dynamically) -->
    <div class="container mt-4">
        <div id="event-form"></div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card p-4">
            <h2 class="mb-3 text-center text-pink">Upcoming Events</h2>

            <!-- Flash Message -->
            <div id="flash-message">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>

            <!-- Events Table -->
            <table class="table table-striped table-hover">
                <thead style="background-color: #ff69b4; color: white;">
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="event-list">
                    @foreach ($events as $event)
                        <tr id="event-{{ $event->id }}">
                            <td><strong>{{ $event->event_name }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}</td>
                            <td>{{ $event->description ?? 'No Description' }}</td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-warning btn-sm" 
                                    hx-get="{{ route('events.edit', $event->id) }}" 
                                    hx-target="#event-form" 
                                    hx-swap="innerHTML">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <!-- Delete Button with HTMX -->
                                <button class="btn btn-danger btn-sm" 
                                    hx-delete="{{ route('events.destroy', $event->id) }}" 
                                    hx-target="#event-{{ $event->id }}" 
                                    hx-swap="outerHTML" 
                                    hx-confirm="Are you sure you want to delete this event?"
                                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'>
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- No Events Message -->
            @if($events->isEmpty())
                <p class="text-center text-muted mt-3">No events available. <a href="{{ route('events.create') }}">Create one?</a></p>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
