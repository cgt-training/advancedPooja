<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\url;

DashboardAsset::register($this);
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
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
    <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ADVANCED</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo Url::base();?>/dist/img/avatar.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs text-capitalize"><?php echo Yii::$app->user->identity->username ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo Url::base();?>/dist/img/avatar.jpeg" class="img-circle" alt="User Image">

                <h3 class="text-capitalize">
                  <?php echo Yii::$app->user->identity->username ?>
                </h3>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                  <a href="<?php echo Url::base();?>/site/logout" class="btn btn-default btn-flat" data-method='post'>Sign out</a>
                
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo Url::base();?>/dist/img/avatar.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <h3 class="text-capitalize"><?php echo Yii::$app->user->identity->username ?></h3>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <!-- Home -->
        <li class="treeview <?= Yii::$app->controller->id == 'site'?'active':''?>">
          <a href="<?php echo Url::base();?>/site/index">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /HOME -->

        <!-- Company -->
        <li class="treeview <?= Yii::$app->controller->id == 'company'?'active':''?>">
          <a href="<?php echo Url::base();?>/company">
            <i class="fa fa-industry"></i> <span>Company</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /Company -->

        <!-- Branches -->
        <li class="treeview <?= Yii::$app->controller->id == 'branches'?'active':''?>">
          <a href="<?php echo Url::base();?>/branches">
            <i class="fa fa-building-o"></i> <span>Branches</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /Branches -->

        <!-- Department -->
        <li class="treeview <?= Yii::$app->controller->id == 'department'?'active':''?>">
          <a href="<?php echo Url::base();?>/department">
            <i class="fa fa-university"></i> <span>Department</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /Department -->

        <!-- Customer -->
        <li class="treeview <?= Yii::$app->controller->id == 'customer'?'active':''?>">
          <a href="<?php echo Url::base();?>/customer">
            <i class="fa fa-user"></i> <span>Customer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /Customer -->

        <!-- Location -->
        <li class="treeview <?= Yii::$app->controller->id == 'location'?'active':''?>">
          <a href="<?php echo Url::base();?>/location">
            <i class="fa fa-street-view"></i> <span>Location</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /Location -->

        <!-- User -->
        <li class="treeview <?= Yii::$app->controller->id == 'location'?'active':''?>">
          <a href="<?php echo Url::base();?>/user">
            <i class="fa fa-users"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /User -->
        
        <!-- create Assignments  -->
        <li class="treeview">
          <a href="<?php echo Url::base();?>/role">
            <i class="fa fa-lock "></i>
            <span>Create Assignments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
    

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
          <?php if(Yii::$app->controller->id == 'site'){ ?> Dashboard <?php }else { echo "";  } ?>
        </h1>
        <ol class="breadcrumb">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
            <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li> -->
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div id='main-content'>
                <?= $content ?>
            </div>
        </section>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
 -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
