@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-content')
    <!-- Welcome Section -->
    <div class="container-fluid mb-4" style="padding-top: 1rem;">
            <div class="welcome-content">
                <h3 class="welcome-title mb-3">
                    <i class="fas fa-leaf welcome-icon"></i>
                    Selamat Datang, {{ Auth::user()->name }}! 
                </h3>
                <p class="lead welcome-subtitle">Eksklusif untuk Anda: Produk sedotan beeswax pilihan dengan promo istimewa! 🎁 Mari beralih ke solusi ramah lingkungan</p>
                <div class="promo-grid">
                    <div class="promo-item">
                        <div class="promo-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <div class="promo-content">
                            <strong>Sedotan Beeswax Classic</strong>
                            <span class="promo-badge">Diskon 25%</span>
                            <p>Bundle 100 pcs - Hemat lebih banyak untuk kebutuhan harian!</p>
                        </div>
                    </div>
                    <div class="promo-item">
                        <div class="promo-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="promo-content">
                            <strong>Sedotan Beeswax Premium</strong>
                            <span class="promo-badge">Beli 2 Gratis 1</span>
                            <p>Extra strong coating - Tahan hingga 6 jam dalam air!</p>
                        </div>
                    </div>
                    <div class="promo-item">
                        <div class="promo-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="promo-content">
                            <strong>Sedotan Beeswax Colored</strong>
                            <span class="promo-badge">Cashback 15%</span>
                            <p>Limited edition dengan pewarna alami - Perfect untuk party!</p>
                        </div>
                    </div>
                </div>
                <div class="welcome-cta">
                    <a href="#" class="btn-welcome primary">
                        <i class="fas fa-shopping-cart"></i> Belanja Sekarang
                    </a>
                    <a href="#" class="btn-welcome secondary">
                        <i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    

    <!-- Hero Carousel -->
    <section class="hero-section" style="padding-top: 3rem;">
        <div class="carousel-container">
            <div class="carousel-slide active slide-1">
                <div class="slide-content">
                    <h1 class="slide-title">Revolusi Sedotan Ramah Lingkungan</h1>
                    <p class="slide-subtitle">Sedotan berlapis beeswax yang inovatif - tetap praktis seperti plastik namun 100% biodegradable dan aman untuk lingkungan.</p>
                    <a href="#" class="slide-cta">Pelajari Lebih Lanjut</a>
                </div>
            </div>
            
            <div class="carousel-slide slide-2">
                <div class="slide-content">
                    <h1 class="slide-title">Bahan Alami Sarang Lebah</h1>
                    <p class="slide-subtitle">Beeswax merupakan bahan alami dari sarang lebah, tanpa bahan kimia berbahaya dan memiliki proses penguraian yang cepat.</p>
                    <a href="#" class="slide-cta">Lihat Produk</a>
                </div>
            </div>
            
            <div class="carousel-slide slide-3">
                <div class="slide-content">
                    <h1 class="slide-title">Ketahanan Extra Terhadap Air</h1>
                    <p class="slide-subtitle">Lapisan beeswax memberikan perlindungan optimal sehingga sedotan tidak mudah lembek dan tetap nyaman digunakan.</p>
                    <a href="#" class="slide-cta">Order Sekarang</a>
                </div>
            </div>

            <div class="carousel-nav">
                <div class="carousel-dot active" onclick="currentSlide(1)"></div>
                <div class="carousel-dot" onclick="currentSlide(2)"></div>
                <div class="carousel-dot" onclick="currentSlide(3)"></div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="stat-value">100%</div>
                <div class="stat-label">Biodegradable</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="stat-value">0</div>
                <div class="stat-label">Bahan Kimia Berbahaya</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-water"></i>
                </div>
                <div class="stat-value">24h</div>
                <div class="stat-label">Tahan Air Optimal</div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <h2 class="section-title">Keunggulan Sedotan Beeswax</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="feature-title">Ramah Lingkungan</h3>
                <p class="feature-desc">Terbuat dari bahan alami yang dapat terurai dengan sempurna, mengurangi limbah plastik dan melindungi ekosistem.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="feature-title">Aman untuk Kesehatan</h3>
                <p class="feature-desc">Tanpa kandungan bahan kimia berbahaya, aman untuk semua usia dan tidak meninggalkan rasa atau bau asing.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-droplet"></i>
                </div>
                <h3 class="feature-title">Tahan Air</h3>
                <p class="feature-desc">Lapisan beeswax memberikan ketahanan optimal terhadap air, menjaga sedotan tetap kuat dan tidak mudah lembek.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2 class="cta-title">Mari Beralih ke Solusi yang Lebih Baik</h2>
        <p class="cta-subtitle">Bergabunglah dengan gerakan ramah lingkungan. Setiap sedotan beeswax yang Anda gunakan adalah langkah kecil untuk bumi yang lebih bersih.</p>
        <div class="cta-buttons">
            <a href="#" class="cta-button primary">Mulai Order</a>
            <a href="#" class="cta-button secondary">Hubungi Kami</a>
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Welcome Section */
    .gradient-card {
        background: linear-gradient(135deg, var(--white) 0%, #f8fcf9 100%);
        border: none;
        border-radius: 20px;
        border-left: 5px solid var(--primary);
        position: relative;
        overflow: hidden;
    }

    .gradient-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: linear-gradient(135deg, var(--secondary), var(--accent));
        opacity: 0.1;
        border-radius: 50%;
        transform: translate(50%, -50%);
    }

    .welcome-content {
        position: relative;
        z-index: 2;
    }

    .welcome-title {
        color: var(--primary);
        font-weight: 700;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .welcome-icon {
        color: var(--secondary);
        font-size: 2rem;
    }

    .welcome-subtitle {
        color: #555;
        font-size: 1.1rem;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .promo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .promo-item {
        background: var(--white);
        padding: 1.5rem;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(83, 120, 86, 0.08);
        border: 1px solid rgba(83, 120, 86, 0.1);
        transition: all 0.3s ease;
        display: flex;
        gap: 1rem;
        align-items: flex-start;
    }

    .promo-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(83, 120, 86, 0.15);
    }

    .promo-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .promo-content {
        flex: 1;
    }

    .promo-content strong {
        color: var(--primary);
        font-size: 1.1rem;
        display: block;
        margin-bottom: 0.5rem;
    }

    .promo-badge {
        background: linear-gradient(135deg, var(--secondary), #ffd700);
        color: var(--primary);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 0.5rem;
        box-shadow: 0 2px 8px rgba(255, 207, 123, 0.3);
    }

    .promo-content p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
        line-height: 1.4;
    }

    .welcome-cta {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .btn-welcome {
        padding: 0.75rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.95rem;
    }

    .btn-welcome.primary {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
        box-shadow: 0 4px 15px rgba(83, 120, 86, 0.3);
    }

    .btn-welcome.primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(83, 120, 86, 0.4);
    }

    .btn-welcome.secondary {
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
    }

    .btn-welcome.secondary:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .welcome-title {
            font-size: 1.5rem;
        }

        .promo-grid {
            grid-template-columns: 1fr;
        }

        .welcome-cta {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-welcome {
            justify-content: center;
        }
    }

    /* Hero Section with Carousel */
    .hero-section {
        margin-bottom: 3rem;
    }

    .carousel-container {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px var(--shadow);
        height: 500px;
    }

    .carousel-slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
        display: flex;
        align-items: center;
    }

    .carousel-slide.active {
        opacity: 1;
    }

    .slide-1 {
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    }

    .slide-2 {
        background: linear-gradient(135deg, var(--accent) 0%, var(--secondary) 100%);
    }

    .slide-3 {
        background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
    }

    .slide-content {
        padding: 4rem;
        color: var(--white);
        max-width: 60%;
    }

    .slide-title {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .slide-subtitle {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .slide-cta {
        background: var(--white);
        color: var(--primary);
        padding: 1rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .slide-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .carousel-nav {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 1rem;
    }

    .carousel-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .carousel-dot.active {
        background: var(--white);
        transform: scale(1.2);
    }

    /* Stats Cards */
    .stats-section {
        margin-bottom: 3rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .stat-card {
        background: var(--white);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 25px var(--shadow);
        transition: all 0.3s ease;
        border-left: 4px solid var(--primary);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px var(--shadow);
    }

    .stat-card:nth-child(2) {
        border-left-color: var(--secondary);
    }

    .stat-card:nth-child(3) {
        border-left-color: var(--accent);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .stat-card:nth-child(1) .stat-icon {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: var(--white);
    }

    .stat-card:nth-child(2) .stat-icon {
        background: linear-gradient(135deg, var(--secondary), #ffd700);
        color: var(--primary);
    }

    .stat-card:nth-child(3) .stat-icon {
        background: linear-gradient(135deg, var(--accent), var(--primary));
        color: var(--white);
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #666;
        font-weight: 500;
    }

    /* Features Section */
    .features-section {
        margin-bottom: 3rem;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 3rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .feature-card {
        background: var(--white);
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 8px 30px var(--shadow);
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px var(--shadow);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2rem;
        color: var(--white);
    }

    .feature-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .feature-desc {
        color: #666;
        line-height: 1.6;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        padding: 4rem;
        border-radius: 20px;
        text-align: center;
        color: var(--white);
        margin-top: 3rem;
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .cta-subtitle {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-button {
        padding: 1rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .cta-button.primary {
        background: var(--white);
        color: var(--primary);
    }

    .cta-button.secondary {
        background: transparent;
        color: var(--white);
        border: 2px solid var(--white);
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .slide-content {
            padding: 2rem;
            max-width: 100%;
        }

        .slide-title {
            font-size: 2rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card, .feature-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .stat-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .stat-card:nth-child(3) {
        animation-delay: 0.4s;
    }

    .feature-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .feature-card:nth-child(3) {
        animation-delay: 0.4s;
    }
</style>
@endpush

@push('scripts')
<script>
    // Carousel functionality
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
    }

    function currentSlide(index) {
        currentSlideIndex = index - 1;
        showSlide(currentSlideIndex);
    }

    function nextSlide() {
        currentSlideIndex = (currentSlideIndex + 1) % slides.length;
        showSlide(currentSlideIndex);
    }

    // Auto-advance carousel
    setInterval(nextSlide, 5000);

    // Add scroll effect to cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.stat-card, .feature-card').forEach(card => {
        observer.observe(card);
    });
</script>
@endpush