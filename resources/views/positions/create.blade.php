@extends('app')

@section('content')
<div class="container">

    <div class="row">
      <div class="col s12 m6">
        <h4>Nominees</h4>
        @foreach($positions as $category => $options)

          <ul class="collection with-header">
            <li class="collection-header"><h4>{{ $category }}</h4></li>

          @foreach($options as $option)
            <li class="collection-item"><div>{{ $option['name'] }}
              <a href="{#!" class="secondary-content" style="position: relative; top:  -5px; margin-bottom: 0;">
                <form style="dispay: inline;" method="POST" action="{{ route('positions.destroy', $option['id']) }}">
                  {!! csrf_field() !!}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" style="padding: 0;" class="waves-effect waves-teal btn-flat"><i class="material-icons">close</i></button>
                </form>
              </a>

            </div></li>
          @endforeach

          </ul>

        @endforeach
    </div>

      <form class="col s12 m6" action="{{ route('positions.store') }}" method="POST">
        {!! csrf_field() !!}
        <div class="row">
          <h4>Enter a Nominee</h4>
          <p class="flow-text">The order they appear here is the order they will appear in when voting! Make sure you enter the positions you want to appear first, first, and the positions you want last at the end. (Ex. Prince <em>then</em> King). The order of the schools doesn't matter. </p>

        </div>
        <!-- <input type="hidden" name="school" value="LASA"> -->
        <div class="row">
          <div class="input-field col s12">
            <input id="name" type="text" name="name">
            <label for="name">Name</label>
          </div>
        </div>
        <div class="row">
              <div class="col s12 m6">
                  <label>School</label>
                  <select name="school" class="browser-default">
                    <option value="LASA">LASA</option>
                    <option value="LBJ">LBJ</option>
                  </select>
              </div>
              <div class="col s12 m6">
                <label>Position</label>
                <select name="position" class="browser-default">
                  <option value="King">King</option>
                  <option value="Queen">Queen</option>

                  <option value="Prince">Prince</option>
                  <option value="Princess">Princess</option>

<!--                   <option value="Duke">Duke</option>
                  <option value="Duchess">Duchess</option>

                  <option value="Baron">Baron</option>
                  <option value="Baroness">Baroness</option> -->

                </select>
            </div>

        </div>
        <button class="waves-effect waves-light btn btn-large" type="submit">Save</button>
      </form>
    </div>
</div>

@endsection