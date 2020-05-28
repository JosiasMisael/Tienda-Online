<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())  <!-- Aqui mostramos los errores que se pueden tener a la hora de validar
                y poderlos mostrar en el formulario -->
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif
           @if(session('datos'))
                  <div class="alertt alert-success alert dismmissible fade show" role="alert">
                      {{session('datos')}}
                   </div>
           @endif
           @if(session('cancelar'))
                  <div class="alertt alert-danger alert dismmissible fade show" role="alert">
                    {{session('cancelar')}}
                     </div>
           @endif
        </div>
    </div>
</div>
