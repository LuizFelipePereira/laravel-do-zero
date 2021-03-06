<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use ShieldForce\AutoValidation\Traits\TraitStartInterception;
use Illuminate\Http\Request;

class User extends Authenticatable
{
     use TraitStartInterception;
     use HasFactory, Notifiable;

     public static function rulesCustom(Request $request)
     {
          return
               [
                    "request" => $request,
                    "creating" =>
                         [
                              "validations" =>
                                   [
                                        "first_name" => ["required", "string", "max:50"],
                                        "last_name" => ["required", "string", "max:50"],
                                        "email" => ["required", "string", "email", "max:100", "unique:users"],
                                        "password" => ["required", "string", "min:4", "confirmed"],
                                        "password_confirmation" => ["required", "string", "min:4"],
                                   ],
                              "messages" =>
                                   [
                                        "first_name.required" => "Primeiro nome é obritatório",
                                        "last_name.required" => ":attribute nome é obritatório",
                                        "password_confirmation.required" => "Confirmação de senha é obrigatório",
                                   ]
                         ],
                    "updating" =>
                         [
                              "validations" =>
                                   [
                                        "id" => ["required"],
                                   ],
                              "messages" =>
                                   [
                                        "id.required" => "Campo id é obritatório",
                                   ]
                         ],
                    "retrieved:login" =>
                         [
                              "validations" =>
                                   [
                                        "email" => ["required", "string", "email", "max:100"],
                                        "password" => ["required", "string"],
                                   ],
                              "messages" =>
                                   [
                                        //
                                   ]
                         ],
               ];
     }

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
          'first_name',
          'last_name',
          'email',
          'password',
     ];

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
          'remember_token',
     ];

     /**
      * The attributes that should be cast to native types.
      *
      * @var array
      */
     protected $casts = [
          'email_verified_at' => 'datetime',
     ];
}
