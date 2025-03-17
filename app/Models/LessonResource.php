<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'name',
        'file_path',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
