@extends('layouts.vista')

@section ('vistacontent')
<br>
           <div 
            class="alert alert-success">
            Pantalla de mensaje
            <?php print_r($_POST);?>
            <a 
            href="#" 
            class="badge badge-success">Ver carrito</a>
            </div>
    
               @foreach ($articulos as $art)
				<tr>
                    <td>{{ $art->id}}</td>
					<td>{{ $art->name}}</td>
                    <td>{{ $art->price}}</td>
					<td>
					      <img src="{{asset('imagenes/articulos/'.$art->img)}}" alt="{{ $art->name}}" height="100px" width="100px" class="img-thumbnail">
					</td>
	
				<td>
				@endforeach

@endsection
	




