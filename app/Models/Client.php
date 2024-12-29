<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Centre;
use App\Models\Compteur;
use App\Models\TypeClient;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'nom',
        'prenom',
        'email',
        'username',
        'password',
        'telephone',
        'adresse',
        'quartier',
        'date_de_naissance',
        'description',
        'statut_client',
        'num_compteur',
        'code_centre',
        'type_client_id',
        ];

        public function centres(){
            return $this->belongsToMany(Center::class, 'center_client');
        }
        public function compteurs(){
            return $this->hasMany(Compteur::class);
        }
        public function typeClient(){
            return $this->belongsTo(TypeClient::class);
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
    
