<div class="container">
  <div class="alert-danger danger">
    <div class="alert-heading">
      @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
        </ul>
      @endif
    </div>
  </div>
</div>
