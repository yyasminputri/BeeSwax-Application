@extends('layouts.dashboard')

@section('title', 'Shopping Cart')

@section('dashboard-content')

@php
$cartItems = [
    [
        'id' => 1,
        'name' => 'Beeswax Straw Classic',
        'price' => 15000,
        'quantity' => 2,
        'image' => 'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=200',
        'description' => '100% biodegradable beeswax coating'
    ],
    [
        'id' => 2,
        'name' => 'Beeswax Straw Premium',
        'price' => 25000,
        'quantity' => 1,
        'image' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=200',
        'description' => 'Extra strong coating - tahan 8 jam'
    ],
    [
        'id' => 3,
        'name' => 'Beeswax Straw Colored',
        'price' => 20000,
        'quantity' => 3,
        'image' => 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=200',
        'description' => '5 warna natural untuk party'
    ]
];

$subtotal = collect($cartItems)->sum(function($item) {
    return $item['price'] * $item['quantity'];
});

$shipping = $subtotal >= 100000 ? 0 : 10000;
$total = $subtotal + $shipping;
@endphp

<div class="cart-container">
    <div class="cart-header mb-4">
        <h2 class="page-title">
            <i class="fas fa-shopping-cart"></i>
            Shopping Cart
        </h2>
        <p class="page-subtitle">Review your eco-friendly items before checkout</p>
    </div>

    @if(count($cartItems) > 0)
    <div class="cart-content">
        <!-- Cart Items -->
        <div class="cart-items">
            @foreach($cartItems as $item)
            <div class="cart-item">
                <div class="item-image">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                </div>
                <div class="item-details">
                    <h3 class="item-name">{{ $item['name'] }}</h3>
                    <p class="item-description">{{ $item['description'] }}</p>
                    <div class="item-features">
                        <span class="feature-tag">Eco-Friendly</span>
                        <span class="feature-tag">Food Grade</span>
                    </div>
                </div>
                <div class="item-quantity">
                    <label>Quantity:</label>
                    <div class="quantity-controls">
                        <button onclick="updateQuantity({{ $item['id'] }}, 'decrease')">-</button>
                        <input type="number" value="{{ $item['quantity'] }}" id="qty-{{ $item['id'] }}" readonly>
                        <button onclick="updateQuantity({{ $item['id'] }}, 'increase')">+</button>
                    </div>
                </div>
                <div class="item-price">
                    <div class="unit-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                    <div class="total-price">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                </div>
                <div class="item-actions">
                    <button class="btn-remove" onclick="removeItem({{ $item['id'] }})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <div class="summary-card">
                <h3>Order Summary</h3>
                
                <div class="summary-row">
                    <span>Subtotal ({{ count($cartItems) }} items)</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>Rp {{ number_format($shipping, 0, ',', '.') }}</span>
                </div>
                
                <div class="summary-row">
                    <span>Tax</span>
                    <span>Rp 0</span>
                </div>
                
                <hr>
                
                <div class="summary-row total">
                    <span>Total</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <div class="promo-section">
                    <input type="text" placeholder="Enter promo code" class="promo-input">
                    <button class="btn-promo">Apply</button>
                </div>

                <a href="{{ route('orders.checkout') }}" class="btn-checkout">
                    <i class="fas fa-credit-card"></i>
                    Proceed to Checkout
                </a>

                <div class="secure-checkout">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure checkout with SSL encryption</span>
                </div>
            </div>

            <!-- Shipping Info -->
            <div class="shipping-info">
                <h4><i class="fas fa-truck"></i> Shipping Information</h4>
                <ul>
                    <li>Free shipping for orders above Rp 100.000</li>
                    <li>Standard delivery: 3-5 business days</li>
                    <li>Express delivery available</li>
                    <li>Eco-friendly packaging included</li>
                </ul>
            </div>

            <!-- Eco Benefits -->
            <div class="eco-benefits">
                <h4><i class="fas fa-leaf"></i> Your Environmental Impact</h4>
                <div class="benefit-item">
                    <i class="fas fa-recycle"></i>
                    <span>{{ array_sum(array_column($cartItems, 'quantity')) * 2 }}g plastic waste saved!</span>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-tree"></i>
                    <span>Supporting sustainable beekeeping</span>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-heart"></i>
                    <span>100% biodegradable materials</span>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="empty-cart">
        <div class="empty-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <h3>Your cart is empty</h3>
        <p>Looks like you haven't added any eco-friendly straws yet.</p>
        <a href="{{ route('products.index') }}" class="btn-shop">
            <i class="fas fa-leaf"></i>
            Start Shopping
        </a>
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .cart-header {
        text-align: center;
        padding: 2rem 0;
        border-bottom: 1px solid rgba(83, 120, 86, 0.1);
    }

    .page-title {
        color: var(--primary);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .page-title i {
        color: var(--secondary);
        margin-right: 1rem;
    }

    .page-subtitle {
        color: #666;
        font-size: 1.1rem;
        margin: 0;
    }

    .cart-content {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 2rem;
        margin-top: 2rem;
    }

    .cart-items {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .cart-item {
        background: var(--white);
        padding: 1.5rem;
        border-radius: 15px;
        box-shadow: 0 5px 20px var(--shadow);
        display: grid;
        grid-template-columns: 100px 1fr auto auto auto;
        gap: 1.5rem;
        align-items: center;
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px var(--shadow);
    }

    .item-image {
        width: 100px;
        height: 100px;
        border-radius: 10px;
        overflow: hidden;
        background: var(--light);
    }

    .item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-details {
        flex: 1;
    }

    .item-name {
        color: var(--primary);
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .item-description {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.75rem;
    }

    .item-features {
        display: flex;
        gap: 0.5rem;
    }

    .feature-tag {
        background: rgba(83, 120, 86, 0.1);
        color: var(--primary);
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .item-quantity label {
        display: block;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        overflow: hidden;
        width: fit-content;
    }

    .quantity-controls button {
        width: 30px;
        height: 30px;
        border: none;
        background: var(--light);
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quantity-controls button:hover {
        background: var(--primary);
        color: var(--white);
    }

    .quantity-controls input {
        width: 40px;
        height: 30px;
        border: none;
        text-align: center;
        font-weight: 600;
        background: var(--white);
    }

    .item-price {
        text-align: right;
    }

    .unit-price {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }

    .total-price {
        color: var(--primary);
        font-size: 1.2rem;
        font-weight: 700;
    }

    .item-actions {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .btn-remove {
        width: 35px;
        height: 35px;
        border: none;
        background: #ff6b6b;
        color: var(--white);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-remove:hover {
        background: #ff5252;
        transform: scale(1.05);
    }

    .order-summary {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        height: fit-content;
        position: sticky;
        top: 2rem;
    }

    .summary-card {
        background: var(--white);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 8px 25px var(--shadow);
    }

    .summary-card h3 {
        color: var(--primary);
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        font-size: 1rem;
    }

    .summary-row.total {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
        margin-top: 1rem;
    }

    .promo-section {
        display: flex;
        gap: 0.5rem;
        margin: 1.5rem 0;
    }

    .promo-input {
        flex: 1;
        padding: 0.75rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 0.9rem;
    }

    .promo-input:focus {
        outline: none;
        border-color: var(--primary);
    }

    .btn-promo {
        padding: 0.75rem 1rem;
        background: var(--accent);
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-promo:hover {
        background: var(--primary);
    }

    .btn-checkout {
        width: 100%;
        padding: 1.25rem;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        margin-top: 1rem;
        transition: all 0.3s ease;
    }

    .btn-checkout:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(83, 120, 86, 0.3);
    }

    .secure-checkout {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1rem;
        color: #666;
        font-size: 0.9rem;
    }

    .secure-checkout i {
        color: var(--accent);
    }

    .shipping-info,
    .eco-benefits {
        background: rgba(113, 155, 116, 0.1);
        padding: 1.5rem;
        border-radius: 15px;
        border: 1px solid rgba(113, 155, 116, 0.2);
    }

    .shipping-info h4,
    .eco-benefits h4 {
        color: var(--primary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .shipping-info ul {
        list-style: none;
        padding: 0;
    }

    .shipping-info li {
        color: #666;
        margin-bottom: 0.5rem;
        padding-left: 1rem;
        position: relative;
    }

    .shipping-info li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--accent);
        font-weight: bold;
    }

    .benefit-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        color: #666;
    }

    .benefit-item i {
        color: var(--accent);
        width: 20px;
    }

    .empty-cart {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-icon {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 2rem;
    }

    .empty-cart h3 {
        color: var(--primary);
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .empty-cart p {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .btn-shop {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
        padding: 1rem 2rem;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }

    .btn-shop:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(83, 120, 86, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .cart-content {
            grid-template-columns: 1fr;
        }

        .cart-item {
            grid-template-columns: 80px 1fr;
            grid-template-rows: auto auto auto;
            gap: 1rem;
        }

        .item-quantity,
        .item-price,
        .item-actions {
            grid-column: 1 / -1;
            justify-self: start;
        }

        .item-price {
            text-align: left;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    function updateQuantity(itemId, action) {
        const qtyInput = document.getElementById(`qty-${itemId}`);
        let currentQty = parseInt(qtyInput.value);
        
        if (action === 'increase') {
            currentQty++;
        } else if (action === 'decrease' && currentQty > 1) {
            currentQty--;
        }
        
        qtyInput.value = currentQty;
        updatePriceDisplay();
        showNotification('Cart updated!', 'success');
    }

    function removeItem(itemId) {
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            const itemElement = event.target.closest('.cart-item');
            itemElement.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                itemElement.remove();
                updatePriceDisplay();
                showNotification('Item removed from cart', 'success');
            }, 300);
        }
    }

    function updatePriceDisplay() {
        // Recalculate totals (in a real app, this would be server-side)
        console.log('Updating price display...');
    }

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            background: ${type === 'success' ? 'var(--accent)' : '#dc3545'};
            color: white;
            border-radius: 10px;
            z-index: 1000;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
</script>
@endpush