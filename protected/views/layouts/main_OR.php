<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

    <?php $this->widget('bootstrap.widgets.BootNavbar', array(
    'fixed'=>false,
    'brand'=>'Project name',
    'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'items'=>array(
                	array('label'=>'Home', 'url'=>array('/site/index'), 'active'=>true),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

           //     array('label'=>'Home', 'url'=>'#', 'active'=>true),
             //   array('label'=>'Link', 'url'=>'#'),
                array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                    array('label'=>'Action', 'url'=>'#'),
                    array('label'=>'Another action', 'url'=>'#'),
                    array('label'=>'Something else here', 'url'=>'#'),
                    '---',
                    array('label'=>'NAV HEADER'),
                    array('label'=>'Separated link', 'url'=>'#'),
                    array('label'=>'One more separated link', 'url'=>'#'),
                )),
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Link', 'url'=>'#'),
                '---',
                array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                    array('label'=>'Action', 'url'=>'#'),
                    array('label'=>'Another action', 'url'=>'#'),
                    array('label'=>'Something else here', 'url'=>'#'),
                    '---',
                    array('label'=>'Separated link', 'url'=>'#'),
                )),
            ),
        ),
    ),
)); ?>


  
	<?php /*if(isset($this->breadcrumbs)):*/?><!--
		--><?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); */?><!-- breadcrumbs -->
	<?php //endif?>

    	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
