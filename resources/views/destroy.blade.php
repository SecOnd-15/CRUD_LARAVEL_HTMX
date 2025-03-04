@extends('events.index')

@section('title', 'Delete Event')

@section('content')
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="text-center text-danger">Delete Event</h2>
            <p class="text-center">Are you sure you want to delete the event <strong>{{ $event->event_name }}</strong>?</p>

            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger me-2">
                        <i class="bi bi-trash-fill"></i> Delete
                    </button>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
