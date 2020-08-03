<?php
/* @var $this yii\web\View */

//$this->registerCssFile("https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css", ['position' => $this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/sweetalert2@9", ['position' => $this::POS_HEAD]);

?>

<div id="app" class="container">
    <b-container class="mb-3 bv-example-row bg-success text-center text-light">
        <b-row>
            <b-col>
                <h1>{{msg}}
                    <b-icon icon="pencil-square" animation="throb" font-scale="1" class="rounded-circle  p-2" variant="light"></b-icon>
                </h1>
            </b-col>
        </b-row>
    </b-container>

    <b-modal v-model="showModal" title="Patologia Paciente" :header-bg-variant="headerBgVariant" :header-text-variant="headerTextVariant" :body-bg-variant="bodyBgVariant" :body-text-variant="bodyTextVariant" :footer-bg-variant="footerBgVariant" :footer-text-variant="footerTextVariant" id="my-modal">
        <form action="">
            <div class="form-group">
                <label for="Nombre">Nombre Paciente</label>
                <input v-model="pacientep.paciente_id" value="" type="text" name="nombre" id="nombre" class="form-control" aria-describedby="helpId">
                <!-- <small id="titlehelpId" class="text-muted"></small> -->
                <!-- <span class="text-danger" v-if="errors.nombre"> {{ errors.nombre }} </span> -->
            </div>
            <div class="form-group">
                <label for="patologia">Patologia</label>
                <input v-model="pacientep.patologia_id" type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese Patologia" aria-describedby="helpId">
                <!-- <small id="bodyhelpId" class="text-muted"></small> -->
                <!-- <span class="text-danger" v-if="errors.direccion">{{ errors.direccion }}</span> -->
                <!-- </div> -->
                <!-- <div class="form-group">
                <label for="telefono">Descripcion</label>
                <input v-model="obrasocial.telefono" type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese num de Tel" aria-describedby="helpId">
                <!-- <small id="bodyhelpId" class="text-muted"></small> -->
                <!-- <span class="text-danger" v-if="errors.detalle">{{ errors.telefono }}</span> -->
            </div>
        </form>
        <template v-slot:modal-footer="{ok, cancel, hide}">
            <b-button v-if="isNewRecord" @click="addPacientePatologia()" variant="warning" size="lg">Agregar</b-button>
        </template>
    </b-modal>
    <p>
        <button @click="showModal=true" type="button" class="btn btn-primary">Nuevo</button>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Paciente</th>
                <th>Patologia</th>
            </tr>
            <tr>
                <td>
                    <input v-on:change="getPaciente()" class="form-control" v-model="filter.id_paciente">
                </td>
            </tr>
        </thead>

        <tbody>
            <tr v-for="(pps,key) in pacienteps" v-bind:key="pps.id_paciente_patologia">
                <td scope="row">{{pps.id_paciente_patologia.paciente.nombre}}</td>
                <td>{{pps.nombre}}</td>
                <td>{{obra.direccion}}</td>
                </td>

            </tr>
        </tbody>
    </table>
    <b-pagination v-model="currentPage" :total-rows="pagination.total" :per-page="pagination.perPage" aria-controls="my-table"></b-pagination>

</div>

<script>
    var app = new Vue({

        el: "#app",
        data: function() {
            return {
                msg: "Paciente-Patologias",
                pacientes: [],
                paciente: [],
                patologias: [],
                pacientep: {},
                filter: {},
                errors: {},
                isNewRecord: true,
                currentPage: 1,
                pagination: {},
                showModal: false,
                headerBgVariant: 'dark',
                headerTextVariant: 'warning',
                bodyBgVariant: 'info',
                bodyTextVariant: 'dark',
                footerBgVariant: 'dark',
            }
        },
        mounted() {
            this.getPacientePatologia();
            this.getPaciente();
            this.getPatologia();
        },

        methods: {
            normalizeErrors: function(errors) {
                var allErrors = {};
                for (var i = 0; i < errors.length; i++) {
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;

            },
            getPaciente: function() {
                var self = this;
                axios.get('/apiv1/pacientes?page=' + self.currentPage, {
                        params: self.filter
                    })
                    .then(function(response) {
                        console.log(response.data);
                        console.log("Datos Paciente");
                    })
                    .catch(function(error) {
                        // handle error
                        self.errors = self.normalizeErrors(error.response.data);
                        console.log(self.errors);
                    })
                    .then(function() {
                        // always executed
                    });
            },
            getPacientePatologia: function() {
                var self = this;
                axios.get('/apiv1/pacientepatologias?page=' + self.currentPage, {
                        params: self.filter
                    })
                    .then(function(response) {
                        console.log(response.data);
                        console.log("Datos Paciente-Patologias");
                        self.pagination.total = parseInt(response.headers['x-pagination-total-count']);
                        self.pagination.totalPages = parseInt(response.headers['x-pagination-page=count']);
                        self.pagination.perPage = parseInt(response.headers['x-pagination-per-page']);
                        self.pacientes = response.data;
                    })
                    .catch(function(error) {
                        // handle error
                        self.errors = self.normalizeErrors(error.response.data);
                        console.log(self.errors);
                    })
                    .then(function() {
                        // always executed
                    });
            },
            getPatologia: function() {
                var self = this;
                axios.get('/apiv1/patologias?page=' + self.currentPage, {
                        params: self.filter
                    })
                    .then(function(response) {
                        console.log(response.data);
                        console.log("Datos Patologia");
                    })
                    .catch(function(error) {
                        // handle error
                        self.errors = self.normalizeErrors(error.response.data);
                        console.log(self.errors);
                    })
                    .then(function() {
                        // always executed
                    });
            },
            editPacientePatologia: function(key) {
                this.pacientep = Object.assign({}, this.pacientes[key]);
                this.pacientep.key = key;
                this.isNewRecord = false;
            },
            addPacientePatologia: function() {
                var self = this;
                axios.post('/apiv1/pacientepatologias', self.pacientep)
                    .then(function(response) {
                        // handle success
                        console.log(response.data);
                        self.getPacientePatologia()
                        // self.posts.unshift(response.data);
                        self.pacientep = {};
                        self.showModal = false;
                    })
                    .catch(function(error) {
                        // handle error
                        self.errors = self.normalizeErrors(error.response.data);
                        console.log(self.errors);

                    })
                    .then(function() {
                        // always executed
                    });
                Swal.fire({
                    title: 'Se creo el registro correctamente',
                    icon: 'success',
                    showConfirmButton: true,
                    confirmButtonText: 'Aceptar',
                })
            },
        }

    })
</script>