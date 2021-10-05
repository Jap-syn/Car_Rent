@include('layouts.partial.header')



                <!-- div class=row one start -->
               
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
                <h4 class="card-title"> Log List</h4>
              </div>
              
                
              <div class="card-body">
            
                <div class="table-responsive">
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>

                        <th style="text-align:center;">Log</th>
                        
                      </tr>
                                </thead>
                                <tbody>

                                    @foreach ($objs as $obj)
                                    <tr>
                                        <td  style="text-align:center;">

                                        @if($obj->status == 1)
                                        <p class="text-success">
                                        @elseif($obj->status == 2)
                                        <p class="text-info">
                                        @elseif($obj->status == 3)
                                        <p class="text-danger">
                                        @endif
                                        {{ $obj->log }}
                                    </p>
                                    
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
                    if(!confirm("Are You Sure to update this ?"))
                    event.preventDefault();
                }
                
                function myFunction1() {
                    if(!confirm("Are You Sure to delete this ?"))
                    event.preventDefault();
                }
                </script>                            
            
@include('layouts.partial.footer')
                                   