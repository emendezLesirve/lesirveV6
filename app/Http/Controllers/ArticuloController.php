<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Tenant\Product;
use App\Models\Tenant\Producto;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\ArticuloFormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ArticuloController extends Controller
{
     

    public function __construct()
    {

     //   $this->middleware('auth');

    }

     public function index(Request $request){


        if ($request)
        {
            $query=trim($request->get('searchText'));
            $articulos=Producto::select('id','name','price','img')
           // ->where('status','=','1')
            ->orderBy('id','desc')
            ->paginate(5);
            //->paginate(7);
            
            return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
   

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
        return Redirect::to('adm/articulos');   

     }

     public function show($id)
     {
         return view("almacen.articulo.show",["articulos"=>Product::findOrFail($id)]);
     }

     public function edit($id){
    
       return view('almacen.articulo.edit',["articulos"=>Product::findOrFail($id)]);
     }

     public function update(ArticuloFormRequest $request,$id)
     {
         $articulos=Product::findOrFail($id);
         $articulos->name=$request->get('name');
         $articulos->price=$request->get('price');
         if (Input::hasFile('img')) {
            $file=Input::file('img');
            //obtenemos la ruta de la imagen
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulos->img=$file->getClientOriginalName();
        }
         $articulos->update();
         return Redirect::to('adm/articulos');
     }
    

     public function destroy($id)
     {
         $articulos=Producto::findOrFail($id);
       //  $articulos->estado='Inactivo';
         $articulos->delete();
         return Redirect::to('adm/articulos');
     }
   
}
