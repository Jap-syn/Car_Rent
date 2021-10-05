@include('layouts.frontend.header')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/frontend/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
              <h1 class="mb-3 bread">Car Details</h1>
            </div>
          </div>
        </div>
      </section>
          
 
           <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
			{{-- <form action="/frontend/car/" method="post"> --}}
                
                        <!-- <input type="hidden" name="_token" value=""> -->
                       
                <div class="col-md-12">
                    <div class="car-details">
                        <img class="img rounded" src="<?php echo $objs[0]->image; ?>"> 
                        <div class="text text-center">
                             <h2>
                            <ul style="list-style-type:none;">
                                    @foreach($objs_brand as $brand)
								
                                    @if($objs[0]->brand_id == $brand->id)
                                        <li selected>{{$brand->name}}</li>
                                    @endif
    
                                @endforeach
                            </ul>
                             </h2>
                             <h3>
                                    <ul style="list-style-type:none;">
                                        <li><?php echo $objs[0]->name; ?></li>
                                    </ul>
                             </h3>
                                      
                             
                            <span class="subheading">
                               
                                <ul style="list-style-type:none;">
                                    @foreach($objs_car_type as $car_type)
								
                                    @if($objs[0]->cartype_id == $car_type->id)
                                        <li style="font-size:17px;" selected>{{$car_type->name}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                                
                            </span>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Mileage
                        
                        <span><?php echo $objs[0]->mile_list; ?></span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Transmission
                              <span><?php echo $objs[0]->transmission; ?></span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Seats
                              <span><?php echo $objs[0]->seat; ?></span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              1 day Price
                              <span><?php echo $objs[0]->price; ?></span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Fuel
                              <span><?php if($obj[0]->fuel == 1){
                                    echo "<p>Diesel</p>";}
                                    else{
                                    echo "<p>Petrol</p>";}
                              ?></span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            </div> 
            <div class="row">
                <div class="col-md-12 pills">
                          <div class="bd-example bd-example-tabs">
                              <div class="d-flex justify-content-center">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  
                                  <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                  </li>
                                </ul>
                              </div>
  
                            <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <ul class="features">
                                              <li class="check"><span class="ion-ios-checkmark"></span>Color =><?php echo $objs[0]->color; ?></li>
                                              <li class="check"><span class="ion-ios-checkmark"></span>Wheels => <?php echo $objs[0]->wheels; ?></li>
                                              <li class="check"><span class="ion-ios-checkmark"></span>Doors => <?php echo $objs[0]->doors; ?></li>
                                              <li class="check"><span class="ion-ios-checkmark"></span>Car_NO => <?php echo $objs[0]->car_no; ?></li>
                                              <li class="check"><span class="ion-ios-checkmark"></span>Year => <?php echo $objs[0]->model; ?></li>
                                              <li class="check"><span class="ion-ios-checkmark"></span>Grade => <?php echo $objs[0]->grade; ?></li>
                                              @if($objs[0]->status==1)
                                              <li class="check"><span class="ion-ios-checkmark"></span>Status => Active</li>
                                              @else
                                              <li class="check"><span class="ion-ios-checkmark"></span>Status => In-Active</li>
                                              @endif
                                              <li class="check"><span class="ion-ios-checkmark"></span>Owner_Name => <?php echo $objs[0]->user_name; ?></li>
                                          </ul>
                                       
                                      </div>
                                  </div>
                              </div>
  
                            {{-- </form>   --}}
                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                    <p><?php echo $objs[0]->description; ?></p>
                                       
                                  </div>
      
                                  <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                    <div class="row">
                                    <div class="col-md-7">
                                    <h3 class="head">Total feedback::{{$feed_count}}</h3>
                                    </div>
                                    @if(Auth::check())
                                    <div class="col-md-5">
                                      <a class="btn btn-info" style="float:right;" type="button" href='/feedback/edit/{{ $objs[0]->id }}'>Give Feedback</a> 
                                    </div>
                                    </div>
                                    @else

                                    @endif
                                    <div class="row">
                                                 @foreach ($subs as $sub)
                                                 {{-- @foreach ($objs_user as $user)
                                                 @if($subs[0]->user_id == $user->id)    
                                                  --}}
                                                 <div class="review d-flex">
                                                 <img class="user-img" src="{{$sub->user_image}}">
                                                 
                                                    <div class="desc">
                                                        <h4>
                                                        <span class="text-left">{{$sub->user_name}}</span>
                                                        {{-- @endif
                                                        @endforeach --}}
                                                        <span class="text-right">{{$sub->created_at}}</span>
                                                        </h4>
                                                        <p class="star">
                                                            <span>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                            </span>
                                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                        </p>
                                                    <p>{{$sub->description}}</p>
                                                    </div>
                                                </div>
                                            
                                             @endforeach
                                        </div>     
                                         
                                  </div></div>
                            </div></div></div></div></div>
                              
                    
                    
            </div>
            </section>

            
          <div class="container">          
           
            <div class="form-group">                      
             <div class="row">
             <div class="col-md-4">
            @if(Auth::check())         
              <a class="btn btn-warning" style="width:180px;margin-left:38px;" type="button" href='/registration/edit/{{ $objs[0]->id }}'>Reserve</a> 
            @else
              <a class="btn btn-warning" style="width:180px;margin-left:38px;" onclick="return myFunction();" type="button" href="{{ route('login') }}">Reserve</a> 
           @endif
           </div>
             </div>
             </div>
          </div>
  <script>
    function myFunction() {
        if(!confirm("Dear Customer you dont have account login! Plx login or register account first before rent"))
        event.preventDefault();
    }
  </script>                                        
            
@include('layouts.frontend.footer')