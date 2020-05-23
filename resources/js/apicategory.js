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
        }
    },
    mounted(){
     if(document.getElementById('editar').innerHTML){
         this.nombre = document.getElementById('nombretemp').innerHTML;
         this.deshabilitar_boton =0;
     }
    }

});
