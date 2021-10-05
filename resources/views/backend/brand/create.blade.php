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
            <h5 class="title">Brand Create</h5>
          </div>
          <div class="card-body">
                <form action="/backend/brand" method="post" enctype="multipart/form-data"> <form>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                    <div class="row">
                            <div class="col-md-6 pr-md-1">
                              <div class="form-group">
                                <label>Brand-Name</label>
                                <input type="text" name="name" class="form-control"  value="{{ old('name') }}" >   
                              
                            </div>
                            </div>
                            <div class="col-md-6 px-md-1">
                              <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" value="{{ old('status') }}" name="status" id="status">
                                        <option value="" selected disabled>Select Status</option>        
                                        <option value="1" style="color:black;">Active</option>
                                        <option value="0" style="color:black;">Inactive</option>
                                </select>
                                 
                              </div>
                            </div>
                         </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">  <i class="tim-icons icon-send"></i> Save</button>
                              </div>
            
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            
                     
            @include('layouts.partial.footer')
                         