<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'jumlah_orang'];
    // protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
