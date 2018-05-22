<!DOCTYPE html>
<html lang='en'>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta content='width=device-width, initial-scale=1' name='viewport'>
	<title>Cars Landing Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" media="screen" href="{{ asset('css/app.css') }}" />
</head>
<body style="background-color:#3ea9f5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 style="color:#fff;">Cars Landing</h1>
			</div>
		</div>
		<br>
		<div class="row">
			@if(Session::Has('message'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{Session::get('message')}}
			</div>
			@endif
			@if(Session::Has('err'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{Session::get('err')}}
			</div>
			@endif
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				Errores<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="col-sm-12">
				<form action="{{ route('authenticate') }}" method="post">
					<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
					<div class="row">
						<div class="col-12">
							<input type="text" name="email" placeholder="Email" required>
						</div>
						<br>
						<div class="col-12">
							<input type="password" name="password" placeholder="Contraseña" required>
						</div>
						<br>
						<div class="col-12">
							<button type="submit" class="btn btn-default">Entrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>