<?php  // model digunakan untuk melakukna koneksi dengan database

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   laptop extends Model
{
    use HasFactory;

    protected $table = 'laptop';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded  = ['id'];

    protected $fillable = [
        'name',
        'price',
        'type'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
}
