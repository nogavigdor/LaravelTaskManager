@extends('layouts.app')


@section('title', 'Task: ' . $task->title)

@section('content')
  <p>{{ $task->description }}</p>

  @if($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif

  <P>{{ $task->created_at }}</P>
  <P>{{ $task->updated_at }}</P>
@endsection

