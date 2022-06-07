@extends('layout')

@section('contenido')
<div class="container p-5">
    <div class="d-flex justify-content-center align-content-center">
        <div class="card text-center shadow overflow-hidden border animated">
            <div class="card-header text-center p-1 border-0 ">
                <img src="{{URL::asset('/img/head.png')}}">
            </div>
            <button id="btnPokedex" type="button" class="btn btn-outline-primary m-1">{{__('headers.BTNPOKEDEX')}}</button>
            <div class="card-body ">
                <div class="text-center">
                    <img id="image" src="{{URL::asset('/img/whos.png')}}"  class="rounded img-fluid w-100">
                </div>
            </div>
            <ul class="list-group list-group-flush border-bottom-0 m-1 ">
                <li class="list-group-item">
                    {{__('headers.LABELNAMEPOKEDEX')}}
                    <p id="name"></p>
                </li>
                <li class="list-group-item">
                    <ul id="type" class="list-group list-group-flush border-0 m-1">

                    </ul>
                </li>
            </ul>
            <div class="card-header text-center p-1 border-0">
                <img src="{{URL::asset('/img/foot.jpg')}}">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        /* Getting components by ID using jQuery */
        const pokedex = $("#btnPokedex");
        const pokedex_image = $("#image");
        const pokedex_name = $("#name");
        const pokedex_type_list = $("#type");
        /* Using the ajax method obtains the pokemon corresponding to the generated index on controller  */
        function setPokemon() {
            $.ajax({
               type:'GET',
               url:'/PokeAPI',
               success:function(data) {
                    const {name:nom, sprites:image, types:types} = data;
                    pokedex_name.text(nom);
                    pokedex_type_list.empty();
                    pokedex_type_list.append(`li`).text("TIPO:")
                    $.each(types, function (index, type) { 
                        pokedex_type_list.append(`<li>${this.type.name}</li>`);
                    }); 
                    pokedex_image.attr('src',image.front_default);
                }
            });
        };

        /* Set execution interval to 30s (30000) and click function to button in PokedexCard */
        $(document).ready(function () {
            setInterval("setPokemon()", 30000);
            pokedex.click(function() {
                setPokemon();
            });
        });
    </script>
@endpush