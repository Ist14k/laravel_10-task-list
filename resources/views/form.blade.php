@section('styles')
  <style>
    .error-message {
      color: red;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action="{{ isset($task) ? route('task.single', ['task' => $task->id]) : route('task.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset

    <fieldset>
      <label for="title">Task Name</label>
      <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </fieldset>
    <fieldset>
      <label for="description">Description</label>
      <textarea name="description" id="description" cols="30" rows="10">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </fieldset>
    <fieldset>
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description" cols="50" rows="20">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </fieldset>

    <input type="submit" value="{{ isset($task) ? 'Update Task' : 'Add Task' }}">
  </form>
@endsection
