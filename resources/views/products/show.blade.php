@extends('layouts.dashboard')

@section('title', 'Product Detail')

@section('dashboard-content')

@php
$productId = $id ?? 1;
$products = [
    1 => [
        'id' => 1,
        'name' => 'Beeswax Straw Classic',
        'price' => 15000,
        'images' => [
            asset('img/classic.png'),
        ],
        'description' => 'Sedotan beeswax klasik dengan lapisan tahan air hingga 4 jam. Perfect untuk minuman sehari-hari. Dibuat dari beeswax murni yang diambil langsung dari sarang lebah alami, memberikan solusi ramah lingkungan tanpa mengurangi kenyamanan penggunaan.',
        'features' => ['100% Biodegradable', 'Tahan 4 jam dalam air', 'Food Grade Material', 'Anti Lembek', 'Ramah Lingkungan', 'Tidak berbau'],
        'specifications' => [
            'Material' => 'Paper + Beeswax Coating',
            'Length' => '20 cm',
            'Diameter' => '6 mm',
            'Weight' => '2 gram',
            'Durability' => '4 hours in water',
            'Package' => '25 pcs per pack'
        ],
        'stock' => 250,
        'category' => 'Classic',
        'rating' => 4.8,
        'reviews' => 156
    ],
    2 => [
        'id' => 2,
        'name' => 'Beeswax Straw Premium',
        'price' => 25000,
        'images' => [
            asset('img/premium.png'),
        ],
        'description' => 'Sedotan beeswax premium dengan extra coating. Tahan hingga 8 jam dalam air dan minuman panas. Cocok untuk penggunaan intensif dan professional dengan kualitas terbaik.',
        'features' => ['Extra Strong Coating', 'Tahan 8 jam dalam air', 'Anti Panas hingga 60°C', 'Premium Quality', 'Professional Grade', 'Heat Resistant'],
        'specifications' => [
            'Material' => 'Paper + Premium Beeswax Coating',
            'Length' => '20 cm',
            'Diameter' => '7 mm',
            'Weight' => '3 gram',
            'Durability' => '8 hours in water',
            'Heat Resistance' => 'Up to 60°C',
            'Package' => '20 pcs per pack'
        ],
        'stock' => 150,
        'category' => 'Premium',
        'rating' => 4.9,
        'reviews' => 89
    ],
    3 => [
        'id' => 3,
        'name' => 'Beeswax Straw Colored',
        'price' => 20000,
        'images' => [
            asset('img/colored.png'),
        ],
        'description' => 'Sedotan beeswax dengan pewarna alami. Tersedia dalam 5 warna menarik untuk acara special. Perfect untuk party, wedding, dan event khusus yang membutuhkan sentuhan warna.',
        'features' => ['5 Warna Pilihan', 'Pewarna Alami 100%', 'Party Ready', 'Instagram-able', 'Event Friendly', 'Mix Colors'],
        'specifications' => [
            'Material' => 'Paper + Colored Beeswax',
            'Length' => '20 cm',
            'Diameter' => '6 mm',
            'Weight' => '2.5 gram',
            'Colors' => '5 Natural Colors',
            'Durability' => '5 hours in water',
            'Package' => '30 pcs mixed colors'
        ],
        'stock' => 100,
        'category' => 'Colored',
        'rating' => 4.7,
        'reviews' => 67
    ],
    4 => [
        'id' => 4,
        'name' => 'Beeswax Straw Bundle',
        'price' => 50000,
        'images' => [
            asset('img/bundle.png'),
        ],
        'description' => 'Paket hemat 50 pcs sedotan beeswax mixed. Cocok untuk keluarga atau usaha kecil.',
        'features' => ['50 Pcs', 'Mixed Variant', 'Hemat 30%', 'Bulk Package'],
        'specifications' => [
            'Material' => 'Paper + Premium Beeswax',
            'Length' => '20 cm',
            'Diameter' => '6 mm',
            'Weight' => '2 gram',
            'Durability' => '4 hours in water',
            'Package' => '50 pcs per pack'
        ],
        'stock' => 75,
        'category' => 'Bundle',
        'rating' => 4.9,
        'reviews' => 32
    ]
];

$product = $products[$productId] ?? $products[1];
@endphp

