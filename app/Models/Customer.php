<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'branch_id',
        'id_national',
        'full_name',
        'phone',
        'loyal_points',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customerInvoices()
    {
        return $this->hasMany(Invoice::class, 'customer_id', 'id');
    }

    public function customerDiscounts()
    {
        return $this->hasMany(Discount::class, 'customer_id', 'id');
    }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
