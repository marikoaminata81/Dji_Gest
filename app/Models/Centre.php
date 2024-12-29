<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Centre extends Model
{
    use HasFactory;

    protected $fillable = [
    'uid',
    'nom'
    ];

    public function clients(){
        return $this->belongsToMany(Client::class, 'center_client');
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
