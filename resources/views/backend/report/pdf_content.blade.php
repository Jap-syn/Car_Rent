<div class="container">
        <h1>Registration list</h1>
        <table border="1" cellpadding="10" width="100%" style="margin-bottom: 100px;">
            <tr>
                <th width="14%">User Name</th>
                <th width="14%">Car Name</th>
                <th width="14%">Start Date</th>
                <th width="14%">End Date</th>
                <th width="14%">1 Day Price</th>
                <th width="14%">Registered At</th>
                <th width="14%">Registration Price</th>
            </tr>
            <?php 
            $total = 0;
            ?>
    
           @Foreach($registratons as $registraton)
                <tr>
                    <td>{{ $registraton->user_name }}</td>
                    <td>{{ $registraton->car_name }}</td>
                    <td>{{ $registraton->start_date }}</td>
                    <td>{{ $registraton->end_date }}</td>
                    <td>{{ $registraton->price }}</td>
                    <td>{{ $registraton->created_at }}</td>
                    <td align="right">{{ $registraton->total_amount }}</td>
    
                    <?php $total = $total + $registraton->total_amount; ?>
                </tr>
            @endForeach
    
            <tr>
                <td width="84%" colspan="6" align="center">Total</td>
                <td width="14%" align="right">{{ $total }}</td>
            </tr>
        </table>
    </div>