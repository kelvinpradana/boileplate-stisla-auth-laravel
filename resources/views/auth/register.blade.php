<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Register &mdash;</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
						<div class="login-brand">
							<img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
						</div>

						<div class="card card-primary">
							<div class="card-header">
								<h4>Register</h4>
							</div>

							<div class="card-body">
								<form method="POST" action="{{ route('register') }}">
									@csrf
									<div class="form-group">
										<label for="email">Nama</label>
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" required name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>

									<div class="form-group">
										<label for="nik">NIk</label>
										<input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" required name="nik" value="{{ old('nik') }}" autocomplete="nik" autofocus>

										@error('nik')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>

									<div class="form-group">
										<label for="email">Email</label>
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="row">
										<div class="form-group col-6">
											<label>Kanwil</label>
											<select class="form-control selectric" id="kanwil" name="kanwil">
												@foreach($kanwils as $kanwil)
												<option value="{{$kanwil->id}}">{{$kanwil->nama}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-6">
											<label>Upt</label>
											<select class="form-control" id="upts" name="upt">
												<option>Pilih kanwil dulu</option>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-6">
											<label for="password" class="d-block">Password</label>
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group col-6">
											<label for="password2" class="d-block">Password Confirmation</label>
											<input id="password2" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block">
											Register
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; Stisla 2018
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="../assets/js/stisla.js"></script>

	<!-- JS Libraies -->
	<script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
	<script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

	<!-- Template JS File -->
	<script src="../assets/js/scripts.js"></script>
	<script src="../assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
	<script src="../assets/js/page/auth-register.js"></script>

	<script type="text/javascript">
        $("#kanwil").change(function(){
			console.log('oke',$(this).val());
            $.ajax({
                url: "{{ route('kanwil.upt') }}?kanwil=" + $(this).val(),
                method: 'GET',
                success: function(data) {
					console.log(data.html)
                    $('#upts').html(data.html);
                }
            });
        });
    </script>
</body>

</html>