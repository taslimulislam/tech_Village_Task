<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'users';
    protected $primaryKey = 'uuid';
    public $timestamps  = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];
}
