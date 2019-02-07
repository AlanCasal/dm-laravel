{{-- 3 Cards grandes - ofertas PCs armadas --}}
@for ($i=0; $i< 4; $i++) @php
$pcRandom = rand(49, 54);
$precioRandom = rand(2000, 8000) * 5;
@endphp

<div class="card text-center col-sm-12 col-md-6 col-lg-3 shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
	<a href=""><img class="card-img-top" src='{{ asset("img/{$pcRandom}.jpg") }}' alt=""></a>

	<div class="card-body hover"></div>

	<div class="card-footer bg-transparent">
		<li> descripcion sarlanga</li>
		<h4 class="card-title">$ {{$precioRandom}},00 ARS</h4>
		<label><strong>Agregar al Carrito</strong></label>
		<div class="d-flex justify-content-center">
			<input class="col-4 form-control form-control-no-border border-info border-right-0 rounded-0" name="quantity" type="number" value="1">

			<button class="btn btn-outline-info border-left-0 rounded-0 rounded-right noBoxShadow-btn" type="submit">
				<i class="fas fa-cart-plus" style="font-size: 1em"></i>
			</button>

			{{-- <button class='btn btn-info add-to-cart' type="submit">
					<i class="fas fa-cart-plus" style="font-size: 1em"></i>
				</button> --}}
		</div>
	</div>
</div>
@endfor
