@extends('admin.page.admin')
@include('layouts.style')

{!! Form::open(['url' => route('app.categories.create')]) !!}

{{ Form::label('name', 'Insert category name: ') }}
{{ Form::text('name') }}

{{ Form::label('name_en', 'Insert category name(en): ') }}
{{ Form::text('name_en') }}


{{--{{ Form::label('name', 'Insert new language: ') }}--}}
{{--{{ Form::text('language_id') }}--}}



{{ Form::submit('Click Me!') }}
{!! Form::close() !!}