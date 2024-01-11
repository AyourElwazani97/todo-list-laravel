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
                <th>Delete</th>
            </tr>
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->todo }}</td>
                <td>
                    @if ($data->status)
                        done
                    @else
                        in progress
                    @endif
                </td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
                <td class="deletebtn">
                    <form action="{{ route('todos.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" />
                    </form>
                </td>
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
        <form action="{{ route('todos.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <input type="text" name="todo" value="{{ $data->todo }}" id="todo" />
            </div>
            {{$data->status === 1}}

            <div>
                <input type="radio" name="status" checked={{ $data->status == 1 }} id="todotrue"
                    value={{ 1 }}>done</input>
                <input type="radio" name="status"  id="todofalse"
                    value={{ 0 }}>in progress</input>
            </div>
            <br />
            <div>
                <input type="submit" value="Update Task">
            </div>
        </form>
    </div>
@endsection
