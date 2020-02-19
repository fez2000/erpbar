<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StockModel;

class ProduitStockModel extends Model
{
    protected $table = 'ProduitStock';
    protected $fillable = [ 'produit_id','quantite', 'min', 'max'];
    public function stock()
    {
        
        return $this->belongsTo(StockModel::class, 'stock_id');
    }
}
