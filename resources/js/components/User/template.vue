<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Usuarios</div>

                    <v-form>
                        <v-toolbar flat>
                            <v-spacer></v-spacer>
                            <v-text-field
                                label="Buscar"
                                :disabled="busy"
                                v-on:keyup="find"
                                v-model="search"
                                color="dark"
                                hide-details
                                outlined
                                dense
                            ></v-text-field>

                            <v-spacer></v-spacer>
                        </v-toolbar>
                    </v-form>

                    <div class="card-body">
                        <button
                            class="btn btn-success"
                            data-toggle="modal"
                            @click.prevent="showuser(user)"
                        >
                            <i class="fas fa-plus"></i>
                            Nuevo Usuario
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cedula</th>
                                     <th scope="col">Nombre</th>
                                     <th scope="col">Celular</th>
                                     <th scope="col">Email</th>
                                      <th scope="col">Edad</th>
                                      <th scope="col">Ciudad</th>
                                   

                                   
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                  
                                    <td>{{user.id }}</td>
                                    <td>{{ user.cedula }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.celular }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.age }}</td>
                                    <td>{{ user.city.name }}</td>
                                   
                                   

                                    <td
                                        @click="showuser(user)"
                                        class="btn btn-info "
                                    >
                                        <i class="far fa-edit"></i>
                                    </td>
                                    <td
                                        @click.prevent="deleteuser(user)"
                                        class="btn btn-danger"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <v-pagination
                        v-model="pagination.current"
                        :length="pagination.total"
                        @input="onPageChange"
                    ></v-pagination>
                </div>
            </div>
        </div>

        <!-- Moda Carga de Datos -->

        <div id="myModalcarga" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <!-- Modal content-->
                <div class="modal-content">
                    <h5 class="modal-title" id="Cargar Usuarios">
                        &nbsp;&nbsp;&nbsp; Información del Usuario
                    </h5>
                    <div class="modal-header">
                        <form class="row g-3" id="miForm" ref="textareaform">
                            <input type="hidden" v-model="form.status" />
                            <input type="hidden" v-model="form.id" />
                            
                            <div class="col-md-3" v-if="this.form.status==1">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Cedula</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="cedula"
                                    placeholder="Intoduzca Cedula"
                                    v-model="form.cedula"
                                    
                                />
                            </div>
                             <div class="col-md-3" v-if="this.form.status==0">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Cedula</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="cedula"
                                    placeholder="Intoduzca Cedula"
                                    v-model="form.cedula"
                                    readonly
                                    
                                />
                            </div>
                            <div class="col-md-3">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Nombre</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="Intoduzca Nombre"
                                    v-model="form.name"
                                />
                            </div>
                            <div class="col-md-3">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >N° Telefono (Opcional)</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="celudar"
                                    placeholder="Intoduzca Numero de Telefono"
                                    v-model="form.celular"
                                    maxlength="10"
                                    
                                    
                                />
                            </div>
                            <div class="col-md-3" v-if="this.form.status==1">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >E-mail</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    v-model="form.email"
                                    
                                />
                            </div>
                            <div class="col-md-3" v-if="this.form.status==0">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >E-mail</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    v-model="form.email"
                                    readonly
                                />
                            </div>
                            <div class="col-md-4">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    v-model="form.password"
                                    required
                                />
                            </div>
                            <div class="col-md-4">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Confirmacion de Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    v-model="form.password2"
                                    required
                                />
                            </div>
                            <div class="col-md-4">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Fecha de Nacimiento</label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    id="fecha_de_nacimiento"
                                    v-model="form.fecha_de_nacimiento"
                                    required
                                />
                            </div>
                             <div class="col-md-4">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Pais</label
                                >
                                 <select class='form-control' v-model='form.country'  @change='getstate()'>
                                     <option v-for='country in countrys' :key='country.id' :value='country.id'>{{ country.name }}</option>
                                </select>
                               
                            </div>
                            <div class="col-md-4">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Estado</label
                                >
                               <select class='form-control' v-model='form.state'  @change='getcity()'>
                                    <option v-for='state in states' :key='state.id' :value='state.id'>{{ state.name }}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Ciudad</label
                                >
                                <select class='form-control' v-model='form.city'>
                                    <option v-for='city in citys' :key='city.id' :value='city.id'>{{ city.name }}</option>
                                </select>
                               
                            </div>

                            

                            
                            <br />
                            <br />
                            <br />
                            <div class="col-md-12">
                                <button
                                    class="btn btn-success"
                                    @click.prevent="Adduser()"
                                >
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./script.js"></script>


