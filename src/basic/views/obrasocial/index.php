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


    <b-modal v-model="showModal" id="my-modal">
        <form action="">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input v-model="obrasocial.nombre" type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre de la Obra-Social" aria-describedby="helpId">
                <small id="titlehelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.nombre"> {{ errors.nombre }} </span>
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input v-model="obrasocial.direccion" type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese Direccion" aria-describedby="helpId">
                <small id="bodyhelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.direccion">{{ errors.direccion }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input v-model="obrasocial.telefono" type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese num de Tel" aria-describedby="helpId">
                <small id="bodyhelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.detalle">{{ errors.telefono }}</span>
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input v-model="obrasocial.celular" type="text" name="celular" id="celular" class="form-control" placeholder="Ingrese num de Cel" aria-describedby="helpId">
                <small id="bodyhelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.celular">{{ errors.celular }}</span>
            </div>
            <div class="form-group">
                <label for="contacto">Contacto</label>
                <input v-model="obrasocial.contacto" type="text" name="contacto" id="contacto" class="form-control" placeholder="Contacto" aria-describedby="helpId">
                <small id="bodyhelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.contacto">{{ errors.contacto }}</span>
            </div>
            <div class="form-group">
                <label for="reintegro">Reintegro</label>
                <input v-model="obrasocial.reintegro" type="text" name="reintegro" id="reintegro" class="form-control" placeholder="Ingrese Valor de Reintegro" aria-describedby="helpId">
                <small id="bodyhelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.reintegro">{{ errors.reintegro }}</span>
            </div>

        </form>
        <template v-slot:modal-footer="{ok, cancel, hide}">
            <button v-if="isNewRecord" @click="addObrasocial()" type="button" class="btn btn-primary m-3">Crear</button>
            <!-- <button v-if="!isNewRecord" @click="isNewRecord = !isNewRecord" v-on:click="obrasocial={}" type="button" class="btn btn-success m-3">Nuevo</button> -->
            <button v-if="!isNewRecord" @click="updateObrasocial(obrasocial.id_obra_social)" type="button" class="btn btn-primary m-3">Actualizar</button>

        </template>
    </b-modal>


    <p>
        <b-button @click="showModal=true" block variant="primary">Nueva Obra-Social</button>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Contacto</th>
                <th>Reintegro</th>
            </tr>
            <tr>
                <td>
                    <input v-on:change="getObrasocial()" class="form-control" v-model="filter.id_obra_social">
                </td>
                <td>
                    <input v-on:change="getObrasocial()" class="form-control" v-model="filter.nombre">
                </td>
                <td>
                    <input v-on:change="getObrasocial()" class="form-control" v-model="filter.direccion">
                </td>
                <td>
                    <input v-on:change="getObrasocial()" class="form-control" v-model="filter.telefono">
                </td>
                <td>
                    <input v-on:change="getObrasocial()" class="form-control" v-model="filter.celular">
                </td>
                <td>
                    <input v-on:change="getObrasocial()" class="form-control" v-model="filter.contacto">
                </td>
                <td>
                    <input v-on:change="getObrasocial()" class="form-control" v-model="filter.reintegro">
                </td>
            </tr>
        </thead>

        <tbody>
            <tr v-for="(obra,key) in obrassocial" v-bind:key="obra.id_obra_social">
                <td scope="row">{{obra.id_obra_social}}</td>
                <td>{{obra.nombre}}</td>
                <td>{{obra.direccion}}</td>
                <td>{{obra.telefono}}</td>
                <td>{{obra.celular}}</td>
                <td>{{obra.contacto}}</td>
                <td>{{obra.reintegro}}</td>
                <td>
                    <button @click="showModal=true" v-on:click="editObrasocial(key)" type="button" class="btn btn-warning">Editar</button>
                </td>
                <td>
                    <button v-on:click="deleteObrasocial(obra.id_obra_social)" type="button" class="btn btn-danger">Borrar</button>
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
                msg: "Obra-Social",
                obrassocial: [],
                obrasocial: {},
                filter: {},
                errors: {},
                isNewRecord: true,
                currentPage: 1,
                pagination: {},
                showModal: false,
            }
        },
        mounted() {
            this.getObrasocial();
        },
        watch: {
            currentPage: function() {
                this.getPatologias();
            }
        },
        methods: {
            normalizeErrors: function(errors) {
                var allErrors = {};
                for (var i = 0; i < errors.length; i++) {
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;

            },
            getObrasocial: function() {
                var self = this;
                axios.get('/apiv1/obrasocials?page=' + self.currentPage, {
                        params: self.filter
                    })
                    .then(function(response) {
                        // handle success
                        console.log(response.data);
                        console.log("Datos Obra Social");
                        self.pagination.total = parseInt(response.headers['x-pagination-total-count']);
                        self.pagination.totalPages = parseInt(response.headers['x-pagination-page=count']);
                        self.pagination.perPage = parseInt(response.headers['x-pagination-per-page']);
                        self.obrassocial = response.data;
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
            deleteObrasocial: function(id) {
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
                        axios.delete('/apiv1/obrasocials/' + id)
                            .then(function(response) {
                                // handle success
                                console.log("Borrar Obra social id: " + id);
                                console.log(response.data);
                                self.getObrasocial();
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
            editObrasocial: function(key) {
                this.obrasocial = Object.assign({}, this.obrassocial[key]);
                this.obrasocial.key = key;
                this.isNewRecord = false;
            },
            addObrasocial: function() {
                var self = this;
                axios.post('/apiv1/obrasocials', self.obrasocial)
                    .then(function(response) {
                        // handle success
                        console.log(response.data);
                        self.getObrasocial()
                        // self.posts.unshift(response.data);
                        self.obrasocial = {};
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
            updateObrasocial: function(key) {
                var self = this;
                const params = new URLSearchParams();
                params.append('nombre', self.obrasocial.nombre);
                params.append('direccion', self.obrasocial.direccion);
                params.append('telefono', self.obrasocial.telefono);
                params.append('celular', self.obrasocial.celular);
                params.append('contacto', self.obrasocial.contacto);
                params.append('reintegro', self.obrasocial.reintegro);
                axios.patch('/apiv1/obrasocials/' + key, params)
                    .then(function(response) {
                        // handle success
                        console.log(response.data);
                        self.getObrasocial();
                        self.obrasocial = {};
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