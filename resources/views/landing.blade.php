<!DOCTYPE html>
<html lang='en'>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta content='width=device-width, initial-scale=1' name='viewport'>
	<title>Cars Landing Page</title>
	<link rel="stylesheet" media="screen" href="{{ asset('css/app.css') }}" />
</head>
<body class='free_signup_page'>
	<main id='content' role='main'>
		<div id='free_signup_container'>
			<div class='container signup'>
				<div class='signup_header'>
					<div class='logo'>
						<h1>
							Cars Landing
						</h1>
					</div>
					@if(!Auth::id())
					<div class='loginButton'>
						<a href="{{ route('login') }}">Entrar</a>
					</div>
					@else
					<div class='loginButton'>
						<a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
					</div>
					@endif
				</div>
				<div class='signup_container'>
					@if($people)
					<div class='signup_info'>
						<h2>El ganador del concurso es:</h2>
						<h4>{{ $people->name }} {{ $people->lastname }}</h4>
						<h4>Cedula: {{ $people->identifier }}</h4>
					</div>
					@else
					<div class='signup_info'>
						<h2>Gran Concurso</h2>
						<h4>Nuestra prestigiosa marca esta realizando un concurso, registrate y estaras participando.</h4>
					</div>
					<div class='signup_form'>
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
						<div class='form_wrapper'>
							<form action="{{ route('people') }}" id='account_create' method='post'>
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
								<div class='row'>
									<div class='field-container'>
										<input class='example flex-input margin-10' id='first_name' name='name' placeholder='Nombres' required type='text'>
									</div>
									<div class='field-container'>
										<input class='example flex-input margin-10' id='last_name' name='lastname' placeholder='Apellidos' required type='text'>
									</div>
								</div>
								<div class='row'>
									<div class='field-container'>
										<input class='example flex-input margin-10' id='first_name' name='identifier' placeholder='Cedula' required type='text'>
									</div>
									<div class='field-container'>
										<input class='example flex-input margin-10' id='first_name' name='cellphone' placeholder='Celular' required type='text'>
									</div>
								</div>
								<div class='row'>
									<div class='custom_dropdown margin-10'>
										<span class='custom_select_value hear-about-Wistia'>
										Seleccione un Departamento
										</span>
										<div class='custom_select_arrow'></div>
										<select id='survey_questions' name="department">
	                                        @foreach ($departments as $department => $value)
	                                        <option value="{{ $department }}"> {{ $value }}</option>   
	                                        @endforeach
	                                    </select>

										<!-- <input class='example flex-input margin-10' id='first_name' name='department' placeholder='Departamento' required type='text'> -->
									</div>
									<div class='custom_dropdown margin-10'>
										<span class='custom_select_value hear-about-Wistia'>
										Seleccione una Ciudad
										</span>
										<select id='survey_questions' name="city_id">
											
		                                </select>
										<!-- <input class='example flex-input margin-10' id='first_name' name='city' placeholder='Ciudad' required type='text'> -->
									</div>
								</div>
								<div class='row'>
									<div class='field-container margin-10'>
										<input class='example flex-input margin-10' id='survey_questions' name='email' placeholder='Email' required type='text'>
									</div>
								</div>
								<div class='row'>
									<input type="checkbox" name="agree" style="margin-left:15px; width: 20px; height: 20px;">
										<span style="color:#fff;">Acepto los
										<a class='terms' href='' target='_blank' style="text-decoration: none; color:#000;">Terminos de Servicio</a>.</span>
								</div>
								<div class='row'>
									<div class='field-container'>
										<button class='create-account-button margin-10' type='submit'>Registrarse</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</main>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {

		    $('select[name="department"]').on('change', function(){
		        var countryId = $(this).val();
		        if(countryId) {
		            $.ajax({
		                url: '/cities/get/'+countryId,
		                type:"GET",
		                dataType:"json",

		                success:function(data) {

		                    $('select[name="city_id"]').empty();

		                    $.each(data, function(key, value){

		                        $('select[name="city_id"]').append('<option value="'+ key +'">' + value + '</option>');

		                    });
		                }
		            });
		        } else {
		            $('select[name="city_id"]').empty();
		        }

		    });

		});
	</script>
</body>
</html>
