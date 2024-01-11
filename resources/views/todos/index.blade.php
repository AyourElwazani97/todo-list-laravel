@extends('Layouts.index')
@section('content')
    <div class="lists">
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
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['todo'] }}</td>
                    <td>
                        @if ($item['status'])
                            <span id="done">
                                done
                            </span>
                        @else
                            <span id="inprogress">
                                in progress
                            </span>
                        @endif
                    </td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>{{ $item['updated_at'] }}</td>
                    <td class="editbtn">
                        <a href="{{ route('todos.edit', $item['id']) }}">
                            <button>edit</button>
                        </a>
                    </td>
                    <td class="deletebtn">
                        <form action="{{ route('todos.destroy', $item['id']) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
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
