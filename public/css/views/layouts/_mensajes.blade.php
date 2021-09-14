@if (session()->has('mensajes'))
  @if (session()->get('mensajes') =='Solo Puede Registrar 3 Imagenes Para El Carrousel!!')
    <div class="alert alert-danger">
        <div class="alert-heading">
              {{ session()->get('mensajes') }}
        </div>
    </div>
    @else
      <div class="alert alert-success">
          <div class="alert-heading">
                {{ session()->get('mensajes') }}
          </div>
      </div>
  @endif

@endif
