<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     // Tambahkan di dalam class User

public function orders()
{
    return $this->hasMany(Order::class);
}

public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

// Method untuk cart
public function addToCart($productId, $quantity = 1)
{
    $cartItem = $this->cartItems()->where('product_id', $productId)->first();
    
    if ($cartItem) {
        $cartItem->increment('quantity', $quantity);
    } else {
        $this->cartItems()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }
}

public function removeFromCart($productId)
{
    $this->cartItems()->where('product_id', $productId)->delete();
}

public function getCartTotal()
{
    return $this->cartItems->sum('total_price');
}

public function getCartCount()
{
    return $this->cartItems->sum('quantity');
}

}
