@include('layouts.frontend.header')
<div class="hero-wrap ftco-degree-bg" style="background-image: url('/frontend/images/20.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
        <div class="col-lg-8 ftco-animate">
            <div class="text w-100 text-center mb-md-5 pb-md-5">
              <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
              <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
             
                  <div class="icon d-flex align-items-center justify-content-center">
                    <div class="heading-title ml-5">
                      <span>Easy steps for renting a car</span>
                  </div>
          
                  </div>
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>

   <section class="ftco-section ftco-no-pt bg-light" ">
      <div class="container">
          <div class="row no-gutters">
            
              <div class="col-md-12	featured-top">
                  <div class="row no-gutters">
                    {{-- <div class="col-md-3 d-flex align-items-center">
                    </div> --}}
                        <div class="col-md-12 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100" style="box-shadow:lightgreen 1px 1px 1px;">
                              <div class="row">
                                <div class="col-md-12">
                              <form action="/search"  method="post">
                                {{ csrf_field() }}
        
                                <h2>Search your Car here!</h2>
                                
                                <div class="form-group">
                                  <label for="" class="label"></label>
                                  <input type="text" class="form-control" placeholder="Search Car Name here" name="q">
                                <br>
                                
                                  <button type="submit" class="btn btn-secondary py-3 px-4" style="float:right;">Search</button>
                                </div>
                                
                              </form>
                                </div>
                            </div>
                         </div>
                       
                            </div>
                        </div>
                    </div>
              </div>
        </div>
  </section>

  
  <section class="ftco-section ftco-no-pt bg-light">
    
      <div class="container">
          <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">What we offer</span>
          <h2 class="mb-2">Feeatured Vehicles</h2>
        </div>
      </div>
      <div class="row">
      @foreach($objs as $obj)
    
                

    

              <div class="col-md-4" style="margin-top:50px;">
                      
                        
                    <div class="item">
                          
                        <div class="car-wrap rounded ftco-animate">
                              <img class="img rounded d-flex align-items-end" src="{{ $obj->image }}">
                                
                            </div>
                              <div class="text">
                              <h2 class="mb-0"><a href="#" style="color:black;">{{$obj->cartype_name}}</a></h2>
                                  <div class="d-flex mb-3">
                                      <span class="cat">{{$obj->brand_name}}</span>
                                      <p class="price ml-auto">{{$obj->price}} <span>/day</span></p>
                                  </div>
                                  <p class="d-flex mb-0 d-block"><a href='/frontend/car/edit/{{ $obj->id }}' class="btn btn-secondary py-2 ml-1">Details</a></p>
                              </div>
                          </div>
                                   
              </div>             
              
                      
                  
                  
          
          @endforeach
      </div>
      </div>
    
            
  </section>


  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Blog</span>
          <h2>Recent Blog</h2>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
            <a href="blog-single.html" class="block-20" style="background-image: url('/frontend/images/image_1.jpg');">
            </a>
            <div class="text pt-4">
                <div class="meta mb-3">
                <div><a href="#">Oct. 29, 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
              <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
            <a href="blog-single.html" class="block-20" style="background-image: url('/frontend/images/image_2.jpg');">
            </a>
            <div class="text pt-4">
                <div class="meta mb-3">
                <div><a href="#">Oct. 29, 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
              <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry">
            <a href="blog-single.html" class="block-20" style="background-image: url('/frontend/images/image_3.jpg');">
            </a>
            <div class="text pt-4">
                <div class="meta mb-3">
                <div><a href="#">Oct. 29, 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
              <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>	

  <section class="ftco-counter ftco-section img bg-light" id="section-counter">
          <div class="overlay"></div>
      <div class="container">
          <div class="row">
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="60">0</strong>
              <span>Year <br>Experienced</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="{{$car_count}}">0</strong>
              <span>Total <br>Cars</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="{{$user_count}}">0</strong>
              <span>Happy <br>Customers</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text d-flex align-items-center">
              <strong class="number" data-number="{{$feed_count}}">0</strong>
              <span>Total <br>Recommend Feedback</span>
            </div>
          </div>
        </div>
      </div>
      </div>
  </section>	
  @include('layouts.frontend.footer')