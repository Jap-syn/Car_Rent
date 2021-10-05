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
                <h4 class="card-title">Feedback List</h4>
              </div>
              <div class="col-md-12">
                    
                </div>
                
              <div class="card-body">
            
                <div class="table-responsive">
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>

                        <th style="text-align:center;">Owner-Name</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Description</th>
                        <th style="text-align:center;">Created_at</th>
                        
                      </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subs as $sub)
                                    <tr>
                                        <td  style="text-align:center;">{{ $sub->user_name }}</td>
                                        <td style="text-align:center;"><img src="{{ $sub->user_image }}" class="rounded" width="50" /></td>

                                        <td style="text-align:center;">
                                            <b>
                                                @if($sub->status == 1)
                                                <p class="text-success">Active</p>
                                                @else
                                                <p class="text-danger">In-Active</p>
                                                @endif
                                            </b>
                                        </td>

                                        <td style="text-align:center;">{{ $sub->description }}</td>
                                        <td style="text-align:center;">{{ $sub->created_at }}</td>
            
                                      
                                   
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
@include('layouts.partial.footer')
                                   