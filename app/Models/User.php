<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
<<<<<<< HEAD
<<<<<<< HEAD
=======
    protected $table = 'utilisateurs';
>>>>>>> baptiste
=======
>>>>>>> Ndieme

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
<<<<<<< HEAD
<<<<<<< HEAD
        'name',
        'email',
        'password',
=======
        'nom_utilisateur',
        'prenom_utilisateur',
        'ville',
        'pays',
        'annee_naissance',
        'mois_naissance',
        'numero_telephone',
        'adresse_email',
        'mot_de_passe',
        'photo_utilisateur',
>>>>>>> baptiste
=======
        'name',
        'email',
        'password',
>>>>>>> Ndieme
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
