<?php

namespace App\Http\Controllers;

use App\Models\Tenant\Product;
use Illuminate\Http\Request;

class AdmController extends Controller
{
    //

    public function __construct()
    {

       // $this->middleware('auth');

    }

   

    public function index(){



    
      //  $product= new Product();
        
     //   return Product::all();

        return view("adm");

    }
}
