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
            <h5 class="title">Cartype Edit</h5>
          </div>
          <div class="card-body">
                <form action="/backend/cartype/{{ isset($obj)? $obj->id:0 }}" method="post"  enctype="multipart/form-data">
                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}



                    <div class="row">
                            <div class="col-md-6 pr-md-1">
                              <div class="form-group">
                                <label>Cartype-Name</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($obj)? $obj->name:Request::old('name') }}">   
                              
                            </div>
                            </div>
                            <div class="col-md-6 px-md-1">
                              <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                        <?php
                                        if(isset($obj)){
                                        ?>
            
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="1" <?php if ($obj->status == 1){ echo 'selected'; } ?>style="color:black;" >Active</option>
                                            <option value="0" <?php if ($obj->status == 0){ echo 'selected'; } ?>style="color:black;" >In-Active</option>
            
                                        <?php
                                        }
                                        else{
                                        ?>
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="1"style="color:black;">Active</option>
                                            <option value="0"style="color:black;">Inactive</option>
                                        <?php 
                                        }
                                        ?>
                                </select>
                               
                              </div>
                            </div>
                         </div>
                        
                         
                         
       
       
           
       
                         <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-success"> <i class="tim-icons icon-upload"></i> Update</button>
                              </div>
            
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            
                     
            @include('layouts.partial.footer')
                         