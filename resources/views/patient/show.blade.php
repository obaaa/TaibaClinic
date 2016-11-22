  @extends('layouts.master')
  @section('content')
  @section('titel','patient')
  <div class="content">
      <div class="row">
        {{-- patient visits --}}

        {{--  --}}
        <div class="col-md-12 col-md-12">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title"><b>{{$patient->patient_name}}<b></h4>
                      <hr>
                    </div>
                <div class="content">
                {{ Form::model($patient, array('route' => array('patient.update', $patient->id), 'method' => 'PUT')) }}
                      {!! csrf_field() !!}
                      <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"  name="patient_name" value="{{$patient->patient_name}}" class="edit form-control border-input" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="patient_gender" value="{{$patient->patient_gender}}" class="edit form-control border-input">
                                      <option selected value="{{$patient->patient_gender}}">{{$patient->patient_gender}}</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="number" name="patient_phone" value="{{$patient->patient_phone}}" class="edit form-control border-input" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select name="patient_blood" value="{{$patient->patient_blood}}" class="edit form-control border-input">
                                      <option selected value="{{$patient->patient_blood}}">{{$patient->patient_blood}}</option>
                                      <option value="O−">O−</option>
                                      <option value="O+">O+</option>
                                      <option value="A−">A−</option>
                                      <option value="A+">A+</option>
                                      <option value="B−">B−</option>
                                      <option value="B+">B+</option>
                                      <option value="AB−">AB−</option>
                                      <option value="AB+">AB+</option>
                                    </select>
                                  </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-8">
                              <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="patient_address" value="{{$patient->patient_address}}" class="edit form-control border-input" placeholder="Home Address">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Birthday</label>
                                  <input type="date" name="patient_birthday" value="{{$patient->patient_birthday}}" class="edit form-control border-input">
                              </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chronic Diseases</label>
                                    <textarea rows="5" name="patient_diseases" class="edit form-control border-input" placeholder="Description">{{$patient->patient_diseases}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" id="toggle-detail" style="display:none;">Update</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div>
                        <a class="edits" href="#" id="toggle-btn" onclick="toggleDetail()">Edit</a>
                        {{-- <a class="save" href="#">Save Changes</a> --}}
                      </div>
                </div>
            </div>
        </div>
        {{--  --}}
        {{-- <div class="col-md-4 col-md-4">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">New Visit</h4>
                      <hr>
                <div class="content">
                    <form action="{{action('PatientController@update',['id'=>$patient->id])}}" method="put">
                      {!! csrf_field() !!}
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Date</label>
                                  <input type="date" name="patient_birthday" class="form-control border-input">
                              </div>
                          </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">go</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
      </div> --}}
        {{--  --}}
        {{-- class="text-center" --}}
        <div class="col-md-12 col-md-12">
            <div class="card">
            <div class="row">
            <div class="col-md-12">
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
                    <th class="date text_align_center"><b>Date</b></th>
                    <th class="day text_align_center"><b>Day</b></th>
                    <th class="time text_align_center"><b>Time</b></th>
          					<th class="doctor text_align_center"><b>Doctor</b></th>
          					<th class="visit_value text_align_center"><b>Visit_value</b></th>
                    <th class="visit_pid text_align_center"><b>Visit_pid</b></th>
          				</tr>
          			</thead>
          			<tbody>
                {{-- patient visits --}}
                @foreach($visits as $value)
          			<tr>
          				<td class="date">
                    <a href="{{ url ('visit/'.$value->id) }}" class="" >{{$value->visit_date}}</a>
                  </td>
                  <td class="day">
                    <?php
                      $date_stamp = strtotime(date('Y-m-d', strtotime($value->visit_date)));
                      $stamp = date('l', $date_stamp);
                    ?>
                    {{$stamp}}
                  </td>
                  <td class="time">
                    {{App\Divisions_time::find($value->divisions_time_id)->time}}
                  </td>
                  </td>
                  <td class="doctor">
                    {{App\User::find($value->doctor_id)->name}}
                  </td>
          				<td class="visit_value text_align_center">
                    {{$value->visit_price}}
                  </td>
                  <td class="visit_pid">
                    {{$value->visit_paid}}
                  </td>
          			</tr>
                @endforeach
          		</tbody>
        		</table>
          </div>
          </div>
      </div>
    </div>
  {{--  --}}
  </div></div></div>
  </div>

  @endsection
