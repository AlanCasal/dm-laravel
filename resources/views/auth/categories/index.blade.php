@extends('layouts.auth')

@section('content')
    <br/>
    <ul style="color: white">
        <h3 class="text-center">CATEGORÍAS</h3>

	    {{--ALERTAS--}}
        {{--@if(isset($data['store']))
            <div class="alert alert-success alert-dismissible text-success fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-check-circle"></i> CATEGORÍA AGREGADA
                </h5>
                <hr/>
                <p>LA CATEGORÍA <strong>{{$data['store']}}</strong> HA SIDO AGREGADA.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(isset($data['destroy']))
            <div class="alert alert-danger alert-dismissible text-danger fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-trash-alt"></i> CATEGORÍA ELIMINADA
                </h5>
                <hr>
                <p>LA CATEGORÍA <strong>{{$data['destroy']}}</strong> HA SIDO ELIMINADA.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(isset($data['update']))
            <div class="alert alert-primary alert-dismissible text-primary fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-sync-alt"></i> CATEGORÍA ACTUALIZADA
                </h5>
                <hr/>
                <p>LA CATEGORÍA <strong>{{$data['update'][0]}}</strong> HA CAMBIADO SU NOMBRE A <strong>{{$data['update'][1]}}</strong>.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif--}}

	    {{--CONTENIDO--}}
        <hr style="border-color: #FFC312"/>

        <div class="d-flex justify-content-center">
            <a href="{{route('categories.create')}}">
                <button class="btn btn-outline-warning font-weight-bold">
                    Agregar una categoría
                </button>
            </a>
        </div>
        <br/>

        <div class="d-flex justify-content-center">
            <table class="categories-table table table-striped table-dark table-bordered table-hover table-sm col-md-6">
                <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">ACTIVO</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @forelse($categories as $category)
                    <tr data-id="{{$category->id}}" data-name="{{$category->name}}" data-active="{{$category->active?'SI':'NO'}}">
                        <th scope="row">{{$category->id}}</th>
                        <td id="categoryName{{$category->id}}">{{$category->name}}</td>
                        <td id="categoryActive{{$category->id}}">{{$category->active}}</td>
                        <td>
                            @if($category->name != 'SIN CATEGORIA')
                                <a class="btn-edit text-primary"><i class="fas fa-edit"></i></a>
                                <a class="btn-cancel text-danger d-none" href=""><i class="fas fa-times-circle"></i>   </a>
                                <a class="btn-update text-success d-none" href="">
                                    <i class="fas fa-sync-alt"></i>
                                    <form method="POST" id="frm-update{{$category->id}}" class="d-none" action="{{route('categories.update', ':CATEGORY_NAME')}}">
                                        <input type="hidden" value="{{$category->id}}" name="category_id">
{{--                                        <input type="hidden" value="" id="frm_active{{$category->id}}" name="category_active">--}}
                                        @csrf @method('PUT')
                                    </form>
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($category->name != 'SIN CATEGORIA')
                            <a href="" class="btn-destroy text-danger">
                                <form id="frm-destroy{{$category->id}}" class="d-none" action="{{route('categories.destroy', $category)}}" method="POST">
                                    @csrf @method('DELETE')
                                </form>
                                <i class="fas fa-trash align-self-center"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <li>No se encontraron categorías en la base de datos.</li>
                @endforelse
                </tbody>
            </table>
        </div>
    </ul>
@endsection

@section('scripts')
    <script src="{{asset('js/category.index.js')}}"></script>
@endsection
