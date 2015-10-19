<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesAtributo */

$this->title = Yii::t('app', 'Create Bienes Atributo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Atributos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-atributo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
