@if(Auth::user()->role_id == 3)
@include('layouts.frontend.header')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/frontend/images/31.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">User Profile</h1>
        </div>
      </div>
    </div>
  </section>

<div class="container">
  <div class="row">
        <div class="col-md-12">
            
                

                @if (session('success'))
                <div class="flash-message col-md-12">
                    <div class="alert alert-success ">
                        {{session('success')}}
                    </div>
                </div>
                @endif
                
                <!-- Main content -->
                
                                
                
                        <table class='table' style="margin-top:20px;margin-bottom:20px;">
                
                                <thead class="thead">
                                    <tr>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Name</th> 
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Email</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Image</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Phone</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Address</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Gender</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Status</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Registered at</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Updated at</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                
                                    @foreach ($objs as $obj)
                                    <tr>
                                        <td style="text-align:center;">{{ $obj->name}}</td>
                                        <td style="text-align:center;">{{ $obj->email}}</td>
                                        <td style="text-align:center;"><img src="{{ $obj->image }}" class="rounded" width="50" /></td>
                                        
                                        <td style="text-align:center;">{{ $obj->phone }}</td>
                                        <td style="text-align:center;">{{ $obj->address }}</td>
                                        
                                        
                                        <td style="text-align:center;">
                                            <b>
                                                @if($obj->gender == 1)
                                                <p class="text-info">Male</p>
                                                @else
                                                <p class="text-primary">Female</p>
                                                @endif
                                            </b>
                                        </td>
                
                
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
                                        <td style="text-align:center;" >{{ $obj->updated_at }}</td>
                
                                        <td style="text-align:center;"><a class="btn btn-success" onclick="return myFunction();" href='/home/edit/{{ $obj->id }}'> Edit</a></td>
                                       
                                     
                
                                    </tr>
                                    @endforeach
                
                                </tbody>
                        </table>
                
                 
        </div>
    </div>
</div>
<script>
        function myFunction() {
            if(!confirm("Are You Sure to update this ?"))
            event.preventDefault();
        }
        
        //  function myFunction1() {
        //      if(!confirm("Are You Sure to delete this ?"))
        //      event.preventDefault();
        //  }
        //</script>
@include('layouts.frontend.footer')
@else
@include('layouts.partial.header')


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
                <h4 class="card-title"> User List</h4>
              </div>
              <div class="col-md-12">
                <a href="/backend/user/create" class="form-control btn btn-info" type="button" id="btn_new" name="btn_new"> <i class="tim-icons icon-simple-add">New User</i></a>
            </div>
        
              <div class="card-body">
            
                <div class="table-responsive">
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>

                            <th style="text-align:center;">Name</th> 
                            <th style="text-align:center;">Email</th>
                            <th style="text-align:center;">Image</th>
                            <th style="text-align:center;">Phone</th>
                            <th style="text-align:center;">Address</th>
                            <th style="text-align:center;">Gender</th>
                            <th style="text-align:center;">Status</th>
                            @if(Auth::user()->role_id==1)
                            <th style="text-align:center;">Role</th>
                            @endif
                            <th style="text-align:center;">Registered at</th>
                            <th style="text-align:center;">Updated at</th>
                            <th style="text-align:center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>  
                        @foreach ($objs as $obj)
                            <tr>
                                <td style="text-align:center;">{{ $obj->name}}</td>
                                <td style="text-align:center;">{{ $obj->email}}</td>
                                <td style="text-align:center;"><img src="{{ $obj->image }}" class="rounded" width="50" /></td>
                                
                                <td style="text-align:center;">{{ $obj->phone }}</td>
                                <td style="text-align:center;">{{ $obj->address }}</td>
                                
                                
                                <td style="text-align:center;">
                                    <b>
                                        @if($obj->gender == 1)
                                        <p class="text-info">Male</p>
                                        @else
                                        <p class="text-primary">Female</p>
                                        @endif
                                    </b>
                                </td>
        
        
                                <td style="text-align:center;">
                                    <b>
                                        @if($obj->status == 1)
                                        <p class="text-success">Active</p>
                                        @else
                                        <p class="text-danger">In-Active</p>
                                        @endif
                                    </b>
                                </td>
                                @if(Auth::user()->role_id==1)
                                <td style="text-align:center;">
                                    <b>
                                        @if($obj->role_id == 2)
                                        <p class="text-warning">Owner</p>
                                        @elseif($obj->role_id == 3)
                                        <p class="text-primary">User</p>
                                        @endif
                                    </b>
                                </td>
                                @endif
        
        
                                <td style="text-align:center;">{{ $obj->created_at }}</td>
                                <td style="text-align:center;" >{{ $obj->updated_at }}</td>
        
                                <td style="text-align:center;"><a class="btn btn-success" onclick="return myFunction();" href='/home/edit/{{ $obj->id }}'><i class="tim-icons icon-pencil"></i> Edit</a></td>
                               
                             
        
                            </tr>
                            @endforeach
        
                        </tbody>
                </table>                
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
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
@endif
