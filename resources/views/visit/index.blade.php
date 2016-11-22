  @extends('layouts.master')
  @section('content')
  @section('titel','visits')
  <div class="content">
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
      <div class="row">
        <div class="col-md-12 col-md-12">
          <div class="card">
            <div class="container">
              <div class="row">
              <div class="header">
                <h4 class="title">Visits</h4>
              </div>
              <div class="content">
                <div class="input-group col-md-12">
          		      <input type="search" class="light-table-filter" data-table="members_details" placeholder="Quick Filter">
                </div>
                <div class="text-center">
          		  <table class="members_details">
            			<thead>
            				<tr>
                      <th class="name text_align_center"><b>Name</b></th>
                      <th class="date text_align_center"><b>Date</b></th>
                      <th class="day text_align_center"><b>Day | Time</b></th>
            					<th class="doctor text_align_center"><b>Doctor</b></th>
            					<th class="value text_align_center"><b>value | pid </b></th>
                      <th class="status text_align_center"><b>Status</b></th>
                      <th class="delete text_align_center"><b>delete</b></th>
            				</tr>
            			</thead>
            			<tbody>
                  {{-- patient visits --}}
                  @foreach($visits as $value)
            			<tr>
                    <td class="name">
                      <a href="{{ url ('visit/'.$value->id) }}" class="" >{{App\Patient::find($value->patient_id)->patient_name}}</a>
                    </td>
                    <td class="date">
                      {{$value->visit_date}}
                    </td>
                    <td class="day">
                      <?php
                        $date_stamp = strtotime(date('Y-m-d', strtotime($value->visit_date)));
                        $stamp = date('l', $date_stamp);
                      ?>
                      {{$stamp}} | {{App\Divisions_time::find($value->divisions_time_id)->time}}
                    </td>
                    </td>
                    <td class="doctor">
                      {{App\User::find($value->doctor_id)->name}}
                    </td>
            				<td class="value text_align_center">
                      {{$value->visit_price}} | {{$value->visit_paid}}
                    </td>
                    <td class="status">
                      <?php if ($value->visit_price != $value->visit_paid) { ?>
                        <b>incomplete</b>
                      <?php } elseif($value->visit_price == $value->visit_paid && $value->visit_price != 0) { ?>
                        <b>complete</b>
                      <?php }elseif ($value->visit_price == 0) { ?>
                        <b>new</b>
                      <?php } ?>
                    </td>
                    <td class="delete">
                      {{Form::open(array(
                          'route' => array( 'visit.destroy', $value->id ),
                          'method' => 'delete',
                          'style' => 'display:inline',
                          'onsubmit' => "return confirm('Are you sure you want to delete?')",
                      ))}}
                           {{Form::submit('Delete', array('class' => 'btn btn-danger'))}}
                      {{Form::close()}}
                    </td>
            			</tr>
                  @endforeach
            		</tbody>
          		</table>
            </div>
            </div>
            <div class="form-group text-center">
              {{ $visits->links() }}
            </div>
          </div>
        </div>
  @endsection
