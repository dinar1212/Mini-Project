<?php

namespace App\Models;

use App\Models\tb_m_project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_m_client extends Model
{
    use HasFactory;
    // field apa saja yang bisa di isi
    public $fillable = ['name', 'address',];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;

    public function project()
    {
        return $this->hasMany(tb_m_project::class);
    }
}