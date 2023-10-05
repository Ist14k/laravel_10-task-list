<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Task List</h1>

  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('task.single', ['id' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <h2>There is no tasks exist!</h2>
  @endforelse
</body>

</html>
