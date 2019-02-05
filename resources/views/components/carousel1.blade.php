<div id="carousel" class="carousel slide" data-ride="carousel" style="margin-top: 80px">
	{{-- Imágenes --}}
	<div class="carousel-inner">
		@for ($i=1; $i <= 3; $i++)
			@php echo $i === 1 ? "<div class='carousel-item active'>"
							   : "<div class='carousel-item'>"
			@endphp
			<img src='{{ asset("/img/c1_{$i}.jpg") }}' alt="slide{{$i}}" style="width:100%;">
		</div>
		@endfor
	</div>

	{{-- Flechitas laterales --}}
	<a class="carousel-control-prev" href="#carousel" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	</a>
	<a class="carousel-control-next" href="#carousel" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	</a>

	{{-- Indicadores --}}
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
</div>
