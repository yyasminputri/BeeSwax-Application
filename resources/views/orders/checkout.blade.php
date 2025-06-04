@extends('layouts.dashboard')

@section('title', 'Checkout')

@section('dashboard-content')

@php
$cartItems = [
    [
        'id' => 1,
        'name' => 'Beeswax Straw Classic',
        'price' => 15000,
        'quantity' => 2,
        'image' => 'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=60'
    ],
    [
        'id' => 2,
        'name' => 'Beeswax Straw Premium',
        'price' => 25000,
        'quantity' => 1,
        'image' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=60'
    ]
];

$subtotal = collect($cartItems)->sum(function($item) {
    return $item['price'] * $item['quantity'];
});

$shipping = 10000;
$total = $subtotal + $shipping;
@endphp

<div class="checkout-container">
    <div class="checkout-header mb-4">
        <h2 class="page-title">
            <i class="fas fa-credit-card"></i>
            Checkout
        </h2>
        <div class="checkout-steps">
            <div class="step active">
                <span class="step-number">1</span>
                <span class="step-label">Shipping</span>
            </div>
            <div class="step">
                <span class="step-number">2</span>
                <span class="step-label">Payment</span>
            </div>
            <div class="step">
                <span class="step-number">3</span>
                <span class="step-label">Confirmation</span>
            </div>
        </div>
    </div>

    <form action="{{ route('payment.process') }}" method="POST" class="checkout-form">
        @csrf
        <div class="checkout-content">
            <!-- Shipping Information -->
            <div class="checkout-main">
                <div class="section">
                    <h3 class="section-title">
                        <i class="fas fa-shipping-fast"></i>
                        Shipping Information
                    </h3>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required value="{{ Auth::user()->name }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required value="{{ Auth::user()->email }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required placeholder="+62 812 3456 7890">
                        </div>
                        
                        <div class="form-group span-2">
                            <label for="address">Address *</label>
                            <textarea id="address" name="address" required placeholder="Enter your complete address"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="city">City *</label>
                            <input type="text" id="city" name="city" required placeholder="Jakarta">
                        </div>
                        
                        <div class="form-group">
                            <label for="postal_code">Postal Code *</label>
                            <input type="text" id="postal_code" name="postal_code" required placeholder="12345">
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="section">
                    <h3 class="section-title">
                        <i class="fas fa-credit-card"></i>
                        Payment Method
                    </h3>
                    
                    <div class="payment-methods">
                        <div class="payment-option">
                            <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" checked>
                            <label for="bank_transfer" class="payment-label">
                                <div class="payment-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <div class="payment-info">
                                    <strong>Bank Transfer</strong>
                                    <p>Transfer to our bank account</p>
                                </div>
                                <div class="payment-fee">Free</div>
                            </label>
                        </div>
                        
                        <div class="payment-option">
                            <input type="radio" id="credit_card" name="payment_method" value="credit_card">
                            <label for="credit_card" class="payment-label">
                                <div class="payment-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="payment-info">
                                    <strong>Credit Card</strong>
                                    <p>Visa, Mastercard, American Express</p>
                                </div>
                                <div class="payment-fee">2.9% fee</div>
                            </label>
                        </div>
                        
                        <div class="payment-option">
                            <input type="radio" id="e_wallet" name="payment_method" value="e_wallet">
                            <label for="e_wallet" class="payment-label">
                                <div class="payment-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="payment-info">
                                    <strong>E-Wallet</strong>
                                    <p>GoPay, OVO, DANA, LinkAja</p>
                                </div>
                                <div class="payment-fee">Free</div>
                            </label>
                        </div>
                        
                        <div class="payment-option">
                            <input type="radio" id="cod" name="payment_method" value="cod">
                            <label for="cod" class="payment-label">
                                <div class="payment-icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <div class="payment-info">
                                    <strong>Cash on Delivery</strong>
                                    <p>Pay when item is delivered</p>
                                </div>
                                <div class="payment-fee">Rp 5.000</div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Order Notes -->
                <div class="section">
                    <h3 class="section-title">
                        <i class="fas fa-sticky-note"></i>
                        Order Notes (Optional)
                    </h3>
                    <textarea name="notes" placeholder="Special instructions for your order..."></textarea>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="checkout-sidebar">
                <div class="order-summary-checkout">
                    <h3>Order Summary</h3>
                    
                    <div class="order-items">
                        @foreach($cartItems as $item)
                        <div class="summary-item">
                            <div class="item-info">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                <div>
                                    <h4>{{ $item['name'] }}</h4>
                                    <p>Qty: {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                            <div class="item-price">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="summary-totals">
                        <div class="total-row">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="total-row">
                            <span>Shipping</span>
                            <span>Rp {{ number_format($shipping, 0, ',', '.') }}</span>
                        </div>
                        <div class="total-row">
                            <span>Tax</span>
                            <span>Rp 0</span>
                        </div>
                        <hr>
                        <div class="total-row final">
                            <span>Total</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button type="submit" class="btn-place-order">
                        <i class="fas fa-lock"></i>
                        Place Order
                    </button>

                    <div class="security-note">
                        <i class="fas fa-shield-alt"></i>
                        <span>Your payment information is secure and encrypted</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    .checkout-header {
        text-align: center;
        padding: 2rem 0;
        border-bottom: 1px solid rgba(83, 120, 86, 0.1);
    }

    .page-title {
        color: var(--primary);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    .page-title i {
        color: var(--secondary);
        margin-right: 1rem;
    }

    .checkout-steps {
        display: flex;
        justify-content: center;
        gap: 2rem;
    }

    .step {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #ccc;
        font-weight: 500;
    }

    .step.active {
        color: var(--primary);
    }

    .step-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    .step.active .step-number {
        background: var(--primary);
        color: var(--white);
    }

    .checkout-content {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 3rem;
        margin-top: 2rem;
    }

    .section {
        background: var(--white);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 20px var(--shadow);
        margin-bottom: 2rem;
    }

    .section-title {
        color: var(--primary);
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title i {
        color: var(--accent);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.span-2 {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-weight: 500;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group textarea {
        padding: 1rem;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--white);
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(83, 120, 86, 0.1);
    }

    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }

    .payment-methods {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .payment-option {
        position: relative;
    }

    .payment-option input[type="radio"] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .payment-label {
        display: flex;
        align-items: center;
        padding: 1.5rem;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--white);
    }

    .payment-option input[type="radio"]:checked + .payment-label {
        border-color: var(--primary);
        background: rgba(83, 120, 86, 0.05);
    }

    .payment-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.2rem;
        margin-right: 1rem;
    }

    .payment-info {
        flex: 1;
    }

    .payment-info strong {
        color: var(--primary);
        font-size: 1.1rem;
        display: block;
        margin-bottom: 0.25rem;
    }

    .payment-info p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
    }

    .payment-fee {
        color: var(--accent);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .order-summary-checkout {
        background: var(--white);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 8px 25px var(--shadow);
        position: sticky;
        top: 2rem;
    }

    .order-summary-checkout h3 {
        color: var(--primary);
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .order-items {
        margin-bottom: 2rem;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #eee;
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .item-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex: 1;
    }

    .item-info img {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        object-fit: cover;
    }

    .item-info h4 {
        color: var(--primary);
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .item-info p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
    }

    .item-price {
        color: var(--primary);
        font-weight: 600;
    }

    .summary-totals {
        border-top: 1px solid #eee;
        padding-top: 1rem;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .total-row.final {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
        margin-top: 1rem;
    }

    .btn-place-order {
        width: 100%;
        padding: 1.25rem;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }

    .btn-place-order:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(83, 120, 86, 0.3);
    }

    .security-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1rem;
        color: #666;
        font-size: 0.9rem;
    }

    .security-note i {
        color: var(--accent);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .checkout-content {
            grid-template-columns: 1fr;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .checkout-steps {
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .page-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.checkout-form');
        const paymentOptions = document.querySelectorAll('input[name="payment_method"]');
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = form.querySelector('.btn-place-order');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                window.location.href = '{{ route("orders.success") }}';
            }, 2000);
        });
    });
</script>
@endpush