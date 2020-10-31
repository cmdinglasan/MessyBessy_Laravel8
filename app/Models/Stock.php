<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'branch_id', 'branch_stock', 'branch_minimum_stock'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id')->withTrashed();
    }
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id')->withTrashed();
    }
}
