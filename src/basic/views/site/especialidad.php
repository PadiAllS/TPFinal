<?php
/* @var $this yii\web\View */

//$this->registerCssFile("https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

?>

<div id="app" class="container">
    <h1>{{msg}}</h1>
    <!-- Button trigger modal -->
    <div>
        <div class="col-6 m-auto pb-3">
            <form action="">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input v-model="especialidad.nombre" type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese especialidad" aria-describedby="helpId">
                    <small id="titlehelpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="detalle">Descripcion</label>
                    <input v-model="especialidad.detalle" type="text" name="detalle" id="detalle" class="form-control" placeholder="Ingrese descripcion" aria-describedby="helpId">
                    <small id="bodyhelpId" class="text-muted"></small>
                    <span></span>
                </div>
                <button v-if="isNewRecord"  @click="addEspecialidad()" type="button" class="btn btn-primary m-3">Crear</button>
                <button v-if="!isNewRecord"  @click="especialidad={}" type="button" class="btn btn-success m-3">Nuevo</button>
                <button v-if="!isNewRecord" @click="updateEspecialidad(especialidad.id_especialidad)" type="button" class="btn btn-primary m-3">Actualizar</button>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(espec,key) in especialidades" v-bind:key="espec.id_especialidad">
            <td scope="row">{{espec.id_especialidad}}</td>
            <td>{{espec.nombre}}</td>
            <td>{{espec.detalle}}</td>
            
            <td>
                <button v-on:click="editEspecialidad(key)" type="button" class="btn btn-warning">Editar</button>
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
                isNewRecord:true,
            }
        },
        mounted() {
            this.getEspecialidades();
        },
        methods: {
            getEspecialidades: function(){
                var self = this;
                axios.get('/apiv1/especialidads')
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        console.log("trage todas las especialidades");
                        self.especialidades = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
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
                        console.log(error);

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
