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
                            <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                                @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <label for="descripcion">Descripción</label>
                            <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="descripcion" cols="30" rows="5">{{old('description')}}</textarea>
                                @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <a href="{{ route('cancelar','admin.category.index')}}" class="btn btn-danger btn-sm float-left">Cancelar</a>
                <input type="submit" value="Guardar" class="btn btn-primary float-right">

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

    </form>
        </div>

  @endsection
