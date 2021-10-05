@include('layouts.partial.header')

<!-- Main content -->
<div class="content">
<div class="row">
  @if (session('success'))
  <div class="flash-message col-md-12">
      <div class="alert alert-success ">
          {{session('success')}}
      </div>
  </div>
  @elseif(session('fail'))
  <div class="flash-message col-md-12">
      <div class="alert alert-danger">
          {{session('fail')}}
      </div>
  </div>
  
  @endif

<div class="col-md-12">
<div class="card ">
<div class="card-header">
<h4 class="card-title"> Registered List</h4>
</div>

<div class="card-body">

<div class="table-responsive">
  <table class="table tablesorter " id="" >
    <thead class=" text-primary">
      <tr>

        <th style="text-align:center;">User-Name</th>
        <th style="text-align:center;">Car-Name</th>
        <th style="text-align:center;">Price</th>
        <th style="text-align:center;">Car-No</th>
        <th style="text-align:center;">Start-Date</th>
        <th style="text-align:center;">End-Date</th>
        <th style="text-align:center;">Total-Amount</th>
        <th style="text-align:center;">Payment</th>
        <th style="text-align:center;">Registered-at</th>
        <th style="text-align:center;">Action</th>
        <th style="text-align:center;">Action</th>
      </tr>
                </thead>
                <tbody>

                        @foreach ($registrations as $registration)
                        <tr>
                            <td style="text-align:center;">{{ $registration->user_name }}</td>
                            <td style="text-align:center;">{{ $registration->car_name }}</td>
                            <td style="text-align:center;">{{ $registration->price }}</td>
                            <td style="text-align:center;">{{ $registration->car_no }}</td>
                            <td style="text-align:center;">{{ $registration->start_date }}</td>
                            <td style="text-align:center;">{{ $registration->end_date }}</td>
                            <td style="text-align:center;">{{ $registration->total_amount }}</td>
                            <td style="text-align:center;">                            
                             
                              <b><span class="tim-icons icon-money-coins"></span><p class="text-success">Cash Down</p></b>
                             
                            </td>
                          <td style="text-align:center;">{{ $registration->created_at }}</td>
                          <td>
                                <form action="/backend/registration/{{ isset($registration)? $registration->id:0 }}" method="post"  enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    <button type="submit" value="2" name="status"  class="btn btn-fill btn-success" onclick="return myFunction();"><i class="tim-icons icon-check-2"></i> Confirm</button>

                                </td>
                                <td>
                          
                                <button type="submit" value="0" name="status" class="btn btn-fill btn-danger" onclick="return myFunction1();"><i class="tim-icons icon-simple-remove"></i> Deny</button>
                          </form>
                          </td>
                        </tr>
                        @endforeach
  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


</div></div> 
<script>
  function myFunction() {
      if(!confirm("Are You Sure to confirm this ?"))
      event.preventDefault();
  }
  
  function myFunction1() {
      if(!confirm("Are You Sure to deny this ?"))
      event.preventDefault();
  }
  </script>                            


@include('layouts.partial.footer')
                   

