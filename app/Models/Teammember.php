<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teammember extends Model
{
    use HasFactory;
    protected $table='teammembers';
    protected $fillable = [
        'id',
        'user_id',
        'teammember_id',
    ];

    public function teams()
    {
         return $this->belongsTo(User::class, 'users', 'teammember_id', 'user_id');
    }

     public function users()
    {
         return $this->belongsToMany(User::class, 'teammembers', 'user_id', 'teammember_id');
    }
}
