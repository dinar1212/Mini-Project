<?php

namespace App\Models;

use App\Models\tb_m_client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_m_project extends Model
{
    use HasFactory;

    public $timestamps = true;

  
    protected $table = 'tb_m_projects';
    public function client()
    {
        // 'barang_id'
        return $this->belongsTo(tb_m_client::class);
    }
}
