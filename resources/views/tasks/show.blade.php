@extends('layout')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p><strong>Status:</strong> {{ $task->completed ? 'Completed' : 'Pending' }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
