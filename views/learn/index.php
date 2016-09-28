<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <h4><?=$article->title?></h4>
                    <p class="text-muted"><?=$article->text?></p>
                <?php endforeach; ?>
                <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
            <?php endif; ?>
        </div>
    </div>
</div>


