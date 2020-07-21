<?php
/* @var $this yii\web\View */

//$this->registerCssFile("https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

?>

<div id="app" class="container">
    <h1>{{msg}}</h1>
    <!-- Button trigger modal -->
    <b-modal v-model="showModal" id="my-modal">
        
        <form action="">
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input v-model="medico.nombre" type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingreseo nombre" aria-describedby="helpId">
                        <small id="titlehelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.nombre"> {{ errors.nombre }} </span>
                    </div>
                </div>
                
                <div class="col md-6">
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input v-model="medico.apellido" type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.apellido">{{ errors.apellido }}</span>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col md-5">
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input v-model="medico.direccion" type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingreseo direccion" aria-describedby="helpId">
                        <small id="titlehelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.direccion"> {{ errors.direccion }} </span>
                    </div>
                </div>
                                
                <div class="col md-5">
                    <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <input v-model="medico.localidad" type="text" name="localidad" id="localidad" class="form-control" placeholder="Ingrese localidad" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.localidad">{{ errors.localidad }}</span>
                    </div>
                </div>
                <div class="col md-2">
                    <div class="form-group">
                        <label for="codpos">Cod.Postal</label>
                        <input v-model="medico.codpos" type="text" name="codpos" id="codpos" class="form-control" placeholder="Ingrese C.P." aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.codpos">{{ errors.codpos }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-3">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Nac.</label>
                        <input v-model="medico.fecha_nacimiento" type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Ingrese fecha nacimiento" aria-describedby="helpId">
                        <small id="titlehelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.fecha_nacimiento"> {{ errors.fecha_nacimiento }} </span>
                    </div>
                </div>
                <div class="col md-3">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <input v-model="medico.sexo" type="text" name="sexo" id="sexo" class="form-control" placeholder="Ingrese sexo" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.sexo">{{ errors.sexo }}</span>
                    </div>
                </div>
                <div class="col md-2">
                    <div class="form-group">
                        <label for="tipo_doc">Tipo Doc.</label>
                        <input v-model="medico.tipo_doc" type="text" name="tipo_doc" id="tipo_doc" class="form-control" placeholder="Ingrese tipo doc." aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.tipo_doc">{{ errors.tipo_doc }}</span>
                    </div>                        
                </div>
                <div class="col md-4">
                    <div class="form-group">
                        <label for="nro_doc">Nro. Doc.</label>
                        <input v-model="medico.nro_doc" type="text" name="nro_doc" id="nro_doc" class="form-control" placeholder="Ingrese nro. doc." aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.nro_doc">{{ errors.nro_doc }}</span>
                    </div>                        
                </div>
            </div>
                            
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="telefono">telefono</label>
                        <input v-model="medico.telefono" type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese telefono fijo" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.telefono">{{ errors.telefono }}</span>
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input v-model="medico.celular" type="text" name="celular" id="celular" class="form-control" placeholder="Ingrese telefono mobil" aria-describedby="helpId">
                        <small id="titlehelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.celular"> {{ errors.celular }} </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-2">
                    <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input v-model="medico.matricula" type="text" name="matricula" id="matricula" class="form-control" placeholder="Ingrese su matricula" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.matricula">{{ errors.matricula }}</span>
                    </div>
                </div>
                <div class="col md-5">
                    <div class="form-group">
                        <label for="mail">E-mail</label>
                        <input v-model="medico.mail" type="mail" name="mail" id="mail" class="form-control" placeholder="Ingrese su mail" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.mail">{{ errors.mail }}</span>
                    </div>
                </div>
                <div class="col md-5">
                    <div class="form-group">
                        <label for="especialidad">Especialidad</label>
                            <select class="form-control" v-model="medico.especialidad_id">  
                                <option :value="espe.id_especialidad" v-for="espe in options">
                                    {{espe.nombre}}
                                </option>
                            </select>
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span></span>
                    </div>
                </div>
            </div>
            
        </form>
        <template v-slot:modal-footer="{ok, cancel, hide}">
            <div v-if="consultaMedico">
                <button v-if="isNewRecord"  @click="addMedico()" type="button" class="btn btn-primary m-3">Crear</button>
                <button v-if="!isNewRecord" @click="isNewRecord = !isNewRecord" v-on:click="medico={}"  type="button" class="btn btn-success m-3">Nuevo</button>
                <button v-if="!isNewRecord" @click="updateMedico(medico.id_medico)" type="button" class="btn btn-primary m-3">Actualizar</button>
            </div>
        </template>     
    </b-modal>
    
    <p>
        <button @click="showModal=true" type="button" class="btn btn-primary">Nuevo</button>
    </p>

    <b-pagination
        v-model="currentPage"
        :total-rows="pagination.total"
        :per-page="pagination.perPage"
        aria-controls="my-table">
    </b-pagination>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Especialidad</>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>
                <input v-on:change="getMedicos()" class="form-control" v-model="filter.id_medico">
            </td>
            <td>
                <input v-on:change="getMedicos()" class="form-control" v-model="filter.nombre">
            </td>
            <td>
                <input v-on:change="getMedicos()" class="form-control" v-model="filter.apellido">
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>

        <tbody>
        <tr v-for="(medic,key) in medicos" v-bind:key="medic.id_medico">
            <td scope="row">{{medic.id_medico}}</td>
            <td>{{medic.nombre}}</td>
            <td>{{medic.apellido}}</td>
            <td></td>
                        
            <td>
                <button @click="showModal=true" v-on:click="editMedico(key)" type="button" class="btn btn-success">Detalle</button>
            </td>
            <td>
                <button @click="showModal=true" v-on:click="editMedico(key)" type="button" class="btn btn-warning">Editar</button>
            </td>
            <td>
                <button v-on:click="deleteMedico(medic.id_medico)" type="button" class="btn btn-danger">Borrar</button>
            </td>
        </tr>
        </tbody>
    </table>

