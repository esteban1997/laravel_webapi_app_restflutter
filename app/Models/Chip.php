<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chip extends Model
{
    use HasFactory;

    protected $fillable = ['color','color_bg','label','icon','group_id'];


    public function behavior(){
        return $this->morphOne(Behavioral::class,'behavioral');
    }
}
