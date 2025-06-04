# BeeswaxApp Views dengan Data Hardcoded

## 1. Products Index - `resources/views/products/index.blade.php`

```blade
@extends('layouts.dashboard')

@section('title', 'Products')

@section('dashboard-content')

@php
$products = [
    [
        'id' => 1,
        'name' => 'Beeswax Straw Classic',
        'price' => 15000,
        'image' => 'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=400',
        'description' => 'Sedotan beeswax klasik dengan lapisan tahan air hingga 4 jam. Perfect untuk minuman sehari-hari.',
        'features' => ['100% Biodegradable', 'Tahan 4 jam', 'Food Grade', 'Anti Lembek'],
        'stock' => 250,
        'category' => 'Classic'
    ],
    [
        'id' => 2,
        'name' => 'Beeswax Straw Premium',
        'price' => 25000,
        'image' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=400',
        'description' => 'Sedotan beeswax premium dengan extra coating. Tahan hingga 8 jam dalam air dan minuman panas.',
        'features' => ['Extra Strong', 'Tahan 8 jam', 'Anti Panas', 'Premium Quality'],
        'stock' => 150,
        'category' => 'Premium'
    ],
    [
        'id' => 3,
        'name' => 'Beeswax Straw Colored',
        'price' => 20000,
        'image' => 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=400',
        'description' => 'Sedotan beeswax dengan pewarna alami. Tersedia dalam 5 warna menarik untuk acara special.',
        'features' => ['5 Warna', 'Pewarna Alami', 'Party Ready', 'Instagram-able'],
        'stock' => 100,
        'category' => 'Colored'
    ],
    [
        'id' => 4,
        'name' => 'Beeswax Straw Bundle',
        'price' => 50000,
        'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=400',
        'description' => 'Paket hemat 50 pcs sedotan beeswax mixed. Cocok untuk keluarga atau usaha kecil.',
        'features' => ['50 Pcs', 'Mixed Variant', 'Hemat 30%', 'Bulk Package'],
        'stock' => 75,
        'category' => 'Bundle'
    ],
    [
        'id' => 5,
        'name' => 'Beeswax Straw Kids',
        'price' => 12000,
        'image' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400',
        'description' => 'Sedotan beeswax khusus untuk anak-anak. Ukuran lebih pendek dan aman digunakan.',
        'features' => ['Kid-Friendly', 'Extra Safe', 'Cute Colors', 'BPA Free'],
        'stock' => 180,
        'category' => 'Kids'
    ],
    [
        'id' => 6,
        'name' => 'Beeswax Straw Jumbo',
        'price' => 30000,
        'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=400',
        'description' => 'Sedotan beeswax berukuran jumbo untuk bubble tea dan minuman kental.',
        'features' => ['Extra Wide', 'Bubble Tea Ready', 'Heavy Duty', 'Commercial Grade'],
        'stock' => 120,
        'category' => 'Jumbo'
    ]
];
@endphp

<div class="products-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="page-title">
                <i class="fas fa-leaf"></i>
                Our Products
            </h2>
            <p class="page-subtitle">Discover our eco-friendly beeswax straws collection</p>
        </div>
        <div class="view-toggle">
            <button class="btn-toggle active" onclick="toggleView('grid')">
                <i class="fas fa-th"></i>
            </button>
            <button class="btn-toggle" onclick="toggleView('list')">
                <i class="fas fa-list"></i>
            </button>
        </div>
    </div>
</div>

<!-- Filter Section -->
<div class="filter-section mb-4">
    <div class="filter-card">
        <div class="filter-item">
            <label>Category:</label>
            <select class="filter-select">
                <option value="">All Categories</option>
                <option value="classic">Classic</option>
                <option value="premium">Premium</option>
                <option value="colored">Colored</option>
                <option value="bundle">Bundle</option>
                <option value="kids">Kids</option>
                <option value="jumbo">Jumbo</option>
            </select>
        </div>
        <div class="filter-item">
            <label>Price Range:</label>
            <select class="filter-select">
                <option value="">All Prices</option>
                <option value="0-20000">Under Rp 20.000</option>
                <option value="20000-30000">Rp 20.000 - 30.000</option>
                <option value="30000+">Above Rp 30.000</option>
            </select>
        </div>
        <div class="filter-item">
            <button class="btn-filter">
                <i class="fas fa-search"></i> Filter
            </button>
        </div>
    </div>
</div>

<!-- Products Grid -->
<div class="products-grid" id="productsContainer">
    @foreach($products as $product)
    <div class="product-card">
        <div class="product-image">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
            <div class="product-badge">{{ $product['category'] }}</div>
            <div class="product-overlay">
                <button class="btn-quick-view" onclick="quickView({{ $product['id'] }})">
                    <i class="fas fa-eye"></i> Quick View
                </button>
            </div>
        </div>
        <div class="product-info">
            <h3 class="product-name">{{ $product['name'] }}</h3>
            <p class="product-description">{{ Str::limit($product['description'], 80) }}</p>
            <div class="product-features">
                @foreach(array_slice($product['features'], 0, 2) as $feature)
                <span class="feature-tag">{{ $feature }}</span>
                @endforeach
            </div>
            <div class="product-footer">
                <div class="product-price">
                    <span class="currency">Rp</span>
                    <span class="amount">{{ number_format($product['price'], 0, ',', '.') }}</span>
                </div>
                <div class="product-actions">
                    <button class="btn-cart" onclick="addToCart({{ $product['id'] }})">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                    <a href="{{ route('products.show', $product['id']) }}" class="btn-detail">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </div>
            </div>
            <div class="stock-info">
                <i class="fas fa-box"></i>
                <span>{{ $product['stock'] }} in stock</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('styles')
<style>
    .products-header {
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

    .view-toggle {
        display: flex;
        gap: 0.5rem;
    }

    .btn-toggle {
        width: 40px;
        height: 40px;
        border: 2px solid var(--primary);
        background: transparent;
        color: var(--primary);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-toggle.active,
    .btn-toggle:hover {
        background: var(--primary);
        color: var(--white);
    }

    .filter-section {
        background: var(--white);
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 15px var(--shadow);
    }

    .filter-card {
        display: flex;
        gap: 2rem;
        align-items: end;
        flex-wrap: wrap;
    }

    .filter-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .filter-item label {
        font-weight: 500;
        color: var(--primary);
        font-size: 0.9rem;
    }

    .filter-select {
        padding: 0.75rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        background: var(--white);
        color: var(--dark);
        min-width: 150px;
        transition: all 0.3s ease;
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--primary);
    }

    .btn-filter {
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(83, 120, 86, 0.3);
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
    }

    .product-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 25px var(--shadow);
        transition: all 0.3s ease;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px var(--shadow);
    }

    .product-image {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: linear-gradient(135deg, var(--secondary), #ffd700);
        color: var(--primary);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(255, 207, 123, 0.3);
    }

    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(83, 120, 86, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .product-card:hover .product-overlay {
        opacity: 1;
    }

    .btn-quick-view {
        background: var(--white);
        color: var(--primary);
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .product-card:hover .btn-quick-view {
        transform: translateY(0);
    }

    .product-info {
        padding: 1.5rem;
    }

    .product-name {
        color: var(--primary);
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .product-description {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .product-features {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
        flex-wrap: wrap;
    }

    .feature-tag {
        background: rgba(83, 120, 86, 0.1);
        color: var(--primary);
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .product-price {
        display: flex;
        align-items: baseline;
        gap: 0.25rem;
    }

    .currency {
        color: #666;
        font-size: 0.9rem;
    }

    .amount {
        color: var(--primary);
        font-size: 1.5rem;
        font-weight: 700;
    }

    .product-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-cart,
    .btn-detail {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .btn-cart {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
    }

    .btn-detail {
        background: var(--secondary);
        color: var(--primary);
    }

    .btn-cart:hover,
    .btn-detail:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .stock-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #666;
        font-size: 0.85rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .filter-card {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-item {
            width: 100%;
        }

        .products-grid {
            grid-template-columns: 1fr;
        }

        .page-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    function addToCart(productId) {
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Product added to cart!', 'success');
            }
        })
        .catch(error => {
            showNotification('Product added to cart!', 'success'); // Demo purposes
        });
    }

    function quickView(productId) {
        window.location.href = `/products/${productId}`;
    }

    function toggleView(viewType) {
        const buttons = document.querySelectorAll('.btn-toggle');
        const container = document.getElementById('productsContainer');
        
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.closest('.btn-toggle').classList.add('active');
        
        if (viewType === 'list') {
            container.style.gridTemplateColumns = '1fr';
        } else {
            container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(320px, 1fr))';
        }
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
```

