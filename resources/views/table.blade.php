@extends('layout')

@section('contenido')
<div class="container p-5">
    <table class="table m-5" id="pokeTable">
        <thead>
          <tr>
            <th scope="col">{{__('headers.HEADERATABLEID')}}</th>
            <th scope="col">{{__('headers.HEADERATABLENAME')}}</th>
            <th scope="col">{{__('headers.HEADERATABLEEXPERIENCE')}}</th>
            <th scope="col">{{__('headers.HEADERATABLEWEIGHT')}}</th>
            <th scope="col">{{__('headers.HEADERATABLEHEIGHT')}}</th>
            <th scope="col">{{__('headers.HEADERATABLEBACKDEFAULT')}}</th>
            <th scope="col">{{__('headers.HEADERATABLEBACKSHINY')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pokemons as $pokemon)
                <tr>
                    <th scope="row">{{$pokemon->apiid}}</th>
                    <td>{{$pokemon->name}}</td>
                    <td>{{$pokemon->base_experience}}</td>
                    <td>{{$pokemon->weight}}</td>
                    <td>{{$pokemon->height}}</td>
                    <td>
                        <img src="{{$pokemon->back_default}}" alt="{{$pokemon->back_default}}">
                    </td>
                    <td>
                        <img src="{{$pokemon->back_shiny}}" alt="{{$pokemon->back_default}}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready( function () {
        $('#pokeTable').DataTable();
    });
</script>
    
@endpush