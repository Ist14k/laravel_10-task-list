@extends('layout.base')

@section('title', 'All Tasks')

@section('content')
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('task.single', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <h2>There is no tasks exist!</h2>
  @endforelse

  @if ($tasks->count())
    {{ $tasks->links() }}
  @endif
@endsection
