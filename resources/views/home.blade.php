@extends('app')

@section('content')

<div class="container">
    <h4>Enter your code to vote</h4>
    @if(count($errors) > 0)
      <div class="row">
        <div class="col s12 m6 offset-m3">
          <div class="card red darken-1">
            <div class="card-content white-text">
              <span class="card-title">Oh no...</span>
              <p>The following errors were in your input:</p>
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    @endif
    <div class="row">
      <form class="col s12" action="{{ route('vote-code') }}" method="POST">
        {!! csrf_field() !!}
        <div class="row">
          <div class="input-field col s12">
            <input id="code" placeholder="codes are NOT case sensitive" type="text" name="code">
            <label for="code">Code</label>
          </div>
        </div>
        {{-- <div class="row">
            <div class="col s12">
                <label>School</label>
                <select name="school" class="browser-default">
                  <option value="LASA">LASA</option>
                  <option value="LBJ">LBJ</option>
                </select>
            </div>
        </div> --}}
        <input type="hidden" name="school" value="LASA">
        <button class="waves-effect waves-light btn btn-large" type="submit">Vote</button>
      </form>
    </div>
</div>

@endsection