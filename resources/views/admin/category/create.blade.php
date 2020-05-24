@extends('plantilla.admin')


@section('title','Crear Categoría')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="{{ route('admin.category.index')}}">Categorías</a></li>
 <li class="breadcrumb-item active"> @yield('title')</li>
@endsection

@section('contenido')
          <!-- Default box -->

        <div id="apicategory">
            <form action="{{ route('admin.category.store')}}" method="POST">
             @csrf
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Administración de Categorías</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input v-model="nombre"

                                    @blur="getCategory"
                                    @focus = "div_aparecer= false"

                                class="form-control" type="text" name="name"  value="{{ old('name')}}">
                                <div v-if="div_aparecer" v-bind:class="div_claseNombre">
                                    @{{ div_mensajeNombre }}
                                </div>
                                <br v-if="div_aparecer">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="description" id="descripcion" cols="30" rows="5"></textarea>
                            </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <a href="{{ route('cancelar','admin.category.index')}}" class="btn btn-danger btn-sm float-left">Cancelar</a>
                <input
                :disabled = "deshabilitar_boton==1"
               type="submit" value="Guardar" class="btn btn-primary float-right">

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

    </form>
        </div>

  @endsection
