@include('layouts.frontend.header')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/frontend/images/25.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Feedback</h1>
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
                      <p class="text-success">{{session('success')}}</p>
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
@if(Auth::check())
  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12">
        
    <form action="/feedback/store" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    
            <div class="form-group">
                <select class="form-control" name="car_id" id="car_id">
                                        
                    {{-- dynamic looping--}} 
                    @foreach($cars as $car)
                        <option value="{{$car->id}}">{{$car->name}}</option>
                    @endforeach
                </select>
             
            </div>
            
            <div class="form-group">
              <label>Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" onclick="return myFunction();" value="Send Feedback" class="btn btn-info py-3 px-5">
            </div>
          </form>
        
        </div>
      </div>
       </div>
  </div>
</section>
@endif
<script>
    function myFunction() {
    if(!confirm("Are You Sure to do this ?"))
    event.preventDefault();
    }
    </script>
    

@include('layouts.frontend.footer')