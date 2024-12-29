<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compteur extends Model
{
    use HasFactory; use HasFactory;

    protected $fillable = [
    'uid',
    'numero_compteur',
    'type_compteur',
    'etat',
    'marque'
    ];

    public function clients(){
        return $this->belongsTo(Client::class);
    }


    // Find by uid.
     public static function findByUid($uid)
    {
        return static::where('uid', $uid)->first();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {


        	do {

            	$uid = random_int(100000000, 999999999);

        	} while (static::where("uid", "=", $uid)->first());
            
            $model->uid = $uid;
            
        });
    }
}
