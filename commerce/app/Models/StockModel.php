<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProduitStockModel;
class StockModel extends Model
{
    protected $table = 'Stock';
    public function produitstock()
    {
        return $this->hasMany(ProduitStockModel::class, 'stock_id');
    }
}
