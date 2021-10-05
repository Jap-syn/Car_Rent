@if(Auth::user()->role_id == 1)
@include('layouts.partial.header')
<div class="content">
      
<div class="row">
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Car</h5>
         
        </div>
        <div class="card-body">
            <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-primary"></i>  {{ $car_count }}</h3> 
        </div>
      </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">User</h5>
           
          </div>
          <div class="card-body">
            <h3 class="card-title"><i class="tim-icons icon-single-02 text-info"></i>  {{ $user_counts }}</h3> 
          </div>
        </div>
      </div>
     <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Owner</h5>
        
        </div>
        <div class="card-body">
            <h3 class="card-title"><i class="tim-icons icon-single-02  text-warning"></i>  {{ $user_count }}</h3> 
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Pending Registration</h5>
         
        </div>
        <div class="card-body">
            <h3 class="card-title"><i class="tim-icons icon-alert-circle-exc text-primary"></i>  {{ $registration_count }}</h3> 
        </div>
      </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Confirm Registration</h5>
           
          </div>
          <div class="card-body">
            <h3 class="card-title"><i class="tim-icons icon-check-2 text-success"></i>  {{ $registration_counts }}</h3> 
          </div>
        </div>
      </div>
     <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Deny Registration</h5>
        
        </div>
        <div class="card-body">
            <h3 class="card-title"><i class="tim-icons icon-simple-remove  text-danger"></i>  {{ $registration_countss }}</h3> 
        </div>
      </div>
    </div>
  </div>



</div>
@include('layouts.partial.footer')
@else
@include('layouts.partial.header')
<div class="content">
  <div class="row">
    <div class="col-lg-3">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Car Count</h5>
         
        </div>
        <div class="card-body">
            <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-warning"></i>  {{ $car_counts }}</h3> 
        </div>
      </div>
    </div>
  <div class="col-lg-3">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category">Pending Registration</h5>
       
      </div>
      <div class="card-body">
          <h3 class="card-title"><i class="tim-icons icon-alert-circle-exc text-primary"></i>  {{ $registration_co }}</h3> 
      </div>
    </div>
  </div>
  <div class="col-lg-3">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Confirm Registration</h5>
         
        </div>
        <div class="card-body">
          <h3 class="card-title"><i class="tim-icons icon-check-2 text-success"></i>  {{ $registration_cos }}</h3> 
        </div>
      </div>
    </div>
   <div class="col-lg-3">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category">Deny Registration</h5>
      
      </div>
      <div class="card-body">
          <h3 class="card-title"><i class="tim-icons icon-simple-remove  text-danger"></i>  {{ $registration_coss }}</h3> 
      </div>
    </div>
  </div>
</div>
</div>




@include('layouts.partial.footer')
@endif