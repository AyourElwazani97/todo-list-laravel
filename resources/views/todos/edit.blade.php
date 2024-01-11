@extends('Layouts.index')
@section('content')
    <div class="lists">
        <div>
            <h1>Edit</h1>
        </div>
        <table>
            <tr class="theader">
                <th>N°</th>
                <th>Todo</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Modified</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
           
        </table>
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
