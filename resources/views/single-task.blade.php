@extends('layout.base')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>

  @if ($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif

  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>

  <div>
    Completed: <span>{{ $task->completed ? 'true' : 'false' }}</span>
  </div>

  <div>
    <a href="{{ route('task.edit', ['task' => $task->id]) }}">Edit</a>
  </div>

  <form action="{{ route('tasks.toggle', ['task' => $task->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="submit" value="{{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}">
  </form>

  <form action="{{ route('task.drop', ['task' => $task->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete Task">
  </form>
@endsection
