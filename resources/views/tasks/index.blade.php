@extends('tasks.layout')

@section('title', 'Task List')
@section('header', 'Task List')

@section('content')

    <div class="task-list">

        @if($grouped->isEmpty())
            <p>No tasks created yet.</p>
        @else
            @foreach($grouped as $status => $tasks)
            <h2>{{ ucfirst(str_replace('_', ' ', $status)) }}</h2>
            <ul class="list">
                @foreach($tasks as $task)
                    <li class="task-container">
                        {{ $task->title }}
        
                        <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button class="btn" type="submit">{{ ucfirst(str_replace('_', ' ', $task->status)) }}</button>
                        </form>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete" type="submit" onclick="return confirm('Are you sure you want to delete this task?');">
                                Delete
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
            @endforeach
            @endif
    </div>
    
@endsection