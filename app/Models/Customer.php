<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';
    public function comment()
    {
        return $this->hasOne(Comment::class, 'customer_id', 'id');
    }
}
