@include('layouts.partial.header')



                {{-- <!-- div class=row one start -->
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
                <h4 class="card-title"> Role List</h4>
              </div>
              <div class="col-md-12">
                    <a href="/backend/role/create" class="form-control btn btn-info" type="button" id="btn_new" name="btn_new"> <i class="tim-icons icon-simple-add">New Role</i></a>
                </div>
                
              <div class="card-body">
            
                <div class="table-responsive">
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>

                        <th style="text-align:center;">Role-Name</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Created_at</th>
                        <th style="text-align:center;">Updated_at</th>
                        <th style="text-align:center;">Action</th>
                        <th style="text-align:center;">Action</th>
                      </tr>
                                </thead>
                                <tbody>

                                    @foreach ($objs as $obj)
                                    <tr>
                                        <td  style="text-align:center;">{{ $obj->name }}</td>
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
            
                                        <td style="text-align:center;"><a class="btn btn-info" onclick="return myFunction();" href='/backend/role/{{ $obj->id }}/edit'> <i class="tim-icons icon-pencil"></i> Edit</a></td>
                                        <td style="text-align:center;">
                                            <form action="{{ url('/backend/role', ['id' => $obj->id]) }}" method="post">
                                                <button type="submit" onclick="return myFunction1();"  class="btn btn btn-danger"> <i class="tim-icons icon-trash-simple"></i> Delete</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="delete" />
                                            </form>
                                        </td>
                                   
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
                                   