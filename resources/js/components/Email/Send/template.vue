<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Redactar E-mail</div>

                   

                   

                    <div class="card-body">

                        <form class="row g-3" id="miForm" ref="textareaform">
                          
                            <input type="hidden" v-model="form.iduser" />
                            
                             <div class="col-md-12">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Para</label
                                >
                                <input
                                    type="textarea"
                                    class="form-control"
                                    id="cedula"
                                    placeholder="Intoduzca el destino"
                                    v-model="form.destino"
                                   
                                    
                                />
                                
                            </div>
                              <div class="col-md-12">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Asunto</label
                                >
                                <input
                                    type="textarea"
                                    class="form-control"
                                    id="cedula"
                                    placeholder="Intoduzca el destino"
                                    v-model="form.asunto"
                                   
                                    
                                />
                                
                            </div>
                            
                            <div class="col-md-12">
                                <label
                                    for="validationDefault02"
                                    class="form-label"
                                    >Mensaje</label
                                >
                               
                                <textarea class="form-control" name="textarea" v-model="form.mensaje" placeholder="Intoduzca el texto" rows="5" cols="100"></textarea>
                            </div>
                            

                            

                            
                            <br />
                            <br />
                            <br />
                            <div class="col-md-12">
                                <button
                                    class="btn btn-success"
                                    @click.prevent="enviar()"
                                >
                                    Enviar
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


