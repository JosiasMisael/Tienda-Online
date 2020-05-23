@extends('plantilla.admin')

@section('title','Administración de Categorías')


@section('contenido')
<!-- /.row -->
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de categorías</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <a href="{{route('admin.category.create')}}" class="btn btn-primary float-right m-2">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha Creacion</th>
                <th>Fecha Modificacion</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td> <a href="{{route('admin.category.show',$category)}}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a></td>
                    <td> <a href="{{route('admin.category.edit',$category)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
                    <td> <a href="{{route('admin.category.destroy',$category)}}"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                </tr>
                @empty
                <tr><td colspan="4">NO EXISTEN CATEGORÍAS</td></tr>
                @endforelse

             </tbody>
          </table>
          {{$categorias->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  @endsection
