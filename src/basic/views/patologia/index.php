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
                    <input v-model="patologia.nombre" type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese patologia" aria-describedby="helpId">
                    <span class="text-danger" v-if="errors.nombre"> {{ errors.nombre }} </span>
                </div>
                <div class="form-group">
                    <label for="detalle">Descripcion</label>
                    <input v-model="patologia.detalle" type="text" name="detalle" id="detalle" class="form-control" placeholder="Ingrese descripcion" aria-describedby="helpId">
                    <small id="bodyhelpId" class="text-muted"></small>
                    <span class="text-danger" v-if="errors.detalle"> {{ errors.detalle }} </span>
                </div>                
            </form>
            <template v-slot:modal-footer="{ok, cancel, hide}">
                <button v-if="isNewRecord"  @click="addPatologia()" type="button" class="btn btn-primary m-3">Crear</button>
                <button v-if="!isNewRecord" @click="isNewRecord = !isNewRecord" v-on:click="patologia={}"  type="button" class="btn btn-success m-3">Nuevo</button>
                <button v-if="!isNewRecord" @click="updatePatologia(patologia.id_patologia)" type="button" class="btn btn-primary m-3">Actualizar</button>

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
                <input v-on:change="getPatologias()" class="form-control" v-model="filter.id_patologia">
            </td>
            <td>
                <input v-on:change="getPatologias()" class="form-control" v-model="filter.nombre">
            </td>
            <td>
                <input v-on:change="getPatologias()" class="form-control" v-model="filter.detalle">
            </td>
            <td></td>
            <td></td>
        </tr>
        </thead>

        <tbody>
        <tr v-for="(patol,key) in patologias" v-bind:key="patol.id_patologia">
            <td scope="row">{{patol.id_patologia}}</td>
            <td>{{patol.nombre}}</td>
            <td>{{patol.detalle}}</td>
            
            <td>
                <button @click="showModal=true" v-on:click="editPatologia(key)" type="button" class="btn btn-warning">Editar</button>
            </td>
            <td>
                <button v-on:click="deletePatologia(patol.id_patologia)" type="button" class="btn btn-danger">Borrar</button>
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
                msg: "Patologias",
                patologias: [],
                patologia:{},
                filter:{},
                errors:{},
                isNewRecord:true,
                currentPage: 1,
                pagination:{},
                showModal:false,
            }
        },
        mounted() {
            this.getPatologias();
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
            getPatologias: function(){
                var self = this;
                axios.get('/apiv1/patologia?page='+self.currentPage,{params:self.filter})
                    .then(function (response) {
                        console.log(response.data);
                        self.pagination.total = parseInt(response.headers['x-pagination-total-count']);
                        self.pagination.totalPages = parseInt(response.headers['x-pagination-page=count']);
                        self.pagination.perPage = parseInt(response.headers['x-pagination-per-page']);
                        self.patologias = response.data;
                    })
                    .catch(function (error) {
                        self.errors = self.normalizeErrors(error.response.data);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            deletePatologia: function(id){
                var self = this;
                axios.delete('/apiv1/patologias/'+ id)
                    .then(function (response) {
                        console.log("borra patologia id: "+ id);
                        console.log(response.data);
                        self.getPatologias();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            editPatologia: function (key) {
                this.patologia = Object.assign({},this.patologias[key]);
                this.patologia.key = key;
                this.isNewRecord = false;
            },
            addPatologia: function(){
                var self = this;
                axios.post('/apiv1/patologias',self.patologia)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getPatologias()
                        // self.posts.unshift(response.data);
                        self.patologia = {};
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error.response.data);
                        self.errors = self.normalizeErrors(error.response.data);
                        console.log(self.errors);

                    })
                    .then(function () {
                        // always executed
                    });
            },
            updatePatologia: function (key) {
                var self = this;
                const params = new URLSearchParams();
                params.append('nombre', self.patologia.nombre);
                params.append('detalle', self.patologia.detalle);
                axios.patch('/apiv1/patologias/'+key,params)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getPatologias();
                        self.patologia = {};
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
