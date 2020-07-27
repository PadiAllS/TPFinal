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
                    <b-icon icon="person-check-fill" animation="throb" font-scale="1" class="rounded-circle  p-2" variant="light"></b-icon>
                </h1>
            </b-col>

        </b-row>

    </b-container>

    <b-modal v-model="showModal" title="Sistema de Pacientes" :header-bg-variant="headerBgVariant" :header-text-variant="headerTextVariant" :body-bg-variant="bodyBgVariant" :body-text-variant="bodyTextVariant" :footer-bg-variant="footerBgVariant" :footer-text-variant="footerTextVariant" size="xl" id="my-modal">
        <form action="">
            <div class="form-group">
                <div class="row">
                    <div class="col xs-12 sm-12 md-6">
                        <label for="nombre">Nombre</label>
                        <input v-model="paciente.nombre" type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre de la paciente" aria-describedby="helpId">
                        <small id="titlehelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.nombre"> {{ errors.nombre }} </span>
                    </div>
                    <div class="col xs-12 sm-12 md-6">
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input v-model="paciente.apellido" type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese Apellido" aria-describedby="helpId">
                            <small id="bodyhelpId" class="text-muted"></small>
                            <span class="text-danger" v-if="errors.apellido">{{ errors.apellido }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <div class="col  md-4">
                        <label for="sexo">Sexo</label>
                        <b-form-select v-model="paciente.sexo" :options="sexos" id="sexo"></b-form-select>
                        <!-- <input v-model="paciente.sexo" type="text" name="sexo" id="sexo" class="form-control" placeholder="Sexo de la persona" aria-describedby="helpId"> -->
                        <!-- <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.sexo">{{ errors.sexo }}</span> -->
                        <!-- <div class="mt-3"><strong>{{ paciente.sexo }}</strong></div> -->
                    </div>
                    <div class="col md-4">
                        <div class="form-group text-center">
                            <label for="fecha_nacimiento">Fecha-Nacimiento</label>
                            <input v-model="paciente.fecha_nacimiento" type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Ingrese su fecha de nacimiento" aria-describedby="helpId">
                            <small id="bodyhelpId" class="text-muted"></small>
                            <span class="text-danger" v-if="errors.fecha_nacimiento">{{ errors.fecha_nacimiento }}</span>

                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="form-group text-center">
                            <label for="obrasocial">Selecciona la Obra-Social</label>
                            <select class="form-control" v-model="paciente.obra_social_id">
                                <option :value="pac.id_obra_social" v-for="pac in references">
                                    {{pac.nombre}}
                                </option>
                            </select>
                            <small id="bodyhelpId" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col md-4">
                        <label for="sexo">Num Afiliado</label>
                        <input v-model="paciente.num_afil" type="text" name="num_afil" id="num_afil" class="form-control" placeholder="Ingrese el num del afiliado" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.num_afil">{{ errors.num_afil }}</span>

                    </div>
                    <div class="col md-4">
                        <div class="form-group">
                            <label for="tipo_doc">Tipo DOC</label>
                            <b-form-select v-model="paciente.tipo_doc" :options="docs" id="doc"></b-form-select>
                            <div class="mt-3"><strong>{{ paciente.tipo_doc }}</strong></div>
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="form-group">
                            <label for="sexo">Num DOC</label>
                            <input v-model="paciente.num_doc" type="text" name="num_doc" id="num_doc" class="form-control" placeholder="Ingrese num de documento" aria-describedby="helpId">
                            <small id="bodyhelpId" class="text-muted"></small>
                            <span class="text-danger" v-if="errors.num_doc">{{ errors.num_doc }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col md-4">
                        <label for="direccion">Direccion</label>
                        <input v-model="paciente.direccion" type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese Direccion" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.direccion">{{ errors.direccion }}</span>
                    </div>
                    <div class="col md-4">
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input v-model="paciente.celular" type="text" name="celular" id="celular" class="form-control" placeholder="Ingrese num de Cel" aria-describedby="helpId">
                            <small id="bodyhelpId" class="text-muted"></small>
                            <span class="text-danger" v-if="errors.celular">{{ errors.celular }}</span>
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input v-model="paciente.telefono" type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese num de Tel" aria-describedby="helpId">
                            <small id="bodyhelpId" class="text-muted"></small>
                            <span class="text-danger" v-if="errors.detalle">{{ errors.telefono }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-3">
                    <div class="form-group">
                        <label for="sexo">Nombre y Apellido Materno</label>
                        <input v-model="paciente.nom_ape_mat" type="text" name="nom_mat" id="nom_mat" class="form-control" placeholder="Nombre y Apellido Materno" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.nom_ape_mat">{{ errors.nom_ape_mat }}</span>
                    </div>
                </div>
                <div class="col md-3">
                    <div class="form-group">
                        <label for="sexo">Nombre y Apellido Paterno</label>
                        <input v-model="paciente.nom_ape_pat" type="text" name="nom_pat" id="nom_pat" class="form-control" placeholder="Nombre y Apellido Paterno" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.nom_ape_pat">{{ errors.nom_ape_pat }}</span>
                    </div>
                </div>

                <div class="col md-3">
                    <div class="form-group">
                        <label for="sexo">Nombre del responsable</label>
                        <input v-model="paciente.responsable_nombre" type="text" name="responsable_nombre" id="responsable_nombre" class="form-control" placeholder="Ingrese su nombre" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.responsable_nombre">{{ errors.responsable_nombre }}</span>
                    </div>
                </div>

                <div class="col md-3">
                    <div class="form-group">
                        <label for="sexo">Tel- Responsable</label>
                        <input v-model="paciente.responsable_telef" type="text" name="responsable_telef" id="responsable_telef" class="form-control" placeholder="Ingrese su Tel" aria-describedby="helpId">
                        <small id="bodyhelpId" class="text-muted"></small>
                        <span class="text-danger" v-if="errors.responsable_telef">{{ errors.responsable_telef }}</span>
                    </div>
                </div>
            </div>



        </form>
        <template v-slot:modal-footer="{ok, cancel, hide}">
            <b-button v-if="isNewRecord" @click="addPaciente()" variant="warning" size="lg">Crear Nuevo Paciente</b-button>
            <!-- <button v-if="isNewRecord" @click="addPaciente()" type="button" size='lg' class="btn btn-dark m-3">Crear</button> -->
            <!-- <button v-if="!isNewRecord" @click="isNewRecord = !isNewRecord" v-on:click="paciente={}" type="button" class="btn btn-success m-3">Nuevo</button> -->
            <b-button v-if="!isNewRecord" @click="updatePaciente(paciente.id_paciente)" variant="warning" size="lg">Actualizar Paciente</b-button>
            <!-- <button v-if="!isNewRecord" @click="updatePaciente(paciente.id_paciente)" type="button" class="btn btn-primary m-3">Actualizar</button> -->

        </template>
    </b-modal>
    <p>
        <b-button @click="showModal=true" block variant="primary">Nuevo paciente</button>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre y Apellido</th>
                <th>Numero de Afiliado</th>
                <th>Tel</th>
                <th>Celular</th>
            </tr>
            <tr>
                <td>
                    <input v-on:change="getPaciente()" class="form-control" v-model="filter.id_paciente">
                </td>
                <td>
                    <input v-on:change="getPaciente()" class="form-control" v-model="filter.nombre">
                </td>

                <td>
                    <input v-on:change="getPaciente()" class="form-control" v-model="filter.num_afil">
                </td>


            </tr>
        </thead>

        <tbody>
            <tr v-for="(pac,key) in pacientes" v-bind:key="pac.id_paciente">
                <td scope="row">{{pac.id_paciente}}</td>
                <td>{{pac.nombre}} {{pac.apellido}}</td>
                <td>{{pac.num_afil}}</td>
                <!-- <td>{{pac.num_doc}}</td> -->
                <td>{{pac.telefono}}</td>
                <td>{{pac.celular}}</td>

                <td>
                    <button @click="showModal=true" v-on:click="editpaciente(key)" type="button" class="btn btn-warning">Editar</button>
                </td>
                <td>
                    <button v-on:click="deletePaciente(pac.id_paciente)" type="button" class="btn btn-danger">Borrar</button>
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
                msg: "Pacientes",
                pacientes: [],
                paciente: {},
                references: [],
                filter: {},
                errors: {},
                isNewRecord: true,
                currentPage: 1,
                pagination: {},
                docs: ['DNI', 'Carnet Extranjero', 'RUC', 'PASAPORTE', 'P.NAC', 'Otros'],
                sexos: ['Masculino', 'Femenino', 'Bisexual', 'Transexual', 'Indefinido'],
                showModal: false,
                headerBgVariant: 'dark',
                headerTextVariant: 'warning',
                bodyBgVariant: 'info',
                bodyTextVariant: 'dark',
                footerBgVariant: 'dark',
            }
        },
        mounted() {
            this.getPaciente();
            this.getReferences();
        },

        methods: {
            getReferences() {
                var self = this;
                axios.get('/apiv1/obrasocials')
                    .then(function(response) {

                        console.log(response.data);
                        console.log("Se trajo las obras sociales");
                        self.references = response.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
                    .then(function() {});
            },

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
                        // handle success
                        console.log(response.data);
                        console.log("Datos pac");
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
            deletePaciente: function(id) {
                Swal.fire({
                    title: 'Esta seguro que desea borrar el registro ' + id + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Si borrar!',
                    cancelButtonText: 'No, regresar.',
                }).then((result) => {
                    if (result.value) {
                        var self = this;
                        axios.delete('/apiv1/pacientes/' + id)
                            .then(function(response) {
                                // handle success
                                console.log("Borrar paciente id: " + id);
                                console.log(response.data);
                                self.getPaciente();
                            })
                            .catch(function(error) {
                                // handle error
                                console.log(error);
                            })
                            .then(function() {
                                // always executed
                            });
                        Swal.fire({
                            title: 'Se ha borrado con exito',
                            icon: 'success',
                        })
                    }
                }, );
            },
            editpaciente: function(key) {
                this.paciente = Object.assign({}, this.pacientes[key]);
                this.paciente.key = key;
                this.isNewRecord = false;
            },
            addPaciente: function() {
                var self = this;
                axios.post('/apiv1/pacientes', self.paciente)
                    .then(function(response) {
                        // handle success
                        console.log(response.data);
                        self.getPaciente()
                        // self.posts.unshift(response.data);
                        self.paciente = {};
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
            updatePaciente: function(key) {
                var self = this;
                const params = new URLSearchParams();
                params.append('nombre', self.paciente.nombre);
                params.append('apellido', self.paciente.apellido);
                params.append('direccion', self.paciente.direccion);
                params.append('telefono', self.paciente.telefono);
                params.append('celular', self.paciente.celular);
                params.append('sexo', self.paciente.sexo);
                params.append('tipo_doc', self.paciente.tipo_doc);
                params.append('num_doc', self.paciente.num_doc);
                params.append('nom_ape_mat', self.paciente.nom_ape_mat);
                params.append('nom_ape_pat', self.paciente.nom_ape_pat);
                params.append('obra_social_id', self.paciente.obra_social_id);
                params.append('num_afil', self.paciente.num_afil);
                params.append('fecha_nacimiento', self.paciente.fecha_nacimiento);
                params.append('responsable_nombre', self.paciente.responsable_nombre);
                params.append('responsable_telef', self.paciente.responsable_telef);
                axios.patch('/apiv1/pacientes/' + key, params)
                    .then(function(response) {
                        // handle success
                        console.log(response.data);
                        self.getPaciente();
                        self.paciente = {};
                        self.isNewRecord = true;
                        self.showModal = false;
                    })
                    .catch(function(error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function() {
                        // always executed
                    });

            }

        }

    })
</script>