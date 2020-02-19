<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StockModel;
use App\Models\ProduitModel;
class ProduitStockModel extends Model
{
    protected $table = 'ProduitStock';
    protected $fillable = [ 'produit_id','quantite', 'min', 'max'];
    public function stock()
    {
        
        return $this->belongsTo(StockModel::class, 'stock_id');
    }
    public function produit(){
        return $this->hasOne('App\Models\ProduitModel','id','produit_id');
    }
}