</div>

<script>

    var app = new Vue({

        el: "#app",
        data: function () {
            return {
                msg: "Medicos",
                medicos: [],
                medico:{},
                filter:{},
                errors:{},
                isNewRecord:true,
                currentPage: 1,
                pagination:{},
                options:[],
                showModal: false,
                consultaMedico:true,
            }
        },
        mounted() {
            this.getMedicos();
            this.getOptions();
        },
        methods: {
            getOptions(){
                var self = this;
                axios.get('/apiv1/especialidads')
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        console.log("trage todas las especialidades");
                        // self.especialidades = response.data;
                        self.options = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            normalizeErrors: function(errors){
                var allErrors = [];
                for(var i = 0 ; i < errors.length; i++){
                    allErrors[errors[i].field] = errors[i].message;
                }

            },
            getMedicos: function(){
                var self = this;
                axios.get('/apiv1/medicos?page='+self.currentPage,{params:self.filter})
                    .then(function (response) {
                    // handle success
                        console.log(response.data);
                        console.log("traje todas los medicos");
                        self.pagination.total = parseInt(response.headers['x-pagination-total-count']);
                        self.pagination.totalPages = parseInt(response.headers['x-pagination-page=count']);
                        self.pagination.perPage = parseInt(response.headers['x-pagination-per-page']);
                        self.medicos = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        self.errors = self.normalizeErrors(error.response.data);
                        console.log(self.errors);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            deleteMedico: function(id){
                var self = this;
                axios.delete('/apiv1/medicos/'+ id)
                    .then(function (response) {
                        // handle success
                        console.log("borra medico id: "+ id);
                        console.log(response.data);
                        self.getMedicos();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            editMedico: function (key) {
                this.medico = Object.assign({},this.medicos[key]);
                this.medico.key = key;
                this.isNewRecord = false;
            },
            addMedico: function(){
                var self = this;
                axios.post('/apiv1/medicos',self.medico)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getMedicos()
                        // self.posts.unshift(response.data);
                        self.medico = {};
                    })
                    .catch(function (error) {
                        // handle error
                        self.errors = self.normalizeErrors(error.response.data);
                        console.log(self.errors);

                    })
                    .then(function () {
                        // always executed
                    });
            },
            updateMedico: function (key) {
                var self = this;
                const params = new URLSearchParams();
                params.append('nombre', self.medico.nombre);
                params.append('apellido', self.medico.apellido);
                params.append('direccion', self.medico.direccion);
                params.append('localidad', self.medico.localidad);
                params.append('codpos', self.medico.codpos);
                params.append('telefono', self.medico.telefono);
                params.append('celular', self.medico.celular);
                params.append('fecha_nacimiento', self.medico.fecha_nacimiento);
                params.append('sexo', self.medico.sexo);
                params.append('tipo_doc', self.medico.tipo_doc);
                params.append('nro_doc', self.medico.nro_doc);
                params.append('mail', self.medico.mail);
                params.append('matricula', self.medico.matricula);
                params.append('especialidad', self.medico.especialidad_id);
                axios.patch('/apiv1/medicos/'+key,params)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getMedicos();
                        self.medico = {};
                        self.isNewRecord = true;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

            }

        }

    })

</script>