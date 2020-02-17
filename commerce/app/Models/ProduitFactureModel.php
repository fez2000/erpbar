<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FactureModel;

class ProduitFactureModel extends Model
{
    protected $table = 'ProduitFacture';
    protected $fillable = [ 'produit_id','quantite'];
    public function facture()
    {
        
        return $this->belongsTo(FactureModel::class, 'stock_id');
    }
}
