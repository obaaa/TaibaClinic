@extends('layouts.master')
@section('content')
@section('titel','reports')
  <div class="container">
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- Report :: visit -->
      <div class="panel panel-default col-md-11">
        <div class="row">
      <div class="panel-heading">Report :: visits</div>
      <div class="panel-body">
        <form action="{{ url ('report/visit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {!! csrf_field() !!}
            <!-- Form Name -->
          <table class="table">
          <tr>
            <td>
          <!-- Text from_date-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="from_date">from</label>
              <div class="col-md-8">
              <input id="from_date" name="from_date" placeholder="name" class="form-control border-input" required="" type="date">
              </div>
            </div>
            </td>
            <td>
          <!-- Text to_date-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="to_date">to</label>
              <div class="col-md-8">
              <input id="to_date" name="to_date" placeholder="name" class="form-control border-input" required="" type="date">
              </div>
            </div>
            </td>
            <td>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="submit"style="color:#fff;">save</label>
                <div class="col-md-8">
                    <button id="submit" name="submit" class="btn btn-primary">GO</button>
                </div>
            </div>
            </td>
            </tr>
        </form>
          <!-- End form-->
        </table>
      </div>
    </div>
  </div>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- Report :: doctor -->

    <div class="panel panel-default col-md-11">
      <div class="row">
    <div class="panel-heading">Report :: Doctor</div>
    <div class="panel-body">
      <form action="{{ url ('report/doctor') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
          {!! csrf_field() !!}
          <!-- Form Name -->
        <table class="table">
        <tr>
          <td>
        <!-- Text from_date-->
          <div class="form-group">
            <label class="col-md-3 control-label" for="from_date">from</label>
            <div class="col-md-8">
            <input id="from_date" name="from_date" placeholder="name" class="form-control border-input" required="" type="date">
            </div>
          </div>
          </td>
          <td>
        <!-- Text to_date-->
          <div class="form-group">
            <label class="col-md-3 control-label" for="to_date">to</label>
            <div class="col-md-8">
            <input id="to_date" name="to_date" placeholder="name" class="form-control border-input" required="" type="date">
            </div>
          </div>
          </td>
          <td>
            <div class="form-group">
              <label class="col-md-4 control-label" for="customer_name">Doctor</label>
              <div class="col-md-8">
                <?php $doctor = App\User::all(); ?>
                <?php $user_role = App\UserRole::where('role_id','=','1')->get(); ?>
                <select name="doctor_id" class="form-control border-input">
                      @foreach($user_role as $value)
                        <?php
                          $user = App\User::where('id','=',$value->user_id)->first();
                        ?>
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                </select>
              </div>
            </div>
          </td>
          <td>
          <!-- Button -->
          <div class="form-group">
              <label class="col-md-3 control-label" for="submit"style="color:#fff;">save</label>
              <div class="col-md-8">
                  <button id="submit" name="submit" class="btn btn-primary">GO</button>
              </div>
          </div>
          </td>
          </tr>
          </form>
        <!-- End form-->
      </table>
    </div>
  </div>
</div><!--
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- Report :: visit_by_categorie -->

    <div class="panel panel-default col-md-11">
      <div class="row">
    <div class="panel-heading">Report :: visit_by_categorie</div>
    <div class="panel-body">
      <form action="{{ url ('report/visit_by_categorie') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
          {!! csrf_field() !!}
          <!-- Form Name -->
        <table class="table">
        <tr>
          <td>
        <!-- Text from_date-->
          <div class="form-group">
            <label class="col-md-3 control-label" for="from_date">from</label>
            <div class="col-md-8">
            <input id="from_date" name="from_date" placeholder="name" class="form-control border-input" required="" type="date">
            </div>
          </div>
          </td>
          <td>
        <!-- Text to_date-->
          <div class="form-group">
            <label class="col-md-3 control-label" for="to_date">to</label>
            <div class="col-md-8">
            <input id="to_date" name="to_date" placeholder="name" class="form-control border-input" required="" type="date">
            </div>
          </div>
          </td>
          <td>
            <div class="form-group">
              <label class="col-md-4 control-label" for="customer_name">Categorie</label>
              <div class="col-md-8">
                <?php $categories = App\Categorie::all(); ?>
                <select name="categorie_id" class="form-control border-input">
                      @foreach($categories as $value)
                        <option value="{{ $value->id }}">{{ $value->categorie_name }}</option>
                      @endforeach
                </select>
              </div>
            </div>
          </td>
          <td>
          <!-- Button -->
          <div class="form-group">
              <label class="col-md-3 control-label" for="submit"style="color:#fff;">save</label>
              <div class="col-md-8">
                  <button id="submit" name="submit" class="btn btn-primary">GO</button>
              </div>
          </div>
          </td>
          </tr>
          </form>
        <!-- End form-->
      </table>
    </div>
  </div>
</div>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- Report :: expense -->
  <div class="panel panel-default col-md-11">
    <div class="row">
  <div class="panel-heading">Report :: expenses</div>
    <form action="{{ url ('report/expense') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <!-- Form Name -->
      <table class="table">
      <tr>
        <td>
      <!-- Text from_date-->
        <div class="form-group">
          <label class="col-md-3 control-label" for="from_date">from</label>
          <div class="col-md-8">
          <input id="from_date" name="from_date" placeholder="name" class="form-control border-input" required="" type="date">
          </div>
        </div>
        </td>
        <td>
      <!-- Text to_date-->
        <div class="form-group">
          <label class="col-md-3 control-label" for="to_date">to</label>
          <div class="col-md-8">
          <input id="to_date" name="to_date" placeholder="name" class="form-control border-input" required="" type="date">
          </div>
        </div>
        </td>
        <td>
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="submit"style="color:#fff;">save</label>
            <div class="col-md-8">
                <button id="submit" name="submit" class="btn btn-primary">GO</button>
            </div>
        </div>
        </td>
        </tr>
        </form>
      <!-- End form-->
    </table>
</div>
</div>
</div>
@endsection
