<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'id',
        'product_category_id',
        'name',
        'price',
        'specification',
        'description'
    ];

    protected $casts = [
        'specification' => 'array',
        'price' => MoneyCast::class,
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banners');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('small')
            ->fit(Manipulations::FIT_CROP, 150, 150)
            ->nonQueued();
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }
}
