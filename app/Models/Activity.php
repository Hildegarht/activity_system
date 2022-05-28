<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "task_name",
        "task_description",
        "user_id",
        "task_status"
    ];

    public function user() {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function history() {
        return $this->hasMany(ActivityHistory::class, "activity_id", "id");
    }

}
