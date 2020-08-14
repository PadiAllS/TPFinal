<?php
/* @var $this yii\web\View */


$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css", ['position' => $this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css", ['position' => $this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js", ['position' => $this::POS_HEAD]);

$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js", ['position' => $this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/sweetalert2@9", ['position' => $this::POS_HEAD]);

?>

<b-container fluid id="app" class="bg-info bv-example-row  text-center text-light">
    <div class="jumbotron bg-info">
        <div class="container bg-info">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h2>Login</h2>

                    <form action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input v-model="usuario.username" type="text" name="username" id="username" class="form-control" placeholder="Ingrese Username" aria-describedby="helpId">
                <small id="titlehelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.nombre"> {{ errors.username }} </span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input v-model="usuario.password" type="password" name="password" id="detalle" class="form-control" placeholder="Ingrese password" aria-describedby="helpId">
                <small id="bodyhelpId" class="text-muted"></small>
                <span class="text-danger" v-if="errors.password">{{ errors.password }}</span>
            </div>
            <div class="form-group pt-3">
                                <button class="btn btn-primary" @click:ingresar()>Login</button>
                            </div>

        </form>


                    <!-- <form action="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" v-model="usuario.username" name="username" class="form-control" />

                        </div>
                        <div class="form-group">
                            <label htmlFor="password">Password</label>
                            <input type="password" v-model="usuario.password" name="password" class="form-control" />

                            <div class="form-group pt-3">
                                <button class="btn btn-primary" @click:ingresar()>Login</button>
                            </div>
                        </div>
                        <p class="mt-3 test-center font-weight-bold"> {{ msj }} </p>    
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</b-container>

<script>
    new Vue({
        el: "#app",
        data: {
            usuario: {},
            mostrar: true,
            msj: '',
            errors: {}
        },

        mounted() {
            this.ingresar();
        },
        
        methods: {
            normalizeErrors: function(errors) {
                var allErrors = {};
                for (var i = 0; i < errors.length; i++) {
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;

            },

            ingresar: function() {
                var self = this
                axios.post('/apiv1/login', self.usuario
                )
                .then((response) => {
                    console.log(response.data);
                    self.mostrar = false;
                })
                .catch(function(error){
                    if (error.response) {
                        if (error.response.status < 500) {
                            self.msj = 'Username o Password incorrectos'
                            } else {
                                self.msj = 'Error'
                            }
                    } else if (error.request) {
                        self.msj = 'El servidor no responde'
                    } else {
                        self.msj = 'No se pudo ejecutar la consulta'
                    }            
                })
                .finally(function() {
                })
            }
        }

    })

</script>