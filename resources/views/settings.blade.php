@extends('layouts.master')
@section('titel','settings')

@section('content')

  <script>
  function toggleDetail() {
    $('#toggle-btn').toggleClass('open');
    $('#toggle-detail').fadeToggle();
}
  </script>
        <div class="content">
<div id="exTab3" class="container">
<ul  class="nav nav-pills">
			<li class="active">
        <a  href="#1b" data-toggle="tab">employee</a>
			</li>
			<li><a href="#2b" data-toggle="tab">Tests</a>
			</li>
			<li><a href="#3b" data-toggle="tab">test3</a>
			</li>
  		<li><a href="#4a" data-toggle="tab">test4</a>
			</li>
		</ul>
{{-- 1 --}}
			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1b">
          <br>
          <div class="row">
            <div class="text-center">
              <div class="btn btn-primary btn-fill btn-wd" id="toggle-btn" onclick="toggleDetail()">Add Employee</div>

              @if (Session::has('message'))
              	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{ Session::get('message') }}</p>
              @endif

            </div><br>
            <div class="col-lg-12 col-md-12" id="toggle-detail" style="display:none;">
                <div class="card"  >
                    <div class="header">
                        <h4 class="title">create employee</h4>
                    </div>
                    <div class="content">
                      {!! Html::ul($errors->all()) !!}

                      {!! Form::open(array('url' => 'settings')) !!}

                      <div class="form-group">
                      {!! Form::label('name', trans('name').' *') !!}
                      {!! Form::text('name', Input::old('name'), array('class' => 'form-control border-input')) !!}
                      </div>

                      <div class="form-group">
                      {!! Form::label('email', trans('email').' *') !!}
                      {!! Form::text('email', Input::old('email'), array('class' => 'form-control border-input')) !!}
                      </div>

                      <div class="form-group">
                      {!! Form::label('user_phone', trans('phone').' *') !!}
                      {!! Form::number('user_phone', Input::old('user_phone'), array('class' => 'form-control border-input')) !!}
                      </div>

                      <div class="form-group">
                      {!! Form::label('role', trans('role').' *') !!}
                      {!! Form::select('role', ['3' => 'receptionist','2' => 'doctor'],Input::old('name'), array('class' => 'form-control border-input'))!!}
                      </div>

                      <div class="form-group">
                      {!! Form::label('password', trans('password').' *') !!}
                      <input type="password" class="form-control border-input" name="password" placeholder="Password">
                      </div>

                      <div class="form-group">
                      {!! Form::label('password_confirmation', trans('confirm password').' *') !!}
                      <input type="password" class="form-control border-input" name="password_confirmation" placeholder="Confirm Password">
                      </div>

                      <div class="text-center">
                      {!! Form::submit(trans('save'), array('class' => 'btn btn-info btn-fill btn-wd')) !!}
                      </div>

                      {!! Form::close() !!}
                    </div>
                </div>
            </div>
          </div>
          <br>
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>id</td>
                      <td>name</td>
                      <td>phone</td>
                      <td>email</td>
                      <td>role</td>
                      <td>&nbsp;</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($employees as $value)
                  <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->user_phone }}</td>
                      <td>{{ $value->email }}</td>

                      <td>
                        @if ($value->id == '1')
                          <b>Admin</b>
                        @endif
                        <!-- @foreach ($user_roles as $user_role)
                          @if ($value->id == $user_role->user_id)
                            @if ($user_role->role == '2')
                              <b>Doctor</b>
                            @elseif ($user_role->role == '3')
                              <b>Receptionist</b>
                            @endif
                          @endif -->
                        @endforeach
                      <td>

                          <a class="btn btn-small btn-info" href="{{ URL::to('settings/' . $value->id . '/edit') }}">Edit</a>
                          {!! Form::open(array('url' => 'settings/' . $value->id, 'class' => 'pull-right')) !!}
                              {!! Form::hidden('_method', 'DELETE') !!}
                              {!! Form::submit(trans('Delete'), array('class' => 'btn btn-warning')) !!}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        {{-- 2 --}}
				<div class="tab-pane" id="2b">
          <br>
          <div class="row">

            <div class="col-lg-12 col-md-12" id="toggle-detail2">
                <div class="card"  >
                    <div class="header">
                        <h4 class="title">Add Test</h4>
                    </div>
                    <div class="content">
                        <form action="{{ url ('patient') }}" method="POST" enctype="multipart/form-data" >
                          {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" name="patient_name"class="form-control border-input" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" name="patient_phone" class="form-control border-input" placeholder="price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Add</button>
                                </div>
                              </div>
                              </div>
                            </div>

                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
          <br>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Browser</th>
                <th>Sessions</th>
                <th>Percentage</td>
                <th>New Users</th>
                <th>Avg. Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Opera</td>
                <td>103</td>
                <td>0.74%</td>
                <td>87</td>
                <td>01:22</td>
              </tr>
              <tr>
                <td>Edge</td>
                <td>98</td>
                <td>0.71%</td>
                <td>69</td>
                <td>01:18</td>
              </tr>
              <tr>
                <td>Other</td>
                <td>275</td>
                <td>6.02%</td>
                <td>90</td>
                <td>N/A</td>
              </tr>
            </tbody>
          </table>
				</div>
        {{-- 3 --}}
        <div class="tab-pane" id="3b">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
				</div>
        {{-- 4 --}}
          <div class="tab-pane" id="4b">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
				</div>
        {{--  --}}
			</div>
  </div>
</div>
@endsection
