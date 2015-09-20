@extends('app')

@section('content')

<div class="container">
    <h4>Enter a Nominee</h4>
    <div class="row">
      <form class="col s12" action="">
        <div class="row">
          <div class="input-field col s12">
            <input id="name" type="text" name="name">
            <label for="name">Name</label>
          </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label>Position</label>
                <select name="position" class="browser-default">
                  <option value="King">King</option>
                  <option value="Queen">Queen</option>

                  <option value="Prince">Prince</option>
                  <option value="Princess">Princess</option>

                  <option value="Duke">Duke</option>
                  <option value="Duchess">Duchess</option>

                  <option value="Baron">Baron</option>
                  <option value="Baroness">Baroness</option>

                </select>
            </div>
        </div>
        <button class="waves-effect waves-light btn btn-large" type="submit">Vote</button>
      </form>
    </div>
</div>

@endsection