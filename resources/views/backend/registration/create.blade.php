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
        <th style="text-align:center;">Status</th>
        <th style="text-align:center;">Registered-at</th>
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
                            <td style="text-align:center;">                            
                                @if($registration->status == 1)
                                    <b> <i class="tim-icons icon-alert-circle-exc"></i><p class="text-info">Pending</p></b>
                                @elseif($registration->status == 2)
                                    <b> <i class="tim-icons icon-check-2"></i><p class="text-success">Confirmed</p></b>
                                @elseif($registration->status == 3)
                                    <b><span class="ion-ios-checkmark"></span><p class="text-warning">Returned</p></b>
                                @else
                                <b> <i class="tim-icons icon-simple-remove"></i><p class="text-danger">Denied</p></b>
                                @endif
                              
                          </td>
                          <td style="text-align:center;">{{ $registration->created_at }}</td>
                         @if($registration->status == 1)
                         
                        
                          <td style="text-align:center;">
                                <a class="btn btn-info" href='/backend/registration/{{ $registration->id }}/edit'>Choose Status</a>
                         
                                {{-- <form action="/backend/registration/{{ isset($registration)? $registration->id:0 }}" method="post"  enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="_token" value=""> -->
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                                <button type="submit" class="btn btn-primary" name="status" value="2">Confirm</button>
                                    
                                </td>
                                <td style="text-align:center;">
                                    
                                    <button type="submit" class="btn btn-danger" name="status" value="0">Deny</button>
                                </form> --}}
                            </td>
                            @else   
                            @endif            
                        </tr>
                        @endforeach
  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div></div>

                            

@include('layouts.partial.footer')
                   

