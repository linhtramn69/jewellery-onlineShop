<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $table = 'accounts';
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'role'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'username');
    }

    
   
}