## 2. Product Show - `resources/views/products/show.blade.php`

```blade
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
            'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=600',
            'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=600',
            'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600'
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
            'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=600',
            'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=600',
            'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600'
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
            'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600',
            'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=600',
            'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=600'
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
```

## 3. Orders Index - `resources/views/orders/index.blade.php`

```blade
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
```

## 4. Orders Checkout - `resources/views/orders/checkout.blade.php`

```blade
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
```

## 5. Orders Success - `resources/views/orders/success.blade.php`

```blade
@extends('layouts.dashboard')

@section('title', 'Order Success')

@section('dashboard-content')
<div class="success-container">
    <div class="success-card">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h1 class="success-title">Order Placed Successfully!</h1>
        <p class="success-subtitle">Thank you for choosing eco-friendly beeswax straws</p>
        
        <div class="order-details">
            <div class="order-number">
                <strong>Order #BWX-{{ date('Y') }}-{{ str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT) }}</strong>
            </div>
            <div class="order-info">
                <p>Your order has been confirmed and will be processed within 24 hours.</p>
                <p>You will receive a confirmation email with tracking information shortly.</p>
            </div>
        </div>
        
        <div class="success-actions">
            <a href="{{ route('products.index') }}" class="btn-continue">
                <i class="fas fa-shopping-bag"></i>
                Continue Shopping
            </a>
            <a href="{{ route('dashboard') }}" class="btn-dashboard">
                <i class="fas fa-tachometer-alt"></i>
                Back to Dashboard
            </a>
        </div>
        
        <div class="eco-message">
            <i class="fas fa-leaf"></i>
            <p>Thank you for helping to save our planet! Every beeswax straw you purchase helps reduce plastic waste and supports sustainable beekeeping.</p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .success-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
        padding: 2rem;
    }

    .success-card {
        background: var(--white);
        padding: 4rem 3rem;
        border-radius: 20px;
        box-shadow: 0 15px 50px var(--shadow);
        text-align: center;
        max-width: 600px;
        width: 100%;
    }

    .success-icon {
        font-size: 5rem;
        color: var(--accent);
        margin-bottom: 2rem;
        animation: checkmark 0.6s ease;
    }

    @keyframes checkmark {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
    }

    .success-title {
        color: var(--primary);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .success-subtitle {
        color: #666;
        font-size: 1.2rem;
        margin-bottom: 3rem;
    }

    .order-details {
        background: rgba(83, 120, 86, 0.05);
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 3rem;
    }

    .order-number {
        color: var(--primary);
        font-size: 1.3rem;
        margin-bottom: 1rem;
    }

    .order-info p {
        color: #666;
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }

    .success-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .btn-continue,
    .btn-dashboard {
        padding: 1rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-continue {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
    }

    .btn-dashboard {
        background: var(--secondary);
        color: var(--primary);
    }

    .btn-continue:hover,
    .btn-dashboard:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .eco-message {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        background: linear-gradient(135deg, rgba(113, 155, 116, 0.1), rgba(255, 207, 123, 0.1));
        padding: 1.5rem;
        border-radius: 15px;
        border: 1px solid rgba(113, 155, 116, 0.2);
    }

    .eco-message i {
        color: var(--accent);
        font-size: 1.5rem;
    }

    .eco-message p {
        color: var(--primary);
        font-weight: 500;
        margin: 0;
        text-align: left;
        flex: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .success-card {
            padding: 3rem 2rem;
        }

        .success-title {
            font-size: 2rem;
        }

        .success-actions {
            flex-direction: column;
            align-items: center;
        }

        .btn-continue,
        .btn-dashboard {
            width: 100%;
            justify-content: center;
        }

        .eco-message {
            flex-direction: column;
            text-align: center;
        }

        .eco-message p {
            text-align: center;
        }
    }
</style>
@endpush
