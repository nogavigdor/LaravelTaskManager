@extends(layout.app)
<h1>
    @section('title', 'Tasks List')
  </h1>

@section('content')
    @forelse ($tasks as $task)
      <div>
        <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
      </div>
    @empty
      <div>There are no tasks!</div>
    @endforelse
    {{-- @endif --}}
@endsection

