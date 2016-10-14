<?php
/**
 * Created by PhpStorm.
 * User: gocsg
 * Date: 09.10.2016
 * Time: 1:08
 */

use yii\helpers\Url;

?>

<li>
    <a href="<?= Url::to(['manufacturer/view', 'id' => $manufacturer['id']]) ?>"><?= $manufacturer['name'] ?></a>
</li>


