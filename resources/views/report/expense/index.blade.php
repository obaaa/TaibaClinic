<link rel="stylesheet" href="{{ asset("css/report.css") }}" />
<header class="clearfix">
  {{-- <div id="logo"> --}}
     {{-- <h1>Taiba-Clinic</h1> --}}
     <img style="margin: auto; display: block;" height="100px" width="250px" src="{{asset('assets/img/logo.png')}}" alt="{{ config('app.name', 'Laravel') }}">
  {{-- </div> --}}

      <h1>REPORT EXPENSES :   [ {{$from_date}} ] to [ {{$to_date}} ]</h1>
    <main>


      <table class="table table-bordered">
        <thead>
          <tr>
           <th class="">name</th>
           <th class="">category</th>
           <th class="">description</th>
           <th class="">date</th>
           <th class="">price / SDG</th>
          </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @foreach($expenses as $expense)
              <tr>
                <td>{{$expense->expense_name}}</td>
                <td>{{$expense->expense_category}}</td>
                <td>{{$expense->expense_description}}</td>
                <td>{{$expense->expense_date}}</td>
                <td>{{$expense->expense_price}}</td><?php $total = $total +  $expense->expense_price ?>

              </tr>
            @endforeach
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
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
