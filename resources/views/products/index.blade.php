@extends('layouts.dashboard')

@section('title', 'Products')

@section('dashboard-content')

@php
$products = [
    [
        'id' => 1,
        'name' => 'Beeswax Straw Classic',
        'price' => 15000,
        'image' => asset('img/classic.png'),
        'description' => 'Sedotan beeswax klasik dengan lapisan tahan air hingga 4 jam. Perfect untuk minuman sehari-hari.',
        'features' => ['100% Biodegradable', 'Tahan 4 jam', 'Food Grade', 'Anti Lembek'],
        'stock' => 250,
        'category' => 'Classic'
    ],
    [
        'id' => 2,
        'name' => 'Beeswax Straw Premium',
        'price' => 25000,
        'image' => asset('img/premium.png'),
        'description' => 'Sedotan beeswax premium dengan extra coating. Tahan hingga 8 jam dalam air dan minuman panas.',
        'features' => ['Extra Strong', 'Tahan 8 jam', 'Anti Panas', 'Premium Quality'],
        'stock' => 150,
        'category' => 'Premium'
    ],
    [
        'id' => 3,
        'name' => 'Beeswax Straw Colored',
        'price' => 20000,
        'image' => asset('img/colored.png'),
        'description' => 'Sedotan beeswax dengan pewarna alami. Tersedia dalam 5 warna menarik untuk acara special.',
        'features' => ['5 Warna', 'Pewarna Alami', 'Party Ready', 'Instagram-able'],
        'stock' => 100,
        'category' => 'Colored'
    ],
    [
        'id' => 4,
        'name' => 'Beeswax Straw Bundle',
        'price' => 50000,
        'image' => asset('img/bundle.png'),
        'description' => 'Paket hemat 50 pcs sedotan beeswax mixed. Cocok untuk keluarga atau usaha kecil.',
        'features' => ['50 Pcs', 'Mixed Variant', 'Hemat 30%', 'Bulk Package'],
        'stock' => 75,
        'category' => 'Bundle'
    ],
    [
        'id' => 5,
        'name' => 'Beeswax Straw Kids',
        'price' => 12000,
        'image' => asset('img/kids-size.png'),
        'description' => 'Sedotan beeswax khusus untuk anak-anak. Ukuran lebih pendek dan aman digunakan.',
        'features' => ['Kid-Friendly', 'Extra Safe', 'Cute Colors', 'BPA Free'],
        'stock' => 180,
        'category' => 'Kids'
    ],
    [
        'id' => 6,
        'name' => 'Beeswax Straw Jumbo',
        'price' => 30000,
        'image' => asset('img/Jumbo.png'),
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