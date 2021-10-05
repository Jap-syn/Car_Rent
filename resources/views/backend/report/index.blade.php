
@include('layouts.partial.header')
@if (count($errors) > 0)
<div class="content mt-3"><!-- div class=row content start -->
    <div class="animated fadeIn"><!-- div class=FadeIn start -->
        <div class="card"><!-- card start -->
    
            <div class="card-body">  <!-- card-body start -->

                
                    <div class="row"><!-- div class=row One start -->
                        @foreach ($errors->all() as $error)
                            <div class="col-md-12"><!-- div class=col 12 One start -->
                                <p class="text-danger">* {{ $error }}</p> 
                            </div><!-- div class=col 12 One end -->
                        @endforeach
                    </div><!-- div class=row One end -->
                

            </div> <!-- card-body end -->

        </div><!-- card end -->
    </div><!-- div class=FadeIn start -->
</div><!-- div class=row content end -->
@endif

<div class="content mt-3">
    <div class="animated fadeIn">

        
            <div class="card"><!-- .card start -->
                <div class="card-header">
                    <div class="col-md-12">
                        <strong class="card-title">Registartion Report</strong>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row"><!-- .row start -->
                        <div class="col-md-6">
                            Status </br>
                            <select class="form-control" name="car_id" id="car_id">
                                <option value="0" style="color:black;">All Car</option>
                                @foreach($cars as $car)
                                <option value="{{$car->id}}" style="color:black;">{{$car->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <br>
                            <button type="button" class="form-control btn btn-primary" onclick="report_search_with_type();">Preview By List</button>

                        </div>
                        <div class="col-md-3">
                            <br>
                            <button type="button" class="form-control btn btn-info" onclick="report_pdf_preview_with_type();">Preview with PDF</button>
                        </div>

                      
                    </div><!-- .row end -->

                    <div class="row"><!-- .row start -->
                        <div class="col-md-6">
                            
                        </div>

                        <div class="col-md-3">
                            <br>
                            <button type="button" class="form-control btn btn-success" onclick="report_export_with_type();">Export Excel</button>

                        </div>
                        <div class="col-md-3">
                            <br>
                            <button type="button" class="form-control btn btn-danger" onclick="report_pdf_export_with_type();">Export Pdf</button>
                        </div>

                       
                    </div><!-- .row end -->

                </div><!-- .card-body end -->
            </div><!-- .card end -->



            <div class="card"><!-- .card start -->
                <div class="card-header">
                    <div class="col-md-12">
                        <strong class="card-title">Result</strong>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row"><!-- .row start -->

                        <?php
                        $totalAmount = 0;
                        ?>
                        <div class="col-md-12">
                                <table class="table tablesorter " id="" >
                                        <thead class=" text-primary">
                                    <tr>
                                        <th style="text-align:center;">User-Name</th>
                                        <th style="text-align:center;">Car-Name</th>
                                        <th style="text-align:center;">Start Date</th>
                                        <th style="text-align:center;">End Date</th>
                                        <th style="text-align:center;">1 Day Price</th>
                                        <th style="text-align:center;">Registered at</th>
                                        <th style="text-align:center;">Registration Price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($registrations as $registration)
                                    <tr>
                                        <td style="text-align:center;">{{ $registration->user_name }}</td>
                                        <td style="text-align:center;">{{ $registration->car_name }}</td>
                                        <td style="text-align:center;">{{ $registration->start_date }}</td>
                                        <td style="text-align:center;">{{ $registration->end_date }}</td>
                                        <td style="text-align:center;">{{ $registration->price }}</td>
                                        <td style="text-align:center;">{{ $registration->created_at }}</td>
                                        <td style="text-align:center;" align="right">{{ $registration->total_amount }}</td>
                                    </tr>

                                    <?php $totalAmount += $registration->total_amount; ?>
                                    @endforeach

                                    <tr>
                                        <td style="text-align:center;" colspan="6"><b> Total Fee</b></td>
                                        <td style="text-align:center;" align="right">{{ $totalAmount }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div><!-- .row end -->

                </div><!-- .card end -->
            
            
        </div><!-- .animated -->
    </div>
    </div><!-- .content -->





<script>
    function report_search_with_type() {
        var type = $("#car_id").val();
        var form_action = "/backend/report/search/" + type;
        window.location = form_action;
    }

    function report_export_with_type() {
        var type = $("#car_id").val();
        var form_action = "/backend/report/exportexcel/" + type;
        window.location = form_action;
    }

    function report_pdf_export_with_type() {
        var type = $("#car_id").val();
        var form_action = "/backend/report/exportpdf/" + type;
        window.location = form_action;
    }

    function report_pdf_preview_with_type() {
        var type = $("#car_id").val();
        var form_action = "/backend/report/previewpdf/" + type;
        window.location = form_action;
    }
</script>
@include('layouts.partial.footer')
