export default {
    data() {
        return {
            
            users: {},
            countrys: {},
            country:null,
            citys: {},
            city:null,
            states: {},
            state:null,
            dialog: null,
            user: null,
            showModal: false,
            rout: "",
            err: false,
            msg: null,
            form: {
                status: "0",
                id: "",
               name: "",
               fecha_de_nacimiento:"",
               cedula:"",
               celular:"",
               email:"",
               password:"",
               password2:"",
               country_code:"",
               country:"",
               city:"",
               state:""
               
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
        this.alluser();
        this.getcountry();
    },
    mounted() {
        this.alluser();
        this.getcountry();
    },
    methods: {
        deleteuser(user) {
            var _this = this;

            const swalWithBootstrapButtons = swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Seguro que desea eliminar la Información?",
                    text: "Este Proceso no puede ser revertido!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Eliminar!",
                    cancelButtonText: "Cancelar             !",
                    reverseButtons: true
                })
                .then(result => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                            "Eliminado!",
                            "La información ha sido Eliminada.",
                            "success"
                        );
                        axios
                            .delete("/delete/" + user.id)
                            .then(function(response) {
                                _this.alluser();
                            })
                            .catch(error => {
                                console.log("Delete car: " + error);
                            });
                    } else if (
                       
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Your imaginary file is safe :)",
                            "error"
                        );
                    }
                });
        },
        validat() {
            if (!this.form.cedula) {
                return {
                    err: true,
                    msg: "Debe escribir la cedula."
                };
            }
            if(this.form.cedula.length>11)
            {return {
                err: true,
                msg: "La cedula debe tener una longitud de 11 caracteres."
            };}

            if (!this.form.name) {
                return {
                    err: true,
                    msg: "Debe escribir un nombre."
                };
            }
            if(this.form.name.length>100)
           { return {
                err: true,
                msg: "El nombre debe tener una longitud de 100 caracteres."
            };}
           /* if(this.form.celular.length>10)
           { return {
                err: true,
                msg: "El numero de celular debe tener una longitud de 10 caracteres."
            };}*/
            
            if (!this.form.email) {
                return {
                    err: true,
                    msg: "Debe escribir un e-mail."
                };
            }
            if (!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(this.form.email)){
            
                return {
                    err: true,
                    msg: "La dirección de email " + this.form.email + " es incorrecta."
                };
            }
            if (!this.form.password) {
                return {
                    err: true,
                    msg: "Debe escribir un password."
                };
            }
            
                    if (this.form.password) {
                        var re = /^(?=.*\d)(?=.*[!@#$%^&*.])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
                            if (!re.test(this.form.password)){
                        return {
                            err: true,
                            msg: "Error la contraseña debe tener mínimo de 8 caracteres, debe contener al menos un número, una letra mayúscula, una minuscula y un carácter especial."
                        };}
                    }
            if (!this.form.password2) {
                return {
                    err: true,
                    msg: "Debe confirmar el password."
                };
            }
            if (this.form.password!=this.form.password2) {
                return {
                    err: true,
                    msg: "Los pasword no son iguales."
                };
            }
            if (!this.form.fecha_de_nacimiento) {
                return {
                    err: true,
                    msg: "Debe seleccionar una fecha."
                };
            }
            if (this.form.fecha_de_nacimiento) {
                var hoy = new Date();
                var cumpleanos = new Date(this.form.fecha_de_nacimiento);
                var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                var m = hoy.getMonth() - cumpleanos.getMonth();
                if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                    edad--;
                }
               if(edad >= 18){
                }else{
                return {
                    err: true,
                    msg: "Error, Tienes menos de 18 años, No puedes registrarte."
                };}
            }
            if (!this.form.country) {
                return {
                    err: true,
                    msg: "Debe seleccionar un pais."
                };
            }
            
            if (!this.form.state) {
                return {
                    err: true,
                    msg: "Debe seleccionar un estado o seleccionar un pais que tenga estados cargados en el sistema."
                };
            }
            if (!this.form.city) {
                return {
                    err: true,
                    msg: "Debe seleccionar una ciudad o seleccionar un estado que tenga ciudades cargadas en el sistema."
                };
            }
            

            return {
                err: false,
                msg: null
            };
        },
       

        async Adduser() {
            let valid = await this.validat();
            if (!valid.err) {
                try {
                   var _this = this;
                 if (this.form.status == "1") {
                        this.rout = "/add";
                    } else {
                        this.rout = "/edit/" + this.form.id;
                    }
                    axios.post(this.rout, this.form).then(function(response) {
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
                                _this.form.name = _this.form.fecha_de_nacimiento = _this.form.cedula = 
                                _this.form.celular = _this.form.email = _this.form.password = _this.form.password2 =
                                 _this.form.country_code =  _this.country =  _this.form.city =  _this.form.state =
                                "";
                              
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
                                title: 'Información guardada exitosamente..!!!'
                              })
                                $("#myModalcarga").modal("hide");
                                _this.alluser();
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

       
        showuser(user) {
          
          this.form.status = "1";
    
              if (user) {
                this.form.status = "0";
                this.form.id = user.id;
                this.form.name = user.name;
                this.form.cedula = user.cedula;
                this.form.celular = user.celular;
                this.form.email = user.email;
                this.form.country = user.city.state.country.id;
                this.getcountry();
                this.getstate();
                this.form.state = user.city.state_id;
                this.getcity();
                this.form.city = user.city.id;
                this.form.fecha_de_nacimiento = user.fecha_de_nacimiento;
                
            }
            else
            {
                this.form.id = this.form.name = this.form.fecha_de_nacimiento = this.form.cedula = 
                this.form.celular = this.form.email = this.form.password = this.form.password2 =
                 this.country =  this.form.city =  this.form.state =
                "";
            }
            $("#myModalcarga").modal("show");
        },

        getcountry: function(){
            this.form.state = ""
            this.form.city = ""
            axios.post('/get_country')
                .then(function (response) {
                    this.countrys = response.data;
                }.bind(this));
     
        },
        getstate: function() {
          
            this.form.state = ""
            this.form.city = ""
            axios.post('get_state/'+this.form.country
                ).then(function(response){
                this.states = response.data;
            }.bind(this));
        },
        getcity: function() {
            this.form.city = ""
            axios.post('get_city/'+this.form.state
                ).then(function(response){
                this.citys = response.data;
            }.bind(this));
        },

        alluser() {
              axios
                .post(
                    "/alluser?page=" + this.pagination.current,

                    {
                        params: {
                            search: this.search
                        }
                    }
                )
                .then(response => {
                    this.users = response.data.data;
                    this.pagination.current = response.data.current_page;
                    this.pagination.total = response.data.last_page;
                });
        },
        onPageChange() {
            this.alluser();
        },

        find() {
            this.wait = true;
            this.page = 1;
            this.total = 0;
            this.alluser();
            this.wait = false;
        },
        modal_carga() {
            this.modal = true;
        }
    }
};
