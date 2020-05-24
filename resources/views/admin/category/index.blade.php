@extends('plantilla.admin')

@section('title','Administración de Categorías')

@section('breadcrumb')
 <li class="breadcrumb-item active"> @yield('title')</li>
@endsection

@section('contenido')
<!-- /.row -->

<div id="apicategory" class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de categorías</h3>

          <div class="card-tools">
             <form action="">
              <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="name" class="form-control float-right" placeholder="Busqueda" value="{{ request()->get('name')}}">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
        </form>


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
                    <td><button class="btn btn-danger btn-sm" v-on:click="mensaje({{$category->id}})"><i class="fa fa-trash"></i></button></td>

                </tr>
                @empty
                <tr><td colspan="4">NO EXISTEN CATEGORÍAS</td></tr>
                @endforelse

             </tbody>
          </table>
          {{$categorias->appends($_GET)->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
  @endsection
