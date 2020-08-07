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

<div id="app">
<div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
        <h2>Registro de usuario</h2>
        <form >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" v-model="usuario.name" v-validate="'required'" name="nombre" class="form-control"/>
                
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" v-model="usuario.email" v-validate="'required'" name="email" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" v-model="user.username" v-validate="'required'" name="username" class="form-control"/>
            </div>
            <div class="form-group">
                <label htmlFor="password">Password</label>
                <input type="password" v-model="user.password" v-validate="{ required: true, min: 6 }" name="password" class="form-control"/>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Registro</button>
            </div>
        </form>
    </div>
            </div>
        </div>
</div>
</div>

<script>
   
</script>