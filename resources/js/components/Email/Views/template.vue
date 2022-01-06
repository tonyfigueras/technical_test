<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Emails</div>

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
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Destino</th>
                                     <th scope="col">Asunto</th>
                                     <th scope="col">Mensaje</th>
                                     <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="mail in mails" :key="mail.id">
                                  
                                    <td>{{mail.id }}</td>
                                    <td>{{ mail.destino }}</td>
                                    <td>{{ mail.asunto }}</td>
                                    <td>{{ mail.mensaje }}</td>
                                    <td  v-if="mail.status=='No enviado'"><span class="badge bg-danger">No enviado</span></td>
                                    <td  v-if="mail.status=='Enviado'"><span class="badge bg-success">Enviado</span></td>
                                    
                                   
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

        

        
    </div>
</template>

<script src="./script.js"></script>


