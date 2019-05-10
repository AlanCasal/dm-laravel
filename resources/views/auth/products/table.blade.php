{{--tabla de productos--}}
<div class="d-flex justify-content-center">
	<table id="products-table" class="table table-dark table-bordered table-hover table-sm col-md-10">
		<thead>
		<tr class="text-center">
			<th scope="col">ID</th>
			<th scope="col">CATEGORIA</th>
			<th scope="col">NOMBRE</th>
			<th scope="col">PRECIO</th>
			<th scope="col">STOCK</th>
			<th scope="col">EDITAR</th>
			<th scope="col">ELIMINAR</th>
		</tr>
		</thead>
		<tbody class="text-center">
		@foreach($products as $product)
			<tr
					data-id="{{$product->id}}"
					data-name="{{$product->name}}"
					data-price="{{$product->price}}"
					data-stock="{{$product->stock}}"
					data-category="{{$product->category_id}}"
					class="category_item item_{{$product->category_id}}"
			>
				<th scope="row">{{$product->id}}</th>
				<td>{{$product->category->name}}</td>
				<td>{{$product->name}}</td>
				<td>${{$product->price}}</td>
				<td>{{$product->stock}}</td>
				<td>
					<a class="text-primary btn-modal-update" href="">
						<i class="fas fa-edit"></i>
					</a>
				</td>
				<td class="text-center">
					<a href="" class="text-danger btn-destroy-modal">
						<i class="fas fa-trash align-self-center"></i>
					</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
<hr class="border-warning">

<div class="d-flex justify-content-center">
	{{$products->links()}}
</div>