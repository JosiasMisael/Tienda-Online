<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
