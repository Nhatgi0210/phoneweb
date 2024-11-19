@extends('layouts.app')
@section('main_content')
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: -130px; height: 550px;">
    <div class="container">
        <div style="margin-top: 20px"></div>
        <h1 class="display-3 mb-3 animated slideInDown">Products</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="{{url('/products/') }}">Products</a></li>
                @isset($brand)
                    <li class="breadcrumb-item text-dark active" aria-current="page">{{ $brand->name}}</li>
                @endisset
                @isset($category)
                    <li class="breadcrumb-item text-dark active" aria-current="page">{{ $category->name}}</li>
                @endisset
            </ol>
        </nav>
    </div>
</div>
    
    <?php $title = $brand->name ?? "Tất cả sản phẩm"; ?>


    {{-- hot product --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp " data-wow-delay="0.1s" style="max-width: 500px;">
                        @if($products->isEmpty())
                            <h1 class="display-5 mb-3">Không có sản phẩm nào</h1>
                        @else
                            <h1 class="display-5 mb-3">{{ $title }} </h1>
                        @endif
                    </div>
                </div>
                
                
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @if($products->isNotEmpty())
                        @foreach ($products as $product)
                        
                        
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp product" data-wow-delay="0.3s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/' .$product->main_image_path) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="{{ route('product.show',['id'=>$product->id ]) }}">{{ $product->name }}</a>
                                    <span class="text-primary me-1 formatted-number">{{ $product->discount_price }}</span>
                                    <span class="text-body text-decoration-line-through formatted-number">{{ $product->original_price }}</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                    @endif  
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- cheap product --}}
    
@endsection