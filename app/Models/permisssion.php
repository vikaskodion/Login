<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permisssion extends Model
{
    use HasFactory;
    protected $fillable =['name','slug'];

    public function roles(){
        return $this->belongsTomany(Role::class,'roles-permissions');
    }

    public function users(){
        return $this->belongsTomany(User::class,'users_permissions');
    }

}
