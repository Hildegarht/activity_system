<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityHistory extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function assigned_user() {
        return $this->hasOne(User::class, "id", "assigned_to");
    }

    public function prev_assigned_user() {
        return $this->hasOne(User::class, "id", "assigned_to");
    }

    // public function prev_assigned_to() {
    //     return $this->hasOne(User::class);
    // }

}
