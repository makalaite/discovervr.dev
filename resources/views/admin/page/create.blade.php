{!! Form::open(['url' => route('app.categories.create')]) !!}

{{ Form::label('name', 'Insert new category: ') }}
{{ Form::text('name') }}



{{--{{ Form::label('name', 'Insert new language: ') }}--}}
{{--{{ Form::text('language_id') }}--}}

{{ Form::label('language_code', 'Select a language: ') }}
{{ Form::select('language_code', $lang) }}



{{ Form::submit('Click Me!') }}
{!! Form::close() !!}