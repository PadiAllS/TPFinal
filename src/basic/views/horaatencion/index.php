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
                    <label for="dia">Dia de la Semana</label>
                    <b-form-select v-model="horaatencion.dia" :options="dias"></b-form-select>
                    <div class="mt-3"><strong>{{ horaatencion.dia }}</strong></div>
                </div>
                <div class="form-group">
                    <label for="desde">Desde</label>
                    <input v-model="horaatencion.desde" type="time" name="desde" id="desde" class="form-control" placeholder="Ingrese descripcion" aria-describedby="helpId">
                    <small id="bodyhelpId" class="text-muted"></small>
                    <span class="text-danger" v-if="errors.desde"> {{ errors.desde }} </span>
                </div>
                <div class="form-group">
                    <label for="hasta">Hasta</label>
                    <input v-model="horaatencion.hasta" type="time" name="hasta" id="hasta" class="form-control" placeholder="Ingrese descripcion" aria-describedby="helpId">
                    <small id="bodyhelpId" class="text-muted"></small>
                    <span class="text-danger" v-if="errors.hasta"> {{ errors.hasta }} </span>
                </div>
            </form>
            <template v-slot:modal-footer="{ok, cancel, hide}">
                <button v-if="isNewRecord"  @click="addHoraatencion()" type="button" class="btn btn-primary m-3">Crear</button>
                <button v-if="!isNewRecord" @click="isNewRecord = !isNewRecord" v-on:click="horaatencion={}"  type="button" class="btn btn-success m-3">Nuevo</button>
                <button v-if="!isNewRecord" @click="updateHoraatencion(horarios.id_hatencion)" type="button" class="btn btn-primary m-3">Actualizar</button>

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
            <th>Dia</th>
            <th>Desde</th>
            <th>Hasta</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>
                <input v-on:change="getHoraatencion()" class="form-control" v-model="filter.id_hatencion">
            </td>
            <td>
                <input v-on:change="getHoraatencion()" class="form-control" v-model="filter.dia">
            </td>
            <td>
                <input v-on:change="getHoraatencion()" class="form-control" v-model="filter.desde">
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>

        <tbody>
        <tr v-for="(hate,key) in horarios" v-bind:key="hate.id_hatencion">
            <td scope="row">{{hate.id_hatencion}}</td>
            <td>{{hate.dia}}</td>
            <td>{{hate.desde}}</td>
            <td>{{hate.hasta}}</td>
            
            <td>
                <button @click="showModal=true" v-on:click="editHoraatencion(key)" type="button" class="btn btn-warning">Editar</button>
            </td>
            <td>
                <button v-on:click="deleteHoraatencion(hate.id_hatencion)" type="button" class="btn btn-danger">Borrar</button>
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
                msg: "Horarios de Atencion",
                horarios: [],
                horaatencion:{},
                filter:{},
                errors:{},
                isNewRecord:true,
                currentPage: 1,
                pagination:{},
                showModal:false,
                dias:['Lunes','Martes','Miercoles','Jueves','Viernes']
            }
        },
        mounted() {
            this.getHoraatencion();
        },
        watch:{
            currentPage: function(){
                this.getHoraatencion();
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
            getHoraatencion: function(){
                var self = this;
                axios.get('/apiv1/horaatencion?page='+self.currentPage,{params:self.filter})
                    .then(function (response) {
                        console.log(response.data);
                        self.pagination.total = parseInt(response.headers['x-pagination-total-count']);
                        self.pagination.totalPages = parseInt(response.headers['x-pagination-page=count']);
                        self.pagination.perPage = parseInt(response.headers['x-pagination-per-page']);
                        self.horarios = response.data;
                    })
                    .catch(function (error) {
                        self.errors = self.normalizeErrors(error.response.data);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            deleteHoraatencion: function(id){
                var self = this;
                axios.delete('/apiv1/horaatencions/'+ id)
                    .then(function (response) {
                        console.log("borra horarios id: "+ id);
                        console.log(response.data);
                        self.getHoraatencion();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            editHoraatencion: function (key) {
                this.horaatencion = Object.assign({},this.horarios[key]);
                this.horaatencion.key = key;
                this.isNewRecord = false;
            },
            addHoraatencion: function(){
                var self = this;
                axios.post('/apiv1/horaatencion',self.horaatencion)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getHoraatencion()
                        // self.posts.unshift(response.data);
                        self.horaatencion = {};
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
            updateHoraatencion: function (key) {
                var self = this;
                const params = new URLSearchParams();
                params.append('dia', self.horaatencion.dia);
                params.append('desde', self.horaatencion.desde);
                params.append('hasta', self.horaatencion.hasta);
                axios.patch('/apiv1/horaatencions/'+key,params)
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        self.getHoraatencion();
                        self.horaatencion = {};
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
