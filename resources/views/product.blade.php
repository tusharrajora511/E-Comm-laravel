@extends('master')
@section('content')

<div class="container-fluid px-0">
    {{-- Hero Section with Carousel --}}
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($products as $index => $item)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="position-relative">
                    <img src="{{$item['gallery']}}" class="d-block w-100 hero-img" alt="{{$item['name']}}">
                    <div class="carousel-caption">
                        <div class="content-wrapper">
                            <h2 class="mb-2">{{$item['name']}}</h2>
                            <p class="mb-3">{{$item['description']}}</p>
                            <a href="detail/{{$item['id']}}" class="btn btn-primary btn-sm px-3 py-1 rounded-pill">
                                View Details <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    {{-- Featured Products Section --}}
    <section class="featured-products py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">
                <span class="border-bottom border-primary pb-2">Featured Products</span>
            </h2>
            <div class="row g-4">
                @foreach($products->take(4) as $item)
                <div class="col-md-3">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="card-img-wrapper position-relative overflow-hidden">
                            <img src="{{$item['gallery']}}" class="card-img-top product-img" alt="{{$item['name']}}">
                            <div class="card-img-overlay d-flex align-items-center justify-content-center">
                                <div class="product-overlay">
                                    <a href="detail/{{$item['id']}}" class="btn btn-primary rounded-pill px-4">
                                        Quick View
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2">{{$item['name']}}</h5>
                            <p class="card-text text-muted small">{{Str::limit($item['description'], 50)}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Trending Products Section --}}
    <section class="trending-products py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">
                <span class="border-bottom border-primary pb-2">Trending Now</span>
            </h2>
            <div class="row g-4">
                @foreach($products as $item)
                <div class="col-md-3">
                    <div class="card trending-card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="{{$item['gallery']}}" class="card-img-top trending-img" alt="{{$item['name']}}">
                            <div class="trending-badge position-absolute top-0 end-0 m-3">
                                <span class="badge bg-danger rounded-pill">Hot</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{$item['name']}}</h5>
                            <p class="card-text text-muted small">{{Str::limit($item['description'], 50)}}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="detail/{{$item['id']}}" class="btn btn-outline-primary rounded-pill">
                                    View Details
                                </a>
                                <button class="btn btn-primary rounded-circle">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<style>
.hero-img {
    height: 80vh;
    object-fit: contain;
    max-width: 100%;
    width: auto;
    margin: 0 auto;
    display: block;
}

.carousel-item {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.carousel-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(0, 0, 0, 0.02) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(0, 0, 0, 0.02) 0%, transparent 50%);
    pointer-events: none;
}

.carousel-item::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        linear-gradient(45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%),
        linear-gradient(-45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: 60px 60px;
    pointer-events: none;
}

.carousel-item img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    position: relative;
    z-index: 1;
}

.carousel-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 0;
    margin-bottom: 0;
    z-index: 2;
}

.content-wrapper {
    background: linear-gradient(to top, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
    padding: 1rem 2rem;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    backdrop-filter: blur(5px);
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.05);
}

.carousel-caption h2 {
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
    color: #333;
    text-shadow: none;
}

.carousel-caption p {
    font-size: 1rem;
    margin-bottom: 0.75rem;
    color: #666;
    text-shadow: none;
}

.carousel-caption .btn {
    font-size: 0.9rem;
    padding: 0.5rem 1.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    background: #007bff;
    border: none;
}

.carousel-caption .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 3px 10px rgba(0, 123, 255, 0.2);
    background: #0056b3;
}

.product-card {
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-10px);
}

.product-img {
    height: 250px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.product-card:hover .product-img {
    transform: scale(1.1);
}

.product-overlay {
    opacity: 0;
    transition: opacity 0.3s ease;
    background: rgba(0, 0, 0, 0.5);
    width: 100%;
    height: 100%;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.trending-card {
    transition: all 0.3s ease;
}

.trending-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.trending-img {
    height: 200px;
    object-fit: cover;
}

.section-title {
    font-weight: 600;
    color: #333;
}

@media (max-width: 768px) {
    .carousel-caption h2 {
        font-size: 1.4rem;
    }
    
    .carousel-caption p {
        font-size: 0.9rem;
    }
    
    .content-wrapper {
        padding: 0.75rem 1.5rem;
    }
    
    .hero-img {
        height: 50vh;
    }
    
    .product-img, .trending-img {
        height: 180px;
    }
}
</style>

@endsection
