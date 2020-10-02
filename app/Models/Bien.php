<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = [
        'bien_id', 'type_bien_id','FinBail','statut',
        'users_id', 'name','ville','pays_id', 'addresse','surface', 'description','photos','region'
    ];

    protected $table = 'bien';

    public function pieces()
    {
        return $this->belongsToMany('App\Models\Piece', 'bien_piece','bien_id','piece_id')->withPivot('nombre')->withTimestamps();
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function tbien()
    {
        return $this->belongsTo('App\Models\Type_bien', 'type_bien_id');
    }

//
    public function countrie()
    {
        return $this->belongsTo('App\Models\Pays', 'pays_id');
    }


    public function parentid()
    {
        return $this->belongsTo('App\Models\Bien', 'bien_id');
    }

    public function enfantsid()
    {
        return $this->hasMany('App\Models\Bien', 'bien_id');
    }

    public function locataire()
    {
        return $this->belongsToMany('App\Models\Locataire', 'location','bien_id','locataire_id')->withTimestamps();
    }

    public function locations()
    {
        return $this->hasMany('App\Models\Location' , 'bien_id');
    }


}
