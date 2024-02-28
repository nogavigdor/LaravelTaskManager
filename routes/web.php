<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Do some shopping',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Submit compulsary assignment',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn Vue.js',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2024-02-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Do laundary',
        'Task 4 description',
        null,
        false,
        '2021-02-04 12:00:00',
        '2025-03-04 12:00:00'
    ),
];

//redirect to tasks.index in case of root route
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

//tasks.index route
Route::get('/tasks', function () use ($tasks) {
    return view('index',
        [
            'tasks' => $tasks
        ]
    );
})->name('tasks.index');

//tasks.show route
Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if (!$task) {
        abort(404);
    }

    return view('show', ['task' => $task]);
})->name('tasks.show');
