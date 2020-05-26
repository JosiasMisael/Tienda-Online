const apicategory = new Vue({
    el: '#category',
    data: {

    },
    methods: {
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
    }
});
