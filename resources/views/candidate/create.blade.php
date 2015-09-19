@extends('layout.master')
@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ route('candidate.store') }}">
  <input type="text" name="_token" id="_token" class="hidden" value="{{ csrf_token() }}">
  <div class="panel panel-default">
    <div class="panel-heading">
      Candidate Registration
    </div>
    <div class="panel-body">
      <div class="form-group {{ ($errors->has('forename')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Forename</label>
        <div class="col-sm-10">
          <input type="text" name="forename" class="form-control" value="{{ old('forename') }}">
          <p class="help-block">{{ ($errors->has('forename') ? $errors->first('forename') : '') }}</p>
        </div>
      </div>
      <div class="form-group {{ ($errors->has('surname')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Surname</label>
        <div class="col-sm-10">
          <input type="text" name="surname" class="form-control" value="{{ old('surname') }}">
          <p class="help-block">{{ ($errors->has('surname') ? $errors->first('surname') : '') }}</p>
        </div>
      </div>
      <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          <p class="help-block">{{ ($errors->has('email') ? $errors->first('email') : '') }}</p>
        </div>
      </div>
      <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="text" name="password" class="form-control" value="{{ old('password') }}">
          <p class="help-block">{{ ($errors->has('password') ? $errors->first('password') : '') }}</p>
        </div>
      </div>
      <div class="form-group {{ ($errors->has('contact_number')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}">
          <p class="help-block">{{ ($errors->has('contact_number') ? $errors->first('contact_number') : '') }}</p>
        </div>
      </div>
      <div class="form-group {{ ($errors->has('right_to_work')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Right to work in UK</label>
        <div class="col-sm-10">
          <input type="checkbox" name="right_to_work" class="form-control" checked="{{ old('right_to_work') }}">
          <p class="help-block">{{ ($errors->has('right_to_work') ? $errors->first('right_to_work') : '') }}</p>
        </div>
      </div>
      <div class="form-group {{ ($errors->has('country')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Country</label>
        <div class="col-sm-10">
          <select name="country" id="country" class="form-control">
            <option value="England" selected="">England</option>
          </select>
          <p class="help-block">{{ ($errors->has('country') ? $errors->first('country') : '') }}</p>
        </div>
      </div>
      <div class="form-group {{ ($errors->has('region')) ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label">Regions</label>
        <select name="regions[]" class="col-md-4 select-multiple-regions" multiple="multiple" style="width: 100%">
            <option value="NW">North West</option>
            <option value="NE">North East</option>
            <option value="ML">Midlands</option>
            <option value="SW">South West</option>
            <option value="SE">South East</option>
            <option value="EA">East Anglia</option>
          </select>
        </div>
        <div class="form-group">
          <label for="skills" class="col-sm-2">Sector</label>
          <select class="col-md-4 select-multiple-skills" multiple="multiple" style="width: 100%">
            <option value="administraion">Administration</option>
            <option value="cleaning">Cleaning</option>
            <option value="networking">Networking</option>
            <option value="juggling">Juggling</option>
            <option value="unicycling">Unicycling</option>
            <option value="hacking">Hacking</option>
          </select>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Upload your Resume</label>
          <div class="col-sm-10">
            <input type="file" name="file" class="form-control">
          </div>
          </div
          <div class="form-group">
            <label class="col-sm-2 control-label">Get job alerts</label>
            <div class="col-sm-10">
              <input type="checkbox" name="alerts" class="form-control">
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <button type="submit" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-ok"></i>Create</button>
          <a href="{{ route('candidate.index') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Cancel</a>
        </div>
      </div>
    </form>
    @endsection
    <!-- page specific scripts to be injected into master.blade.php footer div -->
    @section('footer')
    <script type="text/javascript">
    $(document).ready(function() {
        /** multiple select  */
        $('.select-multiple-regions').select2();
        $('.select-multiple-skills').select2();
      });
</script>
@endsection