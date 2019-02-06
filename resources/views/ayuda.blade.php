@extends('layouts.default')

@section('title', 'Ayuda - Dragon Market - Equipos y Componentes para Gamers')

@section('section')
<div class="container" style="margin-top: 100px">

    <center>
        <h2><i class="fas fa-question-circle" style="font-size:1em; margin-right: 10px; margin-top: 20px"></i>
            <div style="margin-top: 10px; margin-bottom: 30px">PREGUNTAS FRECUENTES</div>
        </h2>
    </center>

    <div id="accordion">

        <div class="card">
            <div class="card-header" id="heading1">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        ¿CUÁLES SON LAS FORMAS DE PAGO DISPONIBLES?
                    </button>
                </h5>
            </div>

            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
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
        </div>
        <div class="card">
            <div class="card-header" id="heading2">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Collapsible Group Item #2
                    </button>
                </h5>
            </div>
            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                    tempor,
                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings
                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                    tempor,
                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings
                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
</div> {{-- container --}}

@endsection
