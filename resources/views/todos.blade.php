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
        <form action="" method="">
            @csrf
            <div>
                <input type="text" name="todo" id="todo">
            </div>
            <div>
                <input type="submit" value="Add Task">
            </div>
        </form>
    </div>
@endsection
