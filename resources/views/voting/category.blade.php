<div class="row">
  <div class="card col s12 m6 offset-m3">
      <div class="card-content">
          <span class="card-title grey-text text-darken-4">{{ $name }}</span>
              {{-- <pre>{{ var_dump($options) }}</pre> --}}
          @foreach($options as $option)
            <p>
              <input class="with-gap" name="vote[{{ $name }}]" type="radio" id="vote[{{ $name }}][{{ $option['name'] }}]" value="{{$option['name']}}" />
              <label for="vote[{{ $name }}][{{ $option['name'] }}]">{{ $option['name'] }}</label>
            </p>
          @endforeach
      </div>
  </div>
</div>
