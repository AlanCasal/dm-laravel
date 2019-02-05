{{-- <div class="row justify-content-center"> --}}
@for ($i=0; $i< 6; $i++)
	@php
		$itemRandom = rand(1, 48);
		$precioRandom2 = rand(100, 800) * 5;
	@endphp

	<div class="card text-center col-sm-6 col-md-4 col-lg-2 shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem; margin-top: 10px;">
		<a href=""><img src='{{asset("img/{$itemRandom}.jpg")}}' class="img06" alt="Video01"></a>

		<div class="card-body hover"></div>

		<div class="card-footer bg-transparent">
			<li class="card-text">Nombre del producto</li>
			<h5 class="card-title">$ {{$precioRandom2}},00 ARS</h5>
			<label><strong>Agregar al Carrito</strong></label>
			<div class="d-flex justify-content-center">
				<input class="col-6 form-control form-control-no-border border-info border-right-0 rounded-0" name="quantity" type="number" value="1">

				<button class="btn btn-outline-info border-left-0 rounded-0 rounded-right noBoxShadow-btn" type="submit">
					<i class="fas fa-cart-plus" style="font-size: 1em"></i>
				</button>
			</div>
		</div>
	</div>
@endfor
{{-- </div> --}}
