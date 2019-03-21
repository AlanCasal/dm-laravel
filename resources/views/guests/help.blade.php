@extends('layouts.guests')

@section('content')
	<div class="container" style="margin-bottom: 100px">
		<div class="container col-8 ">

		<center>
			<h2><i class="fas fa-question-circle" style="font-size:1em; margin-right: 10px; margin-top: 20px"></i>
				<div style="margin-top: 10px; margin-bottom: 30px">PREGUNTAS FRECUENTES</div>
			</h2>
		</center>

		<div id="accordion">
			<div class="card">
				<div class="card-header" id="heading1">
					<h5 class="mb-0">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
							¿CUÁLES SON LAS FORMAS DE PAGO DISPONIBLES?
						</button>
					</h5>
				</div>

				<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
					<div class="card-body">
						<p><span>Mercado Pago</span>
							<br> Tarjeta de crédito (Mercado pago)
							<a href="https://www.mercadopago.com.ar/cuotas" target="_blank">Ver promociones vigentes</a>
							<br> Rapi Pago (Mercado pago)
							<a href="https://www.mercadopago.com.ar/cuotas" target="_blank">Ver promociones vigentes</a>
						</p>
						<p><span>En nuestra sucursal actualmente se puede abonar con las tarjetas:</span>
							<br> Visa, Visa Electrón, MasterCard, Argencard, Lider, Maestro, Amex, Cabal, Cabal24, Diners, Italcred, Shopping, Naranja, Nativa, Nativa MC, CMR Falabella, Cencosud, Argenta.
						</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading2">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
							¿CUÁL ES EL COSTO DE ENVÍO?
						</button>
					</h5>
				</div>
				<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
					<div class="card-body">
						<p>El costo de envío varía en función de la distancia entre el destino y la Capital Federal. Podrá calcular el costo al momento de agregar el producto al carrito de compras. Puede acceder al envío gratis si la compra supera los $1.499. Los envíos se realizan a través de OCA.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading3">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
							¿CUÁL ES LA GARANTÍA DE LOS PRODUCTOS?
						</button>
					</h5>
				</div>
				<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
					<div class="card-body">
						<p>Nuestros productos cuentan con 180 días de garantía una vez efectuada la compra. Sólo cubre un desperfecto del producto relacionado a la fabricación del mismo. En caso de ser productos discontinuados o de oferta no tienen garantía. Para hacer el reclamo por falla del producto escribir a ventas@dragonmarket.com.ar indicando número de pedido, nombre del producto y detalle de la falla del mismo.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading4">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
							¿CÓMO ACCEDO AL FLETE GRATIS?
						</button>
					</h5>
				</div>
				<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
					<div class="card-body">
						<p>Con cualquier compra superior a $1.499, el costo del envío es bonificado.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading5">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
							¿CUÁNTO DEMORA LA ENTREGA DEL PEDIDO?
						</button>
					</h5>
				</div>
				<div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
					<div class="card-body">
						<p>A partir de la fecha de facturación (esta demora hasta 7 días habiles), la entrega tiene un plazo entre 5 y 12 días hábiles dependiendo la localidad de entrega.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading6">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
							¿QUÉ SUCEDE SI NADIE RECIBE MI PEDIDO?
						</button>
					</h5>
				</div>
				<div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
					<div class="card-body">
						<p>Se volverá a envíar una segunda vez. En ambos casos OCA o Urbano dejará una constancia de visita en el domicilio. Si luego de la segunda visita nadie recibe el pedido, este se encontrará por 72 horas en la sucursal de OCA que se detalle en el registro de visita. En caso de Urbano el pedido será devuelto a DRAGON MARKET.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading7">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
							¿PUEDE OTRA PERSONA RECIBIR MI PEDIDO?
						</button>
					</h5>
				</div>
				<div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
					<div class="card-body">
						<p>Sí, como requisito debe ser mayor de 18 años y presentar el DNI.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading8">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
							¿CÓMO PUEDO REALIZAR EL CAMBIO DE UN PRODUCTO?
						</button>
					</h5>
				</div>
				<div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
					<div class="card-body">
						<p>Si desea cambiar el producto recibido debe mantenerlo en perfectas condiciones, con su embalaje original, etiquetas y ticket de compra. Dentro de los 30 días de efectuada la compra puede dirigirse a nuestra sucursal (sujeto a disponibilidad de stock) o mandar un email a ventas@dragonmarket.com.ar indicando el número de pedido. El costo del envío a domicilio por cambio corre por cuenta y cargo del cliente.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading9">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
							¿TENGO QUE REGISTRARME ANTES DE COMPRAR?
						</button>
					</h5>
				</div>
				<div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
					<div class="card-body">
						<p>Sí. Podés agregar productos al carrito de compras pero para comprarlos deberás crear una cuenta para estar registrado en nuestra base de datos.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading10">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
							¿CÓMO PUEDO ACCEDER A MI CEUNTA?
						</button>
					</h5>
				</div>
				<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
					<div class="card-body">
						<p>Para ingresar a tu cuenta deberás tener previamente creada una cuenta en nuestra web. Luego podrás ingresar con tu email y contraseña, lo cual te habilitará nuevas opciones, entre ellas, acceder a tu cuenta.</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading11">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
							¿CÓMO RECIBO MI FACTURA?
						</button>
					</h5>
				</div>
				<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
					<div class="card-body">
						<p>Tu factura será enviada por correo electrónico y será enviada desde la casilla: ventas@dragonmarket.com.ar</p>
					</div>
				</div>
			</div> {{-- card --}}
			<div class="card">
				<div class="card-header" id="heading12">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
							CÓDIGOS PROMOCIONALES
						</button>
					</h5>
				</div>
				<div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
					<div class="card-body">
						<p>Los códigos promocionales no se aplican a los productos rebajados. Si has devuelto un pedido en el que se ha utilizado un código promocional, el valor de dicho código no será reembolsado. Los códigos promocionales solo son válidos durante un tiempo determinado.</p>
					</div>
				</div>
			</div> {{-- card --}}
		</div> {{-- accordion --}}
		</div>
	</div> {{-- container --}}

@endsection
