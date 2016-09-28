<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//$model
?>

<div class="container">
    <div class="row">
        <h3>Добавление данных в базу данных</h3>
        <hr/>
        <?php if($success==1):?>
            <p class="bg-success">Форма успешно обработана</p>
        <?php endif;?>

        <div class="col-md-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput()->label('Название'); ?>

            <?= $form->field($model, 'text')->textarea(['rows'=>4,'cols'=>10])->label('Описание'); ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-success pull-right']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

