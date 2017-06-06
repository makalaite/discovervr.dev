@extends('frontEnd.core')

@section('content')
    <div id="part-01">

        <div id="red-flag">
            <div id="logo" > {{ trans('app.inspired_by') }} </div>
        </div>

        <div id="title"> {{ trans('app.discover_vr') }} </div>
        <div id="sentence"> {!! trans('app.sentence') !!} </div>
    </div>
@endsection