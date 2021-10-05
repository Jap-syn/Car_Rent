@include('layouts.frontend.header')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/frontend/images/12.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Rental<i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Car Rent</h1>
        </div>
      </div>
    </div>
  </section>
<div class="container">
  <div class="content mt-3">
      <div class="animated fadeIn">
          <div class="row"><!-- div class=row one start -->
              @if (session('success'))
                  <div class="flash-message col-md-12">
                  <div class="alert alert-fail ">
                      <p class="text-danger">{{session('success')}}</p>
                  </div>
                  </div>
              @endif
          </div>
      </div>
  </div>
  
  @if (count($errors) > 0)
  <div class="content mt-3"><!-- div class=row content start -->
      <div class="animated fadeIn"><!-- div class=FadeIn start -->
          <div class="card"><!-- card start -->
      
              <div class="card-body">  <!-- card-body start -->
  
                  
                      <div class="row"><!-- div class=row One start -->
                          @foreach ($errors->all() as $error)
                              <div class="col-md-12"><!-- div class=col 12 One start -->
                                  <p class="text-danger">* {{ $error }}</p> 
                              </div><!-- div class=col 12 One end -->
                          @endforeach
                      </div><!-- div class=row One end -->
                  
  
              </div> <!-- card-body end -->
  
          </div><!-- card end -->
      </div><!-- div class=FadeIn start -->
  </div><!-- div class=row content end -->
  @endif
</div>
  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        
        <div class="col-md-12">
          <div class="card" style="box-shadow:2px 2px 2px 2px lightblue;">
            <br>  
    <form action="/registration/store" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      
            <div class="form-group">
            <div class="col-md-12">
            @foreach($car as $car)
            <h5><b>
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
            Car Name -->> <span style="color:blue;">{{$car->name}}</span>
            &nbsp;&nbsp;&nbsp;&nbsp;Car Price -->><span style="color:blue;"> $ {{$car->price}}</span>
            &nbsp;&nbsp;&nbsp;&nbsp;Car No -->><span style="color:blue;"> {{$car->car_no}}</span>
            </b></h5>
            <hr>
            <input type="hidden" name="car_id" value="{{$car->id}}">
            @endforeach
            </div>
            </div>
      
            
            
              
            <div class="form-group">
              <div class="col-md-6 offset-3">
              <label>Select your start date</label>
                <input type="date" name="start_date" class="form-control">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-md-6 offset-3">
                <label>Select your end date</label>
               <input type="date" name="end_date" class="form-control">
            </div>
            </div>
      

            <div class="form-group">
              <div class="col-md-10 offset-1">
              <select class="form-control" name="payment">
                  
                <option value="1">Cash Down</option>
  
              </select>
          </div>
      </div>
      
              <div class="form-group">
                <div class="col-md-7 offset-5">
              <input type="submit" onclick="return myFunction();" value="Rent" class="btn btn-warning py-3 px-5">
            </div>
              </div>

          </form>
        </div>
        </div>
        </div>
      </div>
       </div>
  
</section>

<script>
    function myFunction() {
    if(!confirm("Are You Sure to do this ?"))
    event.preventDefault();
    }
    </script>
    

@include('layouts.frontend.footer')