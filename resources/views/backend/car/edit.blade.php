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
            <h5 class="title">Car Edit</h5>
          </div>
          <div class="card-body">
                <form action="/backend/car/{{ isset($obj)? $obj->id:0 }}" method="post"  enctype="multipart/form-data">
                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}

                <div class="row">
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Model</label>
                          <input type="text" name="name" class="form-control" value="{{ isset($obj)? $obj->name:Request::old('name') }}">
                        </div>
                </div>
                <div class="col-md-4 pr-md-1">
                  <div class="form-group">
                    <label>Car Type</label>
                    <select class="form-control" name="cartype_id" id="cartype_id" readonly >
                            <!-- <option value="" selected disabled>Select Course Name</option> -->
                            {{-- dynamic looping--}} 
                            @foreach($objs_car_type as $car_type)
                            
                            @if($obj->cartype_id == $car_type->id)
                                <option selected>{{$car_type->name}}</option>
                            @endif

                        @endforeach
                    </select>
                    
                  </div>
                </div>
                <div class="col-md-4 px-md-1">
                  <div class="form-group">
                    <label>Brand</label>
                    <select class="form-control" name="brand_id" id="brand_id" readonly>
                                     
                            {{-- dynamic looping--}} 
                            
                            @foreach($objs_brand as $brand)
                        
                            @if($obj->brand_id == $brand->id)
                                <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                            @endif

                        @endforeach
                          
                          
                        </select>   
                 </div>
                </div>      
                </div>

                <div class="row">
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Color</label>
                          <input type="text" name="color" class="form-control" value="{{ isset($obj)? $obj->color:Request::old('color') }}">
                        </div>
                </div>
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Wheels</label>
                          <input type="text" name="wheels" class="form-control" value="{{ isset($obj)? $obj->wheels:Request::old('wheels') }}">
                        </div>
                </div>
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Doors</label>
                          <input type="text" name="doors" class="form-control" value="{{ isset($obj)? $obj->doors:Request::old('doors') }}">
                        </div>
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Mile_list</label>
                          <input type="text" name="mile_list" class="form-control" value="{{ isset($obj)? $obj->mile_list:Request::old('mile_list') }}">
                        </div>
                </div>
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Year</label>
                          <input type="text" name="model" class="form-control" value="{{ isset($obj)? $obj->model:Request::old('model') }}">
                        </div>
                </div>
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Seat</label>
                          <input type="text" name="seat" class="form-control" value="{{ isset($obj)? $obj->seat:Request::old('seat') }}">
                        </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Transmission</label>
                          <input type="text" name="transmission" class="form-control" value="{{ isset($obj)? $obj->transmission:Request::old('transmission') }}">
                        </div>
                </div>
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Fuel</label><br>
                          @isset($obj)
                          @if($obj->fuel == 1)
                          <input class=""  style="height:15px!important;width:15px!important;" type='radio' name='fuel' value="1" checked><label style="font-size:15px!important;">Diesel</label><br>
                          <input class=""  style="height:15px!important;width:15px!important;" type='radio' name='fuel' value="2"><label style="font-size:15px!important;">Petrol </label>
                          @else
                          <input class=""  style="height:15px!important;width:15px!important;" type='radio' name='fuel' value="1"><label style="font-size:15px!important;">Diesel</label><br>
                          <input class=""  style="height:15px!important;width:15px!important;" type='radio' name='fuel' value="2" checked><label style="font-size:15px!important;">Petrol </label>
                          @endif
                          @endisset
                          
                        </div>
                </div>
                <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                          <label>Grade</label>
                          <input type="text" name="grade" class="form-control" value="{{ isset($obj)? $obj->grade:Request::old('grade') }}">
                        </div>
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-4 pr-md-1">
                  <div class="form-group">
                    <label>Photo <i class="tim-icons icon-simple-add" style="padding-bottom:5px;"></i></label>
                    <input type="file" name="image" class="form-control" value="{{ isset($obj)? $obj->image:Request::old('image') }}">   
                    <p class="description">Plx Cick the upper word Photo for updating!</p>
                </div>
                </div>
                <div class="col-md-4 pl-md-1">
                    <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="{{ isset($obj)? $obj->price:Request::old('price') }}">
                </div>
                </div>
                <div class="col-md-4 pl-md-1">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status">
                            <?php
                            if(isset($obj)){
                            ?>

                                <option value="" selected disabled>Select Status</option>
                                <option value="1" <?php if ($obj->status == 1){ echo 'selected'; } ?> style="color:black;" >Active</option>
                                <option value="0" <?php if ($obj->status == 0){ echo 'selected'; } ?> style="color:black;" >In-Active</option>

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
            
             
              <div class="row">
                <div class="col-md-12 pr-md-1">
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" value="{{ isset($obj)? $obj->description:Request::old('description') }}" class="form-control" name="description" placeholder="Description" >
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
             