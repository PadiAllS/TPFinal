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
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input v-model="especialidad.nombre" type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese especialidad" aria-describedby="helpId">
                        <small id="titlehelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.nombre"> {{ errors.nombre }} </span>
                    </div>
                    <div class="form-group">
                        <label for="detalle">Descripcion</label>
                        <input v-model="especialidad.detalle" type="text" name="detalle" id="detalle" class="form-control" placeholder="Ingrese descripcion" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.detalle">{{ errors.detalle }}</span>
                    </div>
                    
                </form>
                <template v-slot:modal-footer="{ok, cancel, hide}">
                    <button v-if="isNewRecord"  @click="addEspecialidad()" type="button" class="btn btn-primary m-3">Crear</button>
                    <button v-if="!isNewRecord" @click="isNewRecord = !isNewRecord" v-on:click="especialidad={}" type="button" class="btn btn-success m-3">Nuevo</button>
                    <button v-if="!isNewRecord" @click="updateEspecialidad(especialidad.id_especialidad)" type="button" class="btn btn-primary m-3">Actualizar</button>

                </template>      
        </b-modal>

        <b-pagination
            v-model="currentPage"
            :total-rows="pagination.total"
            :per-page="pagination.perPage"
            aria-controls="my-table"
        ></b-pagination>

        <p>
            <button @click="showModal=true" type="button" class="btn btn-primary">Nuevo</button>
        </p>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>
                    <input v-on:change="getEspecialidades()" class="form-control" v-model="filter.id_especialidad">
                </td>
                <td>
                    <input v-on:change="getEspecialidades()" class="form-control" v-model="filter.nombre">
                </td>
                <td>
                    <input v-on:change="getEspecialidades()" class="form-control" v-model="filter.detalle">
                </td>
                <td></td>
                <td></td>
            </tr>
            </thead>

            <tbody>
            <tr v-for="(espec,key) in especialidades" v-bind:key="espec.id_especialidad">
                <td scope="row">{{espec.id_especialidad}}</td>
                <td>{{espec.nombre}}</td>
                <td>{{espec.detalle}}</td>
                
                <td>
                    <button @click="showModal=true" v-on:click="editEspecialidad(key)" type="button" class="btn btn-warning">Editar</button>
                </td>
                <td>
                    <button v-on:click="deleteEspecialidad(espec.id_especialidad)" type="button" class="btn btn-danger">Borrar</button>
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
                msg: "Especialidades",
                especialidades: [],
                especialidad:{},
                filter:{},
                errors:{},
                isNewRecord:true,
                currentPage: 1,
                pagination:{},
                showModal: false,
            }
        },
        mounted() {
            this.getEspecialidades();
        },
        watch:{
            currentPage: function(){
                this.getPatologias();
            }
        },
        methods: {
            normalizeErrors: function(errors){
                var allErrors = {};
                for(var i = 0 ; i < errors.length; i++){
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;

            },
            getEspecialidades: function(){
                var self = this;
                axios.get('/apiv1/especialidads?page='+self.currentPage,{params:self.filter})
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        console.log("traje todas las especialidades");
                        self.pagination.total = parseInt(response.headers['x-pagination-total-count']);
                        self.pagination.totalPages = parseInt(response.headers['x-pagination-page=count']);
                        self.pagination.perPage = parseInt(response.headers['x-pagination-per-page']);
                        self.especialidades = response.data;
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
            deleteEspecialidad: function(id){
                var self = this;
                axios.delete('/apiv1/especialidads/'+ id)
                    .then(function (response) {
                        // handle success
                        console.log("borra especialidad id: "+ id);
                        console.log(response.data);
                        self.getEspecialidades();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            editEspecialidad: function (key) {
                this.especialidad = Object.assign({},this.especialidades[key]);
                this.especialidad.key = key;
                this.isNewRecord = false;
            },
            addEspecialidad: function(){
                var self = this;
                axios.post('/apiv1/especialidads',self.especialidad)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getEspecialidades()
                        // self.posts.unshift(response.data);
                        self.especialidad = {};
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
            updateEspecialidad: function (key) {
                var self = this;
                const params = new URLSearchParams();
                params.append('nombre', self.especialidad.nombre);
                params.append('detalle', self.especialidad.detalle);
                axios.patch('/apiv1/especialidads/'+key,params)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getEspecialidades();
                        self.especialidad = {};
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