@include('header');
	<br><br><br>
	<div class="row">
		<div class="col-md-8">
			<h1>Usuario #{{ $id }}</h1>
			<?=$msg;?>.<?=$id?>
		</div>
		<div class="col-md-4">
			@include('barralateral');
		</div>	
	</div>

@include('footer');