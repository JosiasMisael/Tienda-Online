const product = new Vue({
    el: '#product',
    data: {
        previous_price:'',
        actual_price:'',
        discount:0,
        descuento:'',
        descuento_mensaje:'',
    },
    computed: {
        generarDescuento(){
             if(this.discount >100){
                Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
                  text:'El porcentaje no puede ser mayor a 100!',
                 }),

                this.discount = 100;
                this.descuento = (this.previous_price* this.discount)/100;
                this.actual_price = this.previous_price-this.descuento;

                return this.descuento_mensaje ='El producto tiene el 100% de descuento'
            }else
            if(this.discount <0){
                Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 text:'El porcentaje no puede ser menor a 0!',
                 }),

                this.discount = 0;
                this.descuento = (this.previous_price* this.discount)/100;
                this.actual_price = this.previous_price-this.descuento;

                return this.descuento_mensaje =''
            }else
            if(this.discount> 0){
                this.descuento = (this.previous_price* this.discount)/100;
                this.actual_price = this.previous_price-this.descuento;

                if(this.discount ===100){
                   this.descuento_mensaje = 'El producto es regalado';
                }else{
                    this.descuento_mensaje ="Hay un descuetno de Q"+this.descuento;
                }
             return this.descuento_mensaje
            }else{
                this.descuento ='';
                this.actual_price = this.previous_price;
                this.descuento_mensaje = '';
                 return this.descuento_mensaje
            }
        }
    },
});
