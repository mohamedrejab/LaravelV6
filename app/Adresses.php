<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresses extends Model
{
    public $timestamps=false;
    protected $fillable = [ 'country', 'user_id'];
    protected $table = "adresses";

    public function User(){
        return $this->belongsTo(User::class);
    }
}
