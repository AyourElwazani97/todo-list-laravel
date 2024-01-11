@extends('Layouts.index')
@section('content')
    <div class="lists">
        <ul>
            <li>done</li>
            <li>done</li>
            <li>done</li>
            <li>done</li>
            <li>done</li>
            <li>done</li>
        </ul>
    </div>
    <div class="createtodos">
        @error('todo')
            <div class="form-error">
                <span>
                    {{ $message }}
                </span>
            </div>
        @enderror
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            <div>
                <input type="text" name="todo" id="todo">
            </div>
            <br />
            <div>
                <input type="submit" value="Add Task">
            </div>
        </form>

    </div>
@endsection
