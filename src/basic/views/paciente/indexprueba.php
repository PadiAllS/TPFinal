<?php
/* @var $this yii\web\View */

$this->registerCssFile("https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css", ['position' => $this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css", ['position' => $this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css", ['position' => $this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/vue-router/dist/vue-router.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js", ['position' => $this::POS_HEAD]);

$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js", ['position' => $this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/sweetalert2@9", ['position' => $this::POS_HEAD]);
$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js", ['position' => $this::POS_HEAD]);

echo $this->render('/components/PacienteCrud');
?>



<div id="app">
    <paciente v-bind:model="model" v-bind:modelname="modelname" v-bind:fields="fields">
    </paciente>
</div>

<script>
    var app = new Vue({
        el: "#app",
        components: {
            paciente: Paciente,
        },
        data: {
            model: <?= json_encode($model->getAttributes()) ?>,
            // relates:<? //= json_encode($model->getRelationData())
                        ?>
            // rules: <? //= json_encode($model->rules())
                        ?>
            fields: ['id', 'nombre', 'apellido', 'nro_afil', 'nro_doc', 'telefono', 'celular'], //poner en un array los campos que queres
            modelname: <?= json_encode($model::tableName()) ?>,
        }
    })
</script>