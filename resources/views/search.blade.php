@include('layouts.frontend.header')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/frontend/images/Digital.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Search list</h1>
        </div>
      </div>
    </div>
  </section>

<section class="ftco-section ftco-no-pt bg-light">
<div class="container">
  @if(!isset($details))
    <p class="text-danger" style="padding-top:80px;"><b>Sorry, we have nothing to show about your search with our car name!</b></p>
    
    @elseif(isset($details))
    <p class="text-primary" style="padding-top:40px;"> The Search results for your query <b> {{ $query }} </b> are :</p>
    <div class="row">
    @foreach($details as $car)
    
        
      <div class="col-md-4" style="margin-top:50px;">
    <div class="item">
                        
      <div class="car-wrap rounded ftco-animate">
            <img class="img rounded d-flex align-items-end"  src="{{ $car->image }}">
              
          </div>
            <div class="text">
            <h2 class="mb-0"><a href="#" style="color:black;">{{$car->name}}</a></h2>
                <div class="d-flex mb-3">
                    <span class="cat">{{$car->car_no}}</span>
                    <p class="price ml-auto">{{$car->price}} <span>/day</span></p>
                </div>
                <p class="d-flex mb-0 d-block"><a href='/frontend/car/edit/{{ $car->id }}' class="btn btn-secondary py-2 ml-1">Details</a></p>
            </div>
        </div>
      </div>
        @endforeach   
            </div></div>  
        @endif

</div>
</section>
@include('layouts.frontend.footer')
