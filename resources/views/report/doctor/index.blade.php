<link rel="stylesheet" href="{{ asset("css/report.css") }}" />
<header class="clearfix">
      {{-- <div id="logo"> --}}
         {{-- <h1>Taiba-Clinic</h1> --}}
         <img style="margin: auto; display: block;" height="100px" width="250px" src="{{asset('assets/img/logo.png')}}" alt="{{ config('app.name', 'Laravel') }}">
      {{-- </div> --}}

      <h1>{{App\User::find($doctor_id)->name}} : [ {{$from_date}} ] to [ {{$to_date}} ]</h1>
    <main>

      <table class="members_details">
        <thead>
          <tr>
            <th><b>pationt</b></th>
            <th><b>Date</b></th>
            <th><b>Day | Time</b></th>
            <th><b>price</b></th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0 ?>
          <?php $total_remaining = 0 ?>
          <?php $total_paid = 0 ?>
            @foreach($visits as $value)
            <tr>
              <td>
                {{App\Patient::find($value->patient_id)->patient_name}}
              </td>
              <td class="date">
                {{$value->visit_date}}
              </td>
              <td>
                <?php
                  $date_stamp = strtotime(date('Y-m-d', strtotime($value->visit_date)));
                  $stamp = date('l', $date_stamp);
                ?>
                {{$stamp}} | {{App\Divisions_time::find($value->divisions_time_id)->time}}
              </td>
              </td>
              <td>
                {{$value->visit_price}}
                <?php
                $total = $total + $value->visit_price;
                $x = $value->visit_price - $value->visit_paid;
                $total_remaining = $total_remaining + $x;
                $total_paid = $total_paid +$value->visit_paid;
                ?>
              </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="3" class="grand total">TOTAL</td>
              <td class="grand total">{{$total}}</td>
            </tr>
        </tbody>
      </table>
      <div id="notices"><h1></h1>
        xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[Taiba Center: www.obaaa.sd]xxxx
        <div class="notice"> .</div>
      </div>
    </main>
    <!-- <footer>
      xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[obaaa.sd]xxxx
    </footer> -->
