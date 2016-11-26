<link rel="stylesheet" href="{{ asset("css/report.css") }}" />
<header class="clearfix">
  {{-- <div id="logo"> --}}
     {{-- <h1>Taiba-Clinic</h1> --}}
     <img style="margin: auto; display: block;" height="100px" width="250px" src="{{asset('assets/img/logo.png')}}" alt="{{ config('app.name', 'Laravel') }}">
  {{-- </div> --}}

      <h1>medical report</h1>
    <main>
      <p> patient: {{$patient->patient_name}}</p>
      <p> doctor: {{App\User::find($visit->doctor_id)->name}} </p>
      <p> date: {{$visit->visit_date}} </p>
      <div style="margin: auto; margin-right: auto;">
        <blockquote><pre>{!!html_entity_decode($visit->medical_report)!!}</pre></blockquote>
      </div>
      <div id="notices"><h1></h1>
        xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[Taiba Center: www.obaaa.sd]xxxx
        <div class="notice">
      </div>
      </div>
    </main>
    <footer>
      xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[obaaa.sd]xxxx
    </footer>
