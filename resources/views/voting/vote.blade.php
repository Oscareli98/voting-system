@extends('app')

@section('content')

<div class="page vote">
  <div class="container">
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
    <form action="{{ route('votes.store') }}" method="POST">
      {!! csrf_field() !!}
      <input type="hidden" name="school" value="{{ $school }}">
      <input type="hidden" name="code" value="{{ $code }}">
      {{-- <pre> --}}
        {{-- {{ print_r($categories) }} --}}
      {{-- </pre> --}}
    @foreach($categories as $name => $options)

      @include('voting.category', ['name' => $name, 'options' => $options])

    @endforeach
    <div class="center-align">
      <button class="waves-effect waves-light btn btn-large" type="submit">Vote</button>
    </div>
    </form>

  </div>
</div>

@endsection