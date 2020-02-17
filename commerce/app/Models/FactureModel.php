<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProduitFactureModel;
class FactureModel extends Model
{
    protected $table = 'Facture';
    public function produitfacture()
    {
        return $this->hasMany(ProduitFactureModel::class, 'facture_id');
    }
}
