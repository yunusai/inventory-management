<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'contact_info', 'created_by'];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
