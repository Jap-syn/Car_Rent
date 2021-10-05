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
                            <h5 class="title">Car Create</h5>
                          </div>
                          <div class="card-body">
                            <form action="/backend/car" method="post" enctype="multipart/form-data"> <form>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="row">
                                <div class="col-md-6 pr-md-1">
                                  <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Car Name">
                                  </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                  <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" class="form-control" value="{{ old('color') }}" name="color" placeholder="Color">
                                  </div>
                                </div>
                           
                               
                              </div>
                              <div class="row">
                                <div class="col-md-6 pr-md-1">
                                  <div class="form-group">
                                    <label>Car Type</label>
                                    <select class="form-control"value="{{ old('cartype_id') }}" name="cartype_id" id="cartype_id">
                                        
                                        {{-- dynamic looping--}} 
                                        @foreach($cartypes as $cartype)
                                            <option value="{{$cartype->id}}" style="color:black;">{{$cartype->name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                  <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control" value="{{ old('brand_id') }}" name="brand_id" id="brand_id">
                                        
                                       {{-- dynamic looping--}} 
                                       @foreach($brands as $brand)
                                           <option value="{{$brand->id}}" style="color:black;">{{$brand->name}}</option>
                                       @endforeach
                                   </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 pr-md-1">
                                  <div class="form-group">
                                    <label>Wheels</label>
                                    <input type="text" class="form-control" value="{{ old('wheels') }}" name="wheels" placeholder="4 or6 etc...">
                                  </div>
                                </div>
                                <div class="col-md-4 px-md-1">
                                  <div class="form-group">
                                    <label>Doors</label>
                                    <input type="text" class="form-control" value="{{ old('doors') }}" name="doors" placeholder="1 or 2 etc...">
                                  </div>
                                </div>
                                <div class="col-md-4 pl-md-1">
                                  <div class="form-group">
                                    <label>Mile_list</label>
                                    <input type="text" class="form-control" value="{{ old('mile_list') }}" name="mile_list" placeholder="mile_list">
                                  </div>
                                </div>
                              </div>
                             
                              <div class="row">
                                <div class="col-md-4 pr-md-1">
                                  <div class="form-group">
                                    <label>Car NO</label>
                                    <input type="text" value="{{ old('car_no') }}" name="car_no" class="form-control" placeholder="1A/...." >
                                  </div>
                                </div>
                                <div class="col-md-4 px-md-1">
                                  <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" name="model" value="{{ old('model') }}" class="form-control" placeholder="Model">
                                  </div>
                                </div>
                                <div class="col-md-4 pl-md-1">
                                  <div class="form-group">
                                    <label>Seat</label>
                                    <input type="text" name="seat" value="{{ old('seat') }}" class="form-control" placeholder="3 or 4 etc...">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 pr-md-1">
                                  <div class="form-group">
                                    <label>Transmission</label>
                                    <input type="text" name="transmission" value="{{ old('transmission') }}" class="form-control" placeholder="Auto or Manual" >
                                  </div>
                                </div>
                                <div class="col-md-4 px-md-1">
                                  <div class="form-group">
                                    <label>Fuel</label><br>
                                    <input class=""  style="height:15px!important;width:15px!important;" type='radio' name='fuel' value="1"><label style="font-size:15px!important;">Diesel</label><br>
                                    <input class=""  style="height:15px!important;width:15px!important;" type='radio' name='fuel' value="2"><label style="font-size:15px!important;">Petrol </label>
                                  </div>
                                </div>
                                <div class="col-md-4 pl-md-1">
                                  <div class="form-group">
                                    <label>Grade</label>
                                    <input type="text" name="grade" value="{{ old('grade') }}" class="form-control" placeholder="GL or SE or SL etc...">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                               <div class="col-md-4 pr-md-1">
                                  <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" value="{{ old('price') }}" name="price" class="form-control" placeholder="Price">
                                  </div>
                                </div>
                                <div class="col-md-4 px-md-1">
                                  <div class="form-group">
                                    <label>Photo <i class="tim-icons icon-simple-add" style="padding-bottom:5px;"></i></label>
                                    <input type="file" class="form-control" value="{{ old('image') }}"  name="image" placeholder="click photo" >
                                    <p class="description">Plx Cick the word Photo for uploading!</p>
                                </div>
                                </div>
                                <div class="col-md-4 pl-md-1">
                                  <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" value="{{ old('status') }}" name="status" id="status">
                                                
                                        <option value="1" selected>Active</option>
                                        
                                </select>
                                  </div>
                                </div>
                                
                             </div>
                            
                             
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Description</label>
                                <textarea name="description" class="form-control" value="{{ old('description') }}" placeholder="Write about this car"></textarea>
                                   
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary"  onclick="return myFunction();"> <i class="tim-icons icon-send"></i> Save</button>
                                  </div>
            
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
    <script>
    function myFunction() {
        if(!confirm("Please check all data even speelling mistake again before your create!"))
        event.preventDefault();
    }
    </script>                            
                
                         
@include('layouts.partial.footer')