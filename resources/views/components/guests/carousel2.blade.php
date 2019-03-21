<div id="carousel2" class="carousel slide" data-ride="carousel">
	{{-- Imágenes --}}
	<div class="carousel-inner">
		@for ($i=1; $i <= 4; $i++)
			@php echo $i == 1 ? "<div class='carousel-item active'>" : "<div class='carousel-item'>" @endphp
				<img src='{{ asset("img/carousel2/{$i}.jpg")}}' alt="slide{{$i}}" style="width:100%;">
			</div>
		@endfor
	</div>

	{{-- Flechitas laterales --}}
	<a class="carousel-control-prev" href="#carousel2" data-slide="prev"> {{-- Left and right controls --}}
		<span class="carousel-control-prev-icon"></span>
	</a>
	<a class="carousel-control-next" href="#carousel2" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	</a>
</div>
