<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourUser extends Model
{
    use HasFactory;
    protected $table = 'cours_users';
    public $timestamps = false;

    protected $fillable = ['cours_id', 'user_id'];
    public function cours(){
        return $this->belongsToMany(Cours::class,'cours_users','cours_id','user_id');
    }
    public function user(){
        return $this->belongsToMany(User::class,'cours_users','cours_id','user_id');
    }
}
