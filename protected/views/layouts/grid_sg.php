<?php $this->beginContent('//layouts/main'); ?>
<div id="wrapper">

    <header id="mainheader" class="ir">
        header
    </header>
    <nav id="main-nav" role="navigation">

           <!-- Bootstrap Navigation Bar Menu -->

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <!-- Be sure to leave the brand out there if you want it shown -->
                    <a class="brand" href="#">Yii with HTML5 Boilerplate And Responsive Semantic Grid</a>

                    <div class="nav-collapse">
                        <?php $this->widget('zii.widgets.CMenu', array(
                                                                      'items' => array(
                                                                          array('label' => 'Home', 'url' => array('/site/index')),
                                                                          array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                                                                          array('label' => 'Contact', 'url' => array('/site/contact')),
                                                                          array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                                                          array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                                                                      ),
                                                                      // 'htmlOptions'=>array('class'=>'main-menu')
                                                                      'htmlOptions' => array('class' => 'nav')
                                                                 )); ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                                                         'links' => $this->breadcrumbs,
                                                    ));?>
    <?php
$flashMessages = Yii::app()->user->getFlashes();
    if ($flashMessages) {
        echo '<div class="flash-messages">';
        foreach ($flashMessages as $key => $message) {
            echo '<div class="alert alert-' . $key . '">' . "
          <a class='close' data-dismiss='alert'>×</a>
       {$message}
       </div>\n";
        }
        echo '</div>';
    }
    ?>
    <div id="main" role="main">

        <?php echo $content; ?>
    </div>
    <!-- main content -->
    <aside id="sidebar">
        <h2>Sidebar</h2>
        <p>
            <img id="sidebar-img" alt='sidebar' src='http://placehold.it/150x150.png/555555/777777&amp;text=Sidebar'>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent sit amet libero eros. Vivamus convallis, libero eu iaculis cursus, diam dui ultrices lorem, a
            ornare quam orci quis libero.
            Morbi interdum cursus odio, sed tincidunt eros tristique sit amet. Mauris sollicitudin diam eget ipsum
            blandit molestie.
            Praesent eu arcu odio. Nulla et adipiscing augue. Donec facilisis ante ac risus dignissim et interdum orci
            porttitor.
            Vivamus posuere blandit venenatis. Proin purus nibh, fringilla id dictum id, eleifend sed diam.
            Pellentesque ac sapien non ipsum blandit tincidunt. Aenean ullamcorper rutrum lacus ac molestie.
            Aliquam sed sem massa. Etiam in rutrum nisl. Morbi lobortis fermentum tellus, vel pharetra purus tincidunt
            venenatis.
            Ut lectus nulla, aliquet a scelerisque vel, cursus congue metus. Proin eget est mi, sed commodo nulla.
            Sed porta ornare nisl at viverra. Morbi quis quam egestas orci pellentesque tempus consectetur congue justo.
        </p>
    </aside>
    <!-- sidebar -->
    <footer>
         <div>
                Copyright &copy; <?php echo date('Y'); ?> by Spiros Kabasakalis.<br/>
                All Rights Reserved.<br/> <?php echo Yii::powered(); ?>Built with <a
                    href="http://html5boilerplate.com/">HTML5 Boilerplate</a> and
                <a href="http://semantic.gs/">Semantic Grid</a>.
            </div>
         <a href="http://www.w3.org/html/logo/" class="span1">
               <img src="http://www.w3.org/html/logo/badge/html5-badge-h-solo.png" width="63" height="64" alt="HTML5 Powered" title="HTML5 Powered">
    </footer>
</div>     <!-- wrapper -->



<?php $this->endContent(); ?>