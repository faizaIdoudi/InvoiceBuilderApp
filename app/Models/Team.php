<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

     /**
     * Attributs assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'surname',
        'email',
        'password',  
    ];

    /**
     * Les attributs qui doivent être masqués pour les tableaux.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
