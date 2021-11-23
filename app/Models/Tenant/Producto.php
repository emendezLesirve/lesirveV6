<?php

namespace App\Models\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //

    use UsesTenantConnection;

    protected $table='productos';

   protected $primaryKey='id';

   public $timestamps=false;

   protected $fillable =[
       'name',
       'price'

   ];

   protected $guarded =[

   ];
}
