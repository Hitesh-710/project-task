@extends('tasks.layout')

@section('content')
@section('header', 'Create a Task')


<!-- Display validation errors if any -->
@if ($errors->any())
<div style="color:red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

        <form class="form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
    
            <div>
                <label for="title">Title:</label><br>
                <input class="inp" type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <br>
    
            <div>
                <label for="status">Status:</label><br>
                <select class="inp" id="status" name="status" required>
                    <option value="">-- Select Status --</option>
                    <option value="to_do" {{ old('status') == 'to_do' ? 'selected' : '' }}>To do</option>
                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            
            <div class="btn-container">
                <button class="btn" type="submit">Save Task</button>
                <button class="btn" type="button" onclick="window.location.href='{{ route ('tasks.index') }}'">Task list</button>
            </div>
        </form>

@endsection