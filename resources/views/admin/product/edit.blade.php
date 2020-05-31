@extends('plantilla.admin')


@section('title', 'Editar Producto')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Productos</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('estilos')
<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.css">
<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('script')
<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script src="/adminlte/ckeditor/ckeditor.js"></script>
<script>
    $(function () {
  $(' #category_id').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });

    });
</script>
@endsection

@section('contenido')


<form action="{{ route('admin.product.update',$product) }}" method="POST" enctype="multipart/form-data" >
@csrf
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
      <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Datos generados automáticamente</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Visitas</label>
                <input  class="form-control @error('view') is-invalid @enderror" type="number" id="visitas" name="view" value="{{ old('view')}}">
                  @error('view')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ventas</label>
                  <input  class="form-control @error('sales') is-invalid @enderror" type="number" id="ventas" name="sales"value="{{ old('sales')}}" >
                  @error('sales')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
        </div>
        <!-- /.card -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Datos del producto</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre</label>

                  <input class="form-control @error('name') is-invalid @enderror was-validated" type="text" id="name" name="name" value="{{ old('name')}}" >
                  @error('name')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                  <label>Cantidad</label>
                  <input class="form-control @error('quantity') is-invalid @enderror" type="number" id="cantidad" name="quantity" value="{{ old('quantity')}}" >
                  @error('quantity')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Categoria</label>
                  <select name="category_id" id="category_id" class="form-control" style="width: 100%;">
                    @foreach($categories as $categoria)
                     @if ($loop->first)
                        <option value="{{ $categoria->id }}" selected="selected">{{ $categoria->name }}</option>
                     @else
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                     @endif
                    @endforeach
                  </select>

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
        </div>
      </div>
        <!-- /.card -->
        <div id="product" class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Sección de Precios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Precio anterior</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Q</span>
                        </div>
                        <input v-model="previous_price"  class="form-control @error('previous_price') is-invalid @enderror " type="number"
                    id="previous_price" name="previous_price" min="0"  step=".01" {{old('previous_price')}}>
                        @error('previous_price')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror


                      </div>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Precio actual</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Q</span>
                        </div>
                        <input v-model="actual_price" class="form-control " type="number" id="actual_price"
                    name="actual_price" min="0"  step=".01">

                     </div>
                  <br>
                  <span id="descuento">
                      @{{generarDescuento}}
                  </span>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Porcentaje de descuento</label>
                     <div class="input-group">
                    <input  v-model="discount" class="form-control " type="number" id="discount" name="discount" step="any" min="0" max="100">
                    <div class="input-group-prepend">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                  <br>
                  <div class="progress">
                      <div id="barraprogreso" class="progress-bar" role="progressbar"

                        v-bind:style="{width:discount+'%'}"
                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">@{{discount}}%</div>
                  </div>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
   <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Descripciones del producto</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Descripción corta:</label>
                  <textarea class="form-control ckeditor" name="short_description" id="descripcion_corta" rows="3">{{ old('short_description')}}</textarea>
                  @error('short_description')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form group -->
               <div class="form-group">
                  <label>Descripción larga:</label>
                  <textarea class="form-control ckeditor" name="long_description" id="descripcion_larga" rows="5">{{ old('long_description')}}</textarea>
                  @error('long_description')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
       </div>
        <!-- /.col-md-6 -->
   <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Especificaciones y otros datos</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Especificaciones:</label>
                <textarea class="form-control ckeditor" name="specification" id="especificaciones" rows="3"></textarea>
                @error('specification')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror

                </div>
                <!-- /.form group -->
               <div class="form-group">
                  <label>Datos de interes:</label>
               <textarea class="form-control ckeditor " name="date_of_interest" id="datos_de_interes" rows="5">{{old('date_of_interest')}}</textarea>
                  @error('date_of_interest')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
       </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
         <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Imagenes</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <div class="form-group">

               <label for="images">añadir imagenes</label>

               <input type="file" class="form-control-file @error('images.*') is-invalid @enderror" name="images[]" id="images[]" multiple
               accept="image/*" >
               @error('images.*')
                  <small class="form-text text-danger">{{ $message }}</small>
              @enderror
               <div class="description">
                   Un numero ilimitados de archivos pueden ser cargados en este campo
                   <br>
                   limite de 2048 MB por imagen
                   <br>
                   Tipos permitidos: jpeg, png, jpg, gif, svg
                   <br>
               </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
        </div>
        <!-- /.card -->
      <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Administración</h3>
          </div>
          <!-- /.card-header -->
      <div class="card-body">
       <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Estado</label>
                  <input  class="form-control" type="text" id="estado" name="product_status" value="Nuevo">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="1" id="activo" name="status">
                        <label class="custom-control-label" for="activo">Activo</label>
                     </div>

                    </div>

                    <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox"  class="custom-control-input" id="sliderprincipal" value="1" name="slider">
                      <label class="custom-control-label" for="sliderprincipal">Aparece en el Slider principal</label>
                    </div>
                  </div>
                  </div>
       </div>
            <!-- /.row -->
       <div class="row">
              <div class="col-md-12">
                <div class="form-group">

                   <a class="btn btn-danger" href="{{ route('cancelar','admin.product.index') }}">Cancelar</a>
                   <input
                  type="submit" value="Guardar" class="btn btn-primary">

                </div>
                <!-- /.form-group -->

              </div>
              <!-- /.col -->
       </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </form>

 @endsection
