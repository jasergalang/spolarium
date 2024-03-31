<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Material extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];

    public function image()
    {
        return $this->hasMany(MaterialImage::class, 'material_id');
    }
}
