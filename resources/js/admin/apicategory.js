const apicategory = new Vue({
    el: '#apicategory',
    data: {

        nombre: '',
        div_mensajeNombre:'',
        div_claseNombre: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton:1
    },
    methods: {
        getCategory() {
            let url = '/api/category/'+this.nombre;
            axios.get(url).then(response => {
               this.div_mensajeNombre = response.data;
               console.log(response.data);

                if (this.div_mensajeNombre==="Nombre Existe") {
                    this.div_claseNombre = 'badge badge-danger';
                    this.deshabilitar_boton=1;
                this.div_aparecer = true;
                } else {
                    this.deshabilitar_boton=0;
                }

            })
        },
        mensaje : function(mensaje){

                swal({
                        title: '¿Está seguro de eliminar esta categoría?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#0CC27E',
                        cancelButtonColor: '#FF586B',
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar',
                        confirmButtonClass: 'btn btn-success mr-5',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false
                    }).then((result) =>{

                            let url = '/admin/category/'+ mensaje;
                            axios.delete(url).then(response => {

                                    swal(
                                        '¡Eliminado!',
                                        'El registro ha sido eliminado con éxito.',

                                        )
                                   setTimeout(function(){

                                    window.location = response.data.redirect;
                                   },1500)
                             })
                    }, function (dismiss) {
                        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                        if (dismiss === 'cancel') {
                        }
                    })


          },


    },

    mounted(){
     if(document.getElementById('editar')){
         this.nombre = document.getElementById('nombretemp').innerHTML;
         this.deshabilitar_boton =0;
     }
    }

});
