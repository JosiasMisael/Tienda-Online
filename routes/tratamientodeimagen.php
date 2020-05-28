<?php

use App\Category;
use App\Image;
use App\Product;
use App\User;


//00 Verficar si un usuario o producto tiene una imagen
 $usuario = User::find(1);
 $image = $usuario->image;

 if ($image) {
   echo 'Tiene una imagen';
 }else
 {
  echo 'No tiene una imagen';
 }
 return $image;

 // 01 Crear una imagen para el usuario utilizando el metodo save
 $imagen = new Image(['url'=>'images/avatar.png']);
 $usuario = User::find(1);
  $usuario->image()->save($imagen);
 return $usuario;

 //03 Obtener la informacion de las imagenes a travez del usuario
 $usuario = User::find(1);
 return $usuario->image->url;

// 04 Crear varias imagenes  para ub producto utilizando el metodo savemany
  $producto = Product::find(2);
  $producto->images()->saveMany([

     new Image(['url'=>'images/avatar.png']),
     new Image(['url'=>'images/avatar2.png']),
     new Image(['url'=>'images/avatar3.png']),
     new Image(['url'=>'images/avatar5.png'])
  ]);
return $producto->images;


 // 05 Crear una imagen para el usuario utilizando el metodo create
 $usuario = User::find(1);
  $usuario->image()->create(['url'=>'images/avatar2.png']);
 return $usuario;

  // 05.1 Otra forma de crear una imagen para el usuario utilizando el metodo create
  $image['url']='images/avatar3.png';
  $usuario = User::find(1);
  $usuario->image()->create($image);
  return $usuario;

// 06 Crear varias imagenes  para un producto utilizando el metodo createmany
$image =[];
$image[0]['url']='images/a.png';
$image[1]['url']='images/a.png';
$image[2]['url']='images/a.png';
$image[3]['url']='images/avatar.png';
$image[4]['url']='images/avatar2.png';
$image[5]['url']='images/avatar3.png';
$producto = Product::find(1);
$producto->images()->createMany($image);
return $producto->images;

// 07 Actualizar una imagen de usuario (un usuario solo tiene una imagen)
$usuario =User::find(1);
$usuario->image->url = 'images/avatar3.png';
$usuario->push();
return $usuario->image;



// 08 Actualizar imagenes de los productos en esepcifico (un producto tiene muchas imagenes)
$producto = Product::find(2);
$producto->images[0]->url = 'images/a.png';
$producto->push();
return $producto->images;


// 09 Delimitar los registros

$image = Image::find(6);
return $image->imageable;


// 09.1 Busqueda de imagenes de forma especifica
$producto = Product::find(1);
return $producto->images()->where('url','images/a.png')->get();



// 10 Contar los registros relacionados con un producto o usuario
$image = Product::withCount('images')->get();
$image = $image->find(2);
return $image;



// 10.1  otra manera de contar los registros relacionados con un producto o usuario(Muestra el campo Image_count)
$product = Product::find(2);
$product->loadCount('images')->get();
return $product;


//11 Formas de cargar la infromacion lazy loading(carga diferida) no muy recomendable

$product = Product::find(1);
$image =$product->images;
$categoria = $product->category;


 //12 Carga Previo (eager loading)
 $producto = Product::with('images')->get();
 return $producto;

 //13 Carga Previo de usuario (eager loading)
 $produc = User::with('image')->find(1);
 return $produc->image;


 // 14 Carga Previa de multiples relaciones (eager loading)
 $produc = Product::with('images','category')->find(1);
 return $produc;

 // 15 Delimitar campos con  carga previa(eager loading)
 $produc = Product::with('images:id,imageable_id,url','category:id,name')->find(1);
 //En una tabla de uno a muchos, podemos acceder a los valores desde la tabla padre como esta con (images:id,imageable_id,url)
 //Basicamente es('tabla:id de tabla, relaciond Foreing, campo que se decea')
 //AHORA PARA TRAER DATOS DE CATEGORIA, BASTA CON COLOCAR ('TABLA:ID,CAMPO) esto se da por la relacion de muchos a uno
 return $produc;

  //16 Eliminar un imagen especifica
   $product= Product::find(1);
   $product->images[0]->delete();
   return $product;

   //17 Eliminar todas las imagenes de un producto
   $product= Product::find(1);
   $product->images()->delete();
   return $product;

