@section('alert_message')

@if(Session::get('tipo') && Session::get('mensagem') )
	<div class="alert alert-{{Session::get('tipo') }}">
		{{Session::get('mensagem') }}
	</div>
@endif

@if(count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif
@stop