<div class="product-detail">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav mb-4">
        <a href="{{ route('products.index') }}" class="breadcrumb-link">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </nav>

    <div class="product-detail-container">
        <!-- Product Images -->
        <div class="product-gallery">
            <div class="main-image">
                <img id="mainImage" src="{{ $product['images'][0] }}" alt="{{ $product['name'] }}">
                <div class="image-zoom">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="thumbnail-gallery">
                @foreach($product['images'] as $index => $image)
                <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" 
                     onclick="changeImage('{{ $image }}', this)">
                    <img src="{{ $image }}" alt="Thumbnail {{ $index + 1 }}">
                </div>
                @endforeach
            </div>
        </div>

        <!-- Product Info -->
        <div class="product-info">
            <div class="product-header">
                <span class="product-category">{{ $product['category'] }}</span>
                <h1 class="product-title">{{ $product['name'] }}</h1>
                <div class="product-rating">
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $product['rating'] ? 'filled' : '' }}"></i>
                        @endfor
                    </div>
                    <span class="rating-text">{{ $product['rating'] }} ({{ $product['reviews'] }} reviews)</span>
                </div>
            </div>

            <div class="product-price-section">
                <div class="price">
                    <span class="currency">Rp</span>
                    <span class="amount">{{ number_format($product['price'], 0, ',', '.') }}</span>
                </div>
                <div class="stock-status">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ $product['stock'] }} in stock</span>
                </div>
            </div>

            <div class="product-description">
                <h3>Description</h3>
                <p>{{ $product['description'] }}</p>
            </div>

            <div class="product-features">
                <h3>Key Features</h3>
                <ul class="features-list">
                    @foreach($product['features'] as $feature)
                    <li>
                        <i class="fas fa-check"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="product-specs">
                <h3>Specifications</h3>
                <div class="specs-grid">
                    @foreach($product['specifications'] as $key => $value)
                    <div class="spec-item">
                        <span class="spec-label">{{ $key }}:</span>
                        <span class="spec-value">{{ $value }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="product-actions">
                <div class="quantity-selector">
                    <label>Quantity:</label>
                    <div class="quantity-input">
                        <button type="button" onclick="decreaseQuantity()">-</button>
                        <input type="number" id="quantity" value="1" min="1" max="{{ $product['stock'] }}">
                        <button type="button" onclick="increaseQuantity()">+</button>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn-add-cart" onclick="addToCart({{ $product['id'] }})">
                        <i class="fas fa-cart-plus"></i>
                        Add to Cart
                    </button>
                    <button class="btn-buy-now" onclick="buyNow({{ $product['id'] }})">
                        <i class="fas fa-bolt"></i>
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .breadcrumb-nav {
        padding: 1rem 0;
    }

    .breadcrumb-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .breadcrumb-link:hover {
        color: var(--accent);
    }

    .product-detail-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        margin-bottom: 3rem;
    }

    .product-gallery {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .main-image {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        background: var(--white);
        box-shadow: 0 10px 30px var(--shadow);
    }

    .main-image img {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .image-zoom {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-zoom:hover {
        background: var(--white);
        transform: scale(1.1);
    }

    .thumbnail-gallery {
        display: flex;
        gap: 1rem;
    }

    .thumbnail {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .thumbnail.active {
        border-color: var(--primary);
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .product-category {
        background: linear-gradient(135deg, var(--secondary), #ffd700);
        color: var(--primary);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        display: inline-block;
        width: fit-content;
    }

    .product-title {
        color: var(--primary);
        font-size: 2.5rem;
        font-weight: 700;
        margin: 1rem 0 0.5rem 0;
        line-height: 1.2;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stars {
        display: flex;
        gap: 0.25rem;
    }

    .stars i {
        color: #ddd;
        transition: all 0.3s ease;
    }

    .stars i.filled {
        color: var(--secondary);
    }

    .rating-text {
        color: #666;
        font-size: 0.9rem;
    }

    .product-price-section {
        background: linear-gradient(135deg, var(--white), #f8fcf9);
        padding: 2rem;
        border-radius: 15px;
        border: 1px solid rgba(83, 120, 86, 0.1);
    }

    .price {
        display: flex;
        align-items: baseline;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .currency {
        color: #666;
        font-size: 1.2rem;
    }

    .amount {
        color: var(--primary);
        font-size: 3rem;
        font-weight: 700;
    }

    .stock-status {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--accent);
        font-weight: 500;
    }

    .product-description h3,
    .product-features h3,
    .product-specs h3 {
        color: var(--primary);
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .product-description p {
        color: #666;
        line-height: 1.6;
        font-size: 1rem;
    }

    .features-list {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.75rem;
    }

    .features-list li {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #666;
        font-weight: 500;
    }

    .features-list i {
        color: var(--accent);
    }

    .specs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .spec-item {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem;
        background: rgba(83, 120, 86, 0.05);
        border-radius: 8px;
    }

    .spec-label {
        font-weight: 600;
        color: var(--primary);
    }

    .spec-value {
        color: #666;
    }

    .product-actions {
        background: var(--white);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 8px 25px var(--shadow);
        position: sticky;
        top: 2rem;
    }

    .quantity-selector {
        margin-bottom: 2rem;
    }

    .quantity-selector label {
        display: block;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .quantity-input {
        display: flex;
        align-items: center;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        overflow: hidden;
        width: fit-content;
    }

    .quantity-input button {
        width: 40px;
        height: 40px;
        border: none;
        background: var(--light);
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quantity-input button:hover {
        background: var(--primary);
        color: var(--white);
    }

    .quantity-input input {
        width: 60px;
        height: 40px;
        border: none;
        text-align: center;
        font-weight: 600;
        background: var(--white);
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .btn-add-cart,
    .btn-buy-now {
        padding: 1rem 2rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        font-size: 1rem;
    }

    .btn-add-cart {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
    }

    .btn-buy-now {
        background: linear-gradient(135deg, var(--secondary), #ffd700);
        color: var(--primary);
    }

    .btn-add-cart:hover,
    .btn-buy-now:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-detail-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .product-title {
            font-size: 2rem;
        }

        .amount {
            font-size: 2.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    function changeImage(imageSrc, thumbnail) {
        document.getElementById('mainImage').src = imageSrc;
        
        // Update active thumbnail
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
        });
        thumbnail.classList.add('active');
    }

    function increaseQuantity() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.getAttribute('max'));
        const current = parseInt(input.value);
        
        if (current < max) {
            input.value = current + 1;
        }
    }

    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        const current = parseInt(input.value);
        
        if (current > 1) {
            input.value = current - 1;
        }
    }

    function addToCart(productId) {
        const quantity = document.getElementById('quantity').value;
        
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: parseInt(quantity)
            })
        })
        .then(response => response.json())
        .then(data => {
            showNotification('Product added to cart!', 'success');
        })
        .catch(error => {
            showNotification('Product added to cart!', 'success'); // Demo purposes
        });
    }

    function buyNow(productId) {
        addToCart(productId);
        setTimeout(() => {
            window.location.href = '{{ route("orders.index") }}';
        }, 1000);
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