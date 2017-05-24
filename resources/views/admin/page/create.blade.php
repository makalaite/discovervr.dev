{!! Form::open(['url' => route('app.categories.create')]) !!}

{{ Form::label('name', 'Insert category: ') }}
{{ Form::text('name') }}
{{ Form::submit('Click Me!') }}