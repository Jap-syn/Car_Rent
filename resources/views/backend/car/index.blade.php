@include('layouts.partial.header')



                <!-- div class=row one start -->
                {{-- @if (session('success'))
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
                @endif --}}

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
                <h4 class="card-title"> Car List</h4>
              </div>
              <div class="col-md-12">
                    <a href="/backend/car/create" class="form-control btn btn-info" type="button" id="btn_new" name="btn_new"> <i class="tim-icons icon-simple-add">New Car</i></a>
                </div>
                
              <div class="card-body">
            
                <div class="table-responsive">
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>

                        <th style="text-align:center;">Owner-Name</th>
                        <th style="text-align:center;">Model</th>
                        <th style="text-align:center;">Brand</th>
                        <th style="text-align:center;">Cartype</th>
                        <th style="text-align:center;">Color</th>
                        <th style="text-align:center;">Wheels</th>
                        <th style="text-align:center;">Doors</th>
                        <th style="text-align:center;">Mile_List</th>
                        <th style="text-align:center;">Year</th>
                        <th style="text-align:center;">Seat</th>
                        <th style="text-align:center;">Transmission</th>
                        <th style="text-align:center;">Fuel</th>
                        <th style="text-align:center;">Grade</th>
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Description</th>
                        <th style="text-align:center;">Car_no</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Created at</th>
                        <th style="text-align:center;">Updated at</th>
                        <th style="text-align:center;">Action</th>
                        @if(Auth::user()->role_id == 1)
                        <th style="text-align:center;">Action</th>                      
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        
                       @foreach ($objs as $obj)
                        <tr>
                            <td style="text-align:center;">{{ $obj->user_name }}</td>
                            <td style="text-align:center;">{{ $obj->name }}</td>
                            <td style="text-align:center;">{{ $obj->brand_name}}</td>
                            <td style="text-align:center;">{{ $obj->cartype_name }}</td>
                            <td style="text-align:center;">{{ $obj->color }}</td>
                            <td style="text-align:center;">{{ $obj->wheels }}</td>
                            <td style="text-align:center;">{{ $obj->doors }}</td>
                            <td style="text-align:center;">{{ $obj->mile_list }}</td>
                            <td style="text-align:center;">{{ $obj->model }}</td>
                            <td style="text-align:center;">{{ $obj->seat }}</td>
                            <td style="text-align:center;">{{ $obj->transmission }}</td>
                            <td style="text-align:center;">
                               
                                    @if($obj->fuel == 1)
                                    <p>Diesel</p>
                                    @else
                                    <p>Petrol</p>
                                    @endif
                                
                            </td>

                            <td style="text-align:center;">{{ $obj->grade }}</td>
                            <td style="text-align:center;">{{ $obj->price }}</td>
                            <td style="text-align:center;">{{ $obj->description }}</td>
                            <td style="text-align:center;">{{ $obj->car_no }}</td>
                            <td style="text-align:center;"><img src="{{ $obj->image }}" class="rounded" width="75" /></td>
                          

                            <td style="text-align:center;">
                                <b>
                                    @if($obj->status == 1)
                                    <p class="text-success">Active</p>
                                    @else
                                    <p class="text-danger">In-Active</p>
                                    @endif
                                </b>
                            </td>

                            <td style="text-align:center;">{{ $obj->created_at }}</td>
                            <td style="text-align:center;">{{ $obj->updated_at }}</td>

                            <td style="text-align:center;"><a class="btn btn-info" onclick="return myFunction();" href='/backend/car/{{ $obj->id }}/edit'> <i class="tim-icons icon-pencil"></i> Edit</a></td>
                            @if(Auth::user()->role_id == 1)
                            <td style="text-align:center;">
                                <form action="{{ url('/backend/car', ['id' => $obj->id]) }}" method="post">
                                    <button type="submit" onclick="return myFunction1();"  class="btn btn btn-danger" > <i class="tim-icons icon-trash-simple"></i> Delete</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete" />
                                </form>
                            </td>
                       
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
<script>
    function myFunction() {
        if(!confirm("Are You Sure to update this ?"))
        event.preventDefault();
    }
    
    function myFunction1() {
        if(!confirm("Are You Sure to delete this ?"))
        event.preventDefault();
    }
    </script>                            

@include('layouts.partial.footer')