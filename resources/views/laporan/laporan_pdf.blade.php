<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pelatihan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<br/>
		@if($id == 'all' || $id != 'usulan')
		@include('laporan.include.pelatihan')
		@endif
		@if($id == 'all' || $id == 'usulan')
		@include('laporan.include.usulan')
		@endif
	</div>

</body>
</html>