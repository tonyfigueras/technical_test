export default {
    props: ["id_user"],
    data() {
        return {
            
           
            rout: "",
            err: false,
            msg: null,
            form: {
                status: "0",
                iduser: this.id_user,
              destino:"",
               mensaje:"",
               
               
            },
            datos: null,
            busy: false,
            search: null,
            errors: [],
            pagination: {
                current: 1,
                total: 0
            }
        };
    },

    computed: {},
    created: function() {
       
    },
    mounted() {
      
    },
    methods: {
       
        validat() {
            if (!this.form.destino) {
                return {
                    err: true,
                    msg: "Debe escribir un e-mail para el destinatario."
                };
            }
            if (!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(this.form.destino)){
            
                return {
                    err: true,
                    msg: "La dirección de email " + this.form.destino + " es incorrecta."
                };
            }
            if (!this.form.asunto) {
                return {
                    err: true,
                    msg: "Debe escribir el asunto."
                };
            }
           
            if (!this.form.mensaje) {
                return {
                    err: true,
                    msg: "Debe escribir un mensaje."
                };
            }
            return {
                err: false,
                msg: null
            };
        },
       

        async enviar() {
            let valid = await this.validat();
            if (!valid.err) {
                try {
                   var _this = this;
                 if (this.form.status == "1") {
                        this.rout = "/send";
                    } 
                    axios.post('/send', this.form).then(function(response) {
                          if (response.data.status === "error") {
                           
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                background: '#FFD733' ,
                                didOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                              })
                              
                              Toast.fire({
                                icon: 'error',
                                title: 'Error el campo e-mail se encuentra ya registrado'
                              })
                        
                        }
                            else{
                                _this.form.destino = _this.form.mensaje = _this.form.asunto = "";
                              
                               const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                background: '#33FF93' ,
                                didOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                              })
                              
                              Toast.fire({
                                icon: 'success',
                                title: 'E-mail enviado correctamente...!!!'
                              })
                              
                            }
                          
                        
                      
                    });

                } catch (e) {
                    ErrorHandler.render(e);
                    this.busy = false;
                }
            } else {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    background: '#FFD733' ,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })
                  
                  Toast.fire({
                    icon: 'error',
                    title: valid.msg
                  })
            }
        },

       
        

       
    }
};
