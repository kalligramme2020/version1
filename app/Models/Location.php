<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table ='location';

    protected $fillable =['type_bail','bien_id', 'locataire_id', 'users_id','debut_bail', 'fin_bail','residence1','residence2',
        'loyer_hc','charge', 'loyer_ac','garantir','description','echeance','activite','activite', 'payment_date',
        'activiter_proprio','activiter_locataire','conditions','montant_proprio','montant_locataire','charge','identifiant','montant',

    ];



    public function  bailler()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

//    public function  etats()
//    {
//        return $this->hasMany('App\Models\Etat', 'location_id');
//    }
//
//    public static function boot()
//    {
//        parent::boot(); // TODO: Change the autogenerated stub
//
//        static::deleting(function ($location) {
//            $location->etats()->delete();
//        });
//    }

    public function  paiments()
    {
        return $this->hasMany('App\Models\Paiement', 'location_id');
    }

    public static function boote()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function ($location) {
            $location->paiments()->delete();
        });
    }

    public function bien(){
        return $this->belongsTo('App\Models\Bien' , 'bien_id');
    }

    public function locataire(){
        return $this->belongsTo('App\Models\Locataire' , 'locataire_id');
    }



}
