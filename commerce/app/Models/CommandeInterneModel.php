<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProduitCommandeInterneModel;
class CommandeInterneModel extends Model
{
    protected $table = 'CommandeInterne';
    public function produit_commande_interne()
    {
        return $this->hasMany(ProduitCommandeInterneModel::class, 'commande_interne_id');
    }
}
