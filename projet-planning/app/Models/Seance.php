<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    protected $table = 'seances';
    public $timestamps = false;
    protected $fillable = ['date_debut', 'date_fin'];
    public function etudiants(){
        return $this->belongsToMany(Etudiant::class,'presences','seance_id','etudiant_id');
    }

    public function cours(){
        return $this->belongsTo(Cours::class);
    }
}
