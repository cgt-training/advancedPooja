<?php 
	use yii\helpers\Html; 
?>
<p>YOU HAVE ENTERED THE FOLLOWING INFORMATION:</p>
<ul>
	<li><label>NAME:</label><?= Html::encode($model->name) ?></li>
	<li><label>EMAIL:</label><?= Html::encode($model->email) ?></li>
</ul>