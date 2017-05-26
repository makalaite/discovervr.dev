@extends('admin.page.admin')
@section('content-list')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => route($route, $id)]) !!}
                <table class="table table-bordered">
                    @foreach($item as $key => $value)
                        @if($key != 'created_at' && $key != 'updated_at' && $key != 'deleted_at' && $key != 'id' && $key != 'count')
                            <tr>
                                <td>{{$key}}</td>
                                <td>
                                    {{ Form::label('', null, ['class' => 'control-label']) }}
                                    {{ Form::text($key, $value) }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
                {{Form::submit('Submit!')}}
            </div>
        </div>
    </div>

@endsection
