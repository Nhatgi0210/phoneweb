@extends('layouts.app')
@section('main_content')
    @include('layouts.slide')

    {{-- news --}}
    <section id="billboard" class=" py-5">
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="section-title text-center mt-4" data-aos="fade-up">Top 2 con chip mạnh nhất trong năm 2024</h1>
        <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
          <p>Trong thế giới công nghệ ngày nay, hiệu suất của thiết bị phụ thuộc nhiều vào bộ vi xử lý. Dưới đây là ba con chip
             mạnh nhất hiện nay, nổi bật với khả năng xử 
            lý vượt trội và tiết kiệm năng lượng, giúp nâng cao trải nghiệm người dùng và đáp ứng các yêu cầu ứng dụng khắt khe.</p>
        </div>
      </div>
      <div class="row">
        <div class="swiper main-swiper py-4" data-aos="fade-up" data-aos-delay="600"style="text-align: center;">
          <div class="swiper-wrapper d-flex border-animation-left">
            <div class="swiper-slide col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="banner-item image-zoom-effect">
                  <div class="image-holder">
                    <a href="#">
                      <img src="{{ asset('frontend/img/a18pro.png') }}" alt="product" class="img-fluid" style="height: 300px;width: 300px;">
                    </a>
                  </div>
                  <div class="banner-content py-4">
                    <h5 class="element-title text-uppercase">
                      <a href="index.html" class="item-anchor" style="color: rgb(146, 126, 103);">Apple A18 Pro</a>
                    </h5>
                    <p style="color: rgb(146, 126, 103);">A18 Pro sở hữu GPU 6 lõi mạnh mẽ, A18 được trang bị GPU 5 lõi và con chip mạnh mẽ mới nhất từ nhà apple được trang bị trên dòng iPhonr 16 Pro và 16 Pro Max</p>
                    <div class="btn-left">
                      <a href="#" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Tìm hiểu thêm</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div style="border-left: 1px solid #ccc; height: 300px; margin: 0 15px;"></div>
              
              <div class="swiper-slide col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="banner-item image-zoom-effect">
                  <div class="image-holder">
                    <a href="#">
                      <img src="{{ asset('frontend/img/snapsragon8gen3.png') }}" alt="product" class="img-fluid" style="height: 300px;width: 300px;">
                    </a>
                  </div>
                  <div class="banner-content py-4">
                    <h5 class="element-title text-uppercase">
                      <a href="index.html" class="item-anchor" style="color: rgb(14, 89, 195);">Snapdragon 8 gen 3</a>
                    </h5>
                    <p style="color: rgb(14, 89, 195);">Snapdragon 8 Gen 3 là chipset di động cao cấp mới nhất của Qualcomm, kế nhiệm của SoC Snapdragon 8 Gen 2.</p>
                    <div class="btn-left">
                      <a href="#" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Tìm hiểu thêm</a>
                    </div>
                  </div>
                </div>
              </div>
      </div>
    </div>
    </section>
    {{-- hot product --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp " data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Các mẫu điện thoại hot trong năm </h1>
                    
                    </div>
                </div>
                
                
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($hotProducts as $product)
                        
                        
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp product" data-wow-delay="0.3s">
                            <div class="product-item">
                              <div class="position-relative bg-light overflow-hidden" style="width: 300px; height: 200px;"> <!-- Thiết lập khung cố định -->
                                <img class="img-fluid" src="{{ asset('storage/' .$product->main_image_path) }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain; display: block; margin: auto;">
                              </div>
                            
                            
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    <span class="text-primary me-1 formatted-number">{{ $product->discount_price }}</span>
                                    <span class="text-body text-decoration-line-through formatted-number">{{ $product->original_price }}</span>
                                </div>
                                 <div style="text-align: center">
                                {{-- <b>Màn hình: </b>{{ $product->phoneConfig->man_hinh  }}<br>
                                <b>Chip:</b> {{ $product->phoneConfig->chip }} <br>
                                <b>Pin:</b>  {{ $product->phoneConfig->pin }}  --}}
                                 </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                      
                                        <a class="text-body" href="{{ route('product.show', ['id' => $product->id]) }}"><i class="fa fa-eye text-primary me-2"></i>View detail </a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                      <span class="text-body" href="">
                                        <i class="fa fa-shopping-cart text-primary me-2"></i>
                                        <button class="submit-btn add-to-cart" data-product-id="{{ $product->id }}" data-user-id="{{ auth()->user()->id??'0' }}">Add to cart </button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                      </span>
                                      
                                    </small>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                        
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- cheap product --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Các mẫu điện thoại giá rẻ </h1>
                    
                    </div>
                </div>
                
                
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($cheapProducts as $product)
                        
                        
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="product-item">
                              {{--  --}}
                             
                              {{--  --}}
                                <div class="position-relative bg-light overflow-hidden" style="width: 300px; height: 200px;">
                                    <img class="img-fluid w-100" src="{{ asset('storage/' .$product->main_image_path) }}" alt=""style="max-width: 100%; max-height: 100%; object-fit: contain; display: block; margin: auto;">
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    <span class="text-primary me-1 formatted-number">{{ $product->discount_price }}</span>
                                    <span class="text-body text-decoration-line-through formatted-number">{{ $product->original_price }}</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{ route('product.show', ['id' => $product->id]) }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                      <span class="text-body" href="">
                                        <i class="fa fa-shopping-bag text-primary me-2"></i>
                                        <button class="submit-btn add-to-cart" data-product-id="{{ $product->id }}" data-user-id="{{ auth()->user()->id??'0' }}">Add to cart</button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                      </span>
                                      
                                    </small>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                        
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection