<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    public function product()
{
    return $this->hasMany(Product::class);
}

    protected $fillable = ['name', 'description'];
    protected $primaryKey = 'id'; // Corrected property name


}
