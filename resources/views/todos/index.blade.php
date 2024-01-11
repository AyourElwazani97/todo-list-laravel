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
                            true
                        @else
                            false
                        @endif
                    </td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>{{ $item['updated_at'] }}</td>
                    <td class="editbtn">
                        <a href="{{ route('todos.edit', $item['id']) }}">
                            <button>edit</button>
                        </a>
                    </td>
                    <td class="deletebtn"><button>delete</button></td>
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
