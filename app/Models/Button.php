<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    use HasFactory;

    protected $fillable = ['color','color_bg','label','icon','type','group_id'];

    public function behavior(){
        return $this->morphOne(Behavioral::class,'behavioral');
    }
}
