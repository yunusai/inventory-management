<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'created_by'];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
