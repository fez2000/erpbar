<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommandeInterneModel;

class ProduitCommandeInterneModel extends Model
{
    protected $table = 'ProduitCommandeInterne';
    protected $fillable = [ 'produit_id','quantite'];
    public function commande_interne()
    {
        
        return $this->belongsTo(CommandeInterneModel::class, 'commande_interne_id');
    }
}
