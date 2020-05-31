const category = new Vue({
    el: '#category',
    data: {

    },
    methods: {
        mensaje : function(mensaje){

            Swal.fire({
                title: '¿Estas Seguro de eliminar una categoria?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
              }).then((result) => {

                if (result.value) {
                    let url = '/admin/category/'+ mensaje;
                    axios.delete(url).then(response => {
                        Swal.fire(
                            '¡Eliminado!',
                            'El registro ha sido eliminado con éxito.',
                            )
                       setTimeout(function(){
                        window.location = response.data.redirect;
                       },1500);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
              })
          },


    },

    mounted(){
    }
});


