<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return redirect()->route('task.all');
});

Route::get('/tasks', function () {
  $tasks = Task::latest()->paginate();
  return view('all-task', ['tasks' => $tasks]);
})->name('task.all');

Route::get('/tasks/new', function () {
  return view('create-task');
})->name('task.new');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit-task', ['task' => $task]);
})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task) {
  return view('single-task', ['task' => $task]);
})->name('task.single');

Route::put('tasks/{task}/toggle', function (Task $task) {
  $task->toggleComplete();

  return redirect()->back()->with('success', 'Task Updated!');
})->name('tasks.toggle');

Route::post('/tasks', function (TaskRequest $request) {
  $task = Task::create($request->validated());

  return redirect()
    ->route('task.single', ['task' => $task->id])
    ->with('success', 'Task Created Successfully!');

})->name('task.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  $task->update($request->validated());

  return redirect()
    ->route('task.single', ['task' => $task->id])
    ->with('success', 'Task Updated Successfully!');

})->name('task.update');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();

  return redirect()->route('task.all')->with('success', 'Task Deleted Successfully!');

})->name('task.drop');