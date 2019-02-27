
@extends('layouts.layout')

@section('title', 'STOCK')

@section('section')
    @include('components.navbarAdmin')
    <ul>
        @foreach ($products as $product)
        <li>{{$product->description}}, ${{ $product->price }}</li>
        @endforeach
    </ul>

    {{--<div class="container">--}}
        {{--<div class="row"></div>--}}
    {{--</div>--}}
@endsection
