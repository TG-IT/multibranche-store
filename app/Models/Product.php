<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'products';

    public static $searchable = [
        'titel',
        'barcode',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_categorie_id',
        'titel',
        'barcode',
        'description',
        'sell_price',
        'buy_price',
        'quantity',
        'loyal_points',
        'created_at',
        'updated_at',
        'deleted_at',
        
        'min_buy_price',
        'max_buy_price',
        'min_sell_price',
        'max_sell_price',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function productProductReturns()
    {
        return $this->hasMany(ProductReturn::class, 'product_id', 'id');
    }

    public function productDiscounts()
    {
        return $this->hasMany(Discount::class, 'product_id', 'id');
    }

    public function product_categorie()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categorie_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
