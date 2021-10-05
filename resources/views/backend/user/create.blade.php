@include('layouts.partial.header')  
              


<div class="content">
      
  <div class="row">
      
              <!-- div class=row one start -->
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


            @if (count($errors) > 0)
            <div class="content mt-3">
                <!-- div class=row content start -->
                <div class="animated fadeIn">
                    <!-- div class=FadeIn start -->
                    <div class="card">
                        <!-- card start -->
        
                        <div class="card-body">
                            <!-- card-body start -->
        
        
                            <div class="row">
                                <!-- div class=row One start -->
                                @foreach ($errors->all() as $error)
                                <div class="col-md-12">
                                    <!-- div class=col 12 One start -->
                                    <p class="text-danger">* {{ $error }}</p>
                                </div><!-- div class=col 12 One end -->
                                @endforeach
                            </div><!-- div class=row One end -->
        
        
                        </div> <!-- card-body end -->
        
                    </div><!-- card end -->
                </div><!-- div class=FadeIn start -->
            </div><!-- div class=row content end -->
            @endif
        
           
        <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">User Create</h5>
          </div>
         
          <div class="card-body">
            <form method="POST" action="/backend/user" style="margin-top:50px;">
                @csrf
                 <div class="row">
                <div class="col-md-4 pr-md-1">
                    <div class="form-group">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                  </div>
                </div>
                <div class="col-md-4 px-md-1">
                    <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            
                  </div>
                </div>
                <div class="col-md-4 pl-md-1">
                    <div class="form-group">
                        <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                            
                   
                          
                    </div>
            
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-md-1">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="col-md-6 pl-md-1">
                  <div class="form-group">
                    <label>Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 pr-md-1">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ old('address') }}" name="address" required autocomplete="address">
                  </div>
                </div>
                <div class="col-md-4 px-md-1">
                  <div class="form-group">
                    <label>Gender</label>
                    <p>Male<input class="form-control"  type='radio' name='gender' value="1{{ old('gender') }}"/></p>
                    <p>Female <input class="form-control" type='radio' name='gender' value="2{{ old('gender') }}"/></p>
                   
                  </div>
                </div>
                <div class="col-md-4 pl-md-1">
                  <div class="form-group">
                    <label>Role_list</label>
                    <select class="form-control" name="role_id" id="role_id">
                        <option value="" selected disabled >Select role</option>        
                        <option value="2 {{ old('role_id') }}" style="color:black;">Owner</option>
                        <option value="3 {{ old('role_id') }}" style="color:black;">User</option>
                    </select>
            
                  </div>
                </div>
              </div>
             
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                <select class="form-control" value="{{ old('status') }}" name="status" id="status">
                    <option value="" selected disabled>Select status</option>        
                <option value="1" style="color:black;">Active</option>
                    <option value="0" style="color:black;">In-Active</option>
                </select>
                  </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="form-group">
                      <label>Site Email</label>
                 <input type="email" class="form-control"  name="email_name" required>
                  </div>
                  
                  </div>
               --}}
              </div>
                
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
            
                  </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</div>

         
@include('layouts.partial.footer')