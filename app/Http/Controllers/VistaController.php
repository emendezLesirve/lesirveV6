<?php

namespace App\Http\Controllers;

use App\Models\Tenant\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticuloFormRequest;
use App\Models\Tenant\Producto;

class VistaController extends Controller
{
    //

    public function index(){

        $articulos=Producto::all();
        
        return view('almacen.Varticulo.index',["articulos"=>$articulos]);

     }

     public function create(){
        return view("almacen.articulo.create");
    }

    public function store(ArticuloFormRequest $request ){
       
       $articulos=new Producto;
       $articulos->name=$request->get("name");
       $articulos->price=$request->get("price");
     //  $articulos->status="Activo";
       if (Input::hasFile('img')) {
           $file=Input::file('img');
           //obtenemos la ruta de la imagen
           $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
           $articulos->img=$file->getClientOriginalName();
       }
       $articulos->save();
       return Redirect::to('vista');   

    }
}
