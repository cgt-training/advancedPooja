<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- START HEADER -->
    <div class="header">
    <!-- START HEADER CONTAINER -->
        <div class="container">
        <!-- Start row - logo,institute name and search bar-->
            <div class="row">
                <div class="col-md-9">
                    <img class="img-responsive  pull-left" src="<?php echo Url::base(); ?>/images/logo.png" id="logo"/>
                    <div class="inst-name pull-left">
                        <h3><strong>Sri Sukhmani Institute of Management</strong></h3>
                        <h4>(Approved by A.I.C.T.E. Ministry of HRD Govt of India)</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group" id="search">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                     </div>
                </div>
            </div>
        <!-- End row - logo,institute name and search bar-->

        <!-- Start row - navbar -->
            <div class="row">
            <?php 
                NavBar::begin([
                    'brandLabel' => 'My Company',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar navbar-default nav-menu-bottom',
                    ],
                ]);
                $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'Company', 'url' => ['/company']],
                    ['label' => 'Branches', 'url' => ['/branches']],
                    ['label' => 'Department', 'url' => ['/department']],
                    ['label' => 'Customer', 'url' => ['/customer']],
                    ['label' => 'Location', 'url' => ['/location']],
                ];
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                } else {
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>';
                    }
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right', 'id' => 'menu'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
            ?>
            </div>
        <!-- End row - navbar -->
        </div>
    <!-- END HEADER CONTAINER -->
    </div>
<!-- END HEADER-->
<!-- START MIDDLE DIV -->
    <div class="middle-div">
    <!-- START MIDDLE DIV CONTAINER -->
        <div class="container">
        <!-- START ROW -  BANNER DIV -->
            <div class="row middle-banner-div">
                    <div class="col-xs-12 col-md-6 banner-text">
                        <h2>ADMISSION OPEN - PGDM</h2>
                        <div class="banner-text2"><h4>POST GRADUATE DIPLOMA IN MANAGEMENT</h4></div>
                        <h4>Two year full time programme</h4>
                        <h3>Specialized In Finance, Marketing and Retail Marketing</h3>
                    </div><!-- /col-xs-12 col-md-6 banner-text -->

            <!-- START ROW - 4 IMAGES -->
                <div class="row four-images">
                    <img class="img-responsive col-xs-12 col-md-3" src="<?php echo Url::base(); ?>/images/image1.png" />
                    <img class="img-responsive col-xs-12 col-md-3" src="<?php echo Url::base(); ?>/images/image2.png" />
                    <img class="img-responsive col-xs-12 col-md-3" src="<?php echo Url::base(); ?>/images/image1.png" />
                    <img class="img-responsive col-xs-12 col-md-3" src="<?php echo Url::base(); ?>/images/image2.png" />
                </div>
            <!-- END ROW - 4 IMAGES -->
            </div>
        <!-- END ROW -  BANNER DIV -->
        </div>
    <!-- END MIDDLE DIV CONTAINER -->
    </div>
<!-- END MIDDLE DIV -->
<!-- Page Content -->
    <div class="container page-content">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div id="main-content">
        <?= $content ?>
        </div>
    </div>
<!-- End Page Content -->

<!-- START FOOTER DIV -->
    <div class="footer">
        <div class="container"><br>
            2014 SSIM All Right Reserved
            <div class="pull-right">
                <p class="pull-left">Follow Us &nbsp;</p>
                <img class="img-responsive pull-left" src="<?php echo Url::Base(); ?>/images/twit.png"style="padding:2px" />
                <img class="img-responsive pull-left" src="<?php echo Url::Base(); ?>/images/fb.png" style="padding:2px" />
                <img class="img-responsive" src="<?php echo Url::Base(); ?>/images/gplus.png"style="padding:2px" />
                <p style="clear:left">Powered By C.G.Technosoft</p>
            </div>
        </div>
    </div>
<!-- END FOOTER DIV -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
