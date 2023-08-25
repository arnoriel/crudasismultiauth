<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $visible = ['nama', 'walkel', 'telepon', 'mapel', 'alamat'];

    protected $fillable = ['nama', 'walkel', 'telepon', 'mapel', 'alamat'];
}
