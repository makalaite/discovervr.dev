@extends('base')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        {!! Form::open(
            array(
                'route' => ['app.pages.edit', $id],
                'class' => 'form',
                'novalidate' => 'novalidate',
                'files' => true)) !!}
        {!! Form::file('image') !!}
        {!! Form::open(['url'=>route('app.pages.edit', $id)])!!}
        @foreach($item as $key => $value)
            @if(!in_array($key, $ignore))
                <tr>
                    <td>{{$key}}</td>
                    <td>
                    {{ Form::text($key, $value)}}
                    <td>
                </tr>
            @elseif ($key == 'translation')
                @foreach ($value as $key => $translation)
                    @foreach ($translation['pivot'] as $key => $lang)
                        @if(!in_array($key, $ignore))
                            <tr>
                                <td>
                                    {{$key . ' ' . $translation['pivot']['language_code']}}
                                </td>
                                <td>
                                    {{ Form::textArea($key  . '_' . $translation['pivot']['language_code'], $lang)}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @elseif ($key == 'category')
                @foreach ($value['translation'] as $key => $translation)
                    @foreach ($translation['pivot'] as $key => $lang)
                        @if(!in_array($key, $ignore))
                            @if($translation['pivot']['language_code'] == app()->getLocale())
                                {{Form::label('categories', 'Categories')}}
                                {{Form::select('categories', [$translation['pivot']['category_id'] => $translation['pivot']['name']])}}
                            @endif

                        @endif
                    @endforeach
                @endforeach
            @elseif($key == 'resource')
                <img src="{{asset($value['path'])}}">
            @endif

        @endforeach

    </table>
    {{Form::submit('Submit')}}
    {!! Form::close() !!}

</div>
    @endsection