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
            <h5 class="title">Feedback Create</h5>
          </div>
          <div class="card-body">
                <form action="/backend/feedback" method="post" enctype="multipart/form-data"> <form>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                    <div class="row">
                            <div class="col-md-12 pr-md-1">
                              <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control"  value="{{ old('description') }}" >   
                              
                            </div>
                            </div>
                           
                         </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">  <i class="tim-icons icon-send"></i> Send </button>
                              </div>
            
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            
                     
@include('layouts.partial.footer')
                         