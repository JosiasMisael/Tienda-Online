@extends('plantilla.admin')

@section('title','Categoría')


@section('contenido')
          <!-- Default box -->

        <div id="apicategory">
            <form>
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

                <span style="display:none" id="editar">{{$editar}}</span>
                <span style="display:none" id="nombretemp">{{$category->name}}</span>
               <div class="form-group">
                <label for="nombre">Nombre</label>
                    <input v-model="nombre"
                     @blur="getCategory"
                     @focus = "div_aparecer= false"
                     readonly
                     class="form-control" type="text" name="name" id="nombre" value="{{$category->name}}">

                             <label for="descripcion">Descripción</label>
                                   <textarea class="form-control"  name="description" id="descripcion" cols="30" rows="5"readonly>{{$category->description}}</textarea>
            </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <a href="{{ route('cancelar','admin.category.index')}}" class="btn btn-danger btn-sm float-left">Cancelar</a>
            <a href="{{ route('admin.category.edit', $category)}}" class="btn btn-success btn-sm float-right">Editar</a>

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

    </form>
</div>

  @endsection
