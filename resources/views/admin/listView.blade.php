@extends('base')
@section('content')
    <div class="container">
        <h2>{{ucfirst($tableName)}}s table</h2>
        <a href="{{ route($create) }}">Create new {{$tableName}}</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                @foreach($list[0] as $key => $value)
                    <th>{{$key}}</th>
                @endforeach
                <th>edit</th>
                <th>show</th>
                <th>delete</th>

            </tr>
            </thead>
            <tbody>
            @foreach($list as $key => $record)
                <tr id="{{$record['id']}}">
                    @foreach($record as $key => $value)
                        <td>
                            @if(!is_array($value))
                                {{$value}}
                            @elseif ($key == 'translation')
                                @foreach($value as $key => $translation)
                                    @if(app()->getLocale() == $translation['language_code'])
                                        <ul>
                                            @foreach($translation['pivot'] as $key => $text)
                                                @if(!in_array($key, $ignore) )
                                                    <li>{{$text}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    @endforeach

                    <td><a href="{{ route($edit,$record['id']) }}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                    </td>
                    <td><a href="{{ route($show, $record['id']) }}">
                            <button type="button" class="btn btn-success">Show</button>
                        </a>
                    </td>
                    <td>
                        <button onclick="deleteItem( '{{ route($delete, $record['id']) }}' )"
                                class="btn btn-danger">Delete
                        </button>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',
                success: function (response) {
                    $('#' + response.id).remove();
                },
                error: function () {
                    alert('ERROR')
                }
            });
        }

    </script>
@endsection