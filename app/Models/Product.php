<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'images',
        'features',
        'specifications',
        'stock',
        'category',
        'rating',
        'reviews_count',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
        'features' => 'array',
        'specifications' => 'array',
        'price' => 'decimal:0',
        'rating' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getMainImageAttribute()
    {
        return $this->image ?: 'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=400';
    }

    public function getImageGalleryAttribute()
    {
        if ($this->images && is_array($this->images)) {
            return $this->images;
        }
        
        return [
            $this->main_image,
            'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=400',
            'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=400'
        ];
    }

    // Methods
    public function isInStock()
    {
        return $this->stock > 0;
    }

    public function decreaseStock($quantity)
    {
        $this->decrement('stock', $quantity);
    }

    public function increaseStock($quantity)
    {
        $this->increment('stock', $quantity);
    }
}