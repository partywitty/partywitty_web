<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class FoodMenu extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "tbl_food_menu";
    protected $guarded = [];
}
