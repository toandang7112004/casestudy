<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function scopeSearch($query){
        if(request('key')){
            $key = request('key');
            $query = $query -> where('name','like','%'.$key.'%');
        }
    }
    public function customer()
    {
        return $this->belongsToMany(Customer::class, 'comments','customer_id', 'product_id');
    }
}