<!-- Start Fcs  -->
<section id="feature_slider" class="">
        <article class="slide" id="showcasing" style="background: url('<?php echo Yii::app()->baseUrl; ?>/asset/images/main/backgrounds/landscape.png') repeat-x top center;">
            <img class="asset left-30 sp600 t120 z1" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene1/macbook.png" />
            <div class="info">
                <h2>Beautiful theme for showcasing your works.</h2>
            </div>
        </article>
        <article class="slide" id="ideas" style="background: url('<?php echo Yii::app()->baseUrl; ?>/asset/images/main/backgrounds/aqua.jpg') repeat-x top center;">
            <div class="info">
                <h2>We love to turn ideas into beautiful things.</h2>
            </div>
            <img class="asset left-480 sp600 t260 z1" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene2/left.png" />
            <img class="asset left-210 sp600 t213 z2" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene2/middle.png" />
            <img class="asset left60 sp600 t260 z1" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene2/right.png" />
        </article>
        <article class="slide" id="tour" style="background: url('<?php echo Yii::app()->baseUrl; ?>/asset/images/main/backgrounds/color-splash.jpg') repeat-x top center;">
            <img class="asset left-472 sp650 t210 z3" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene3/ipad.png" />
            <img class="asset left-365 sp600 t270 z4" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene3/iphone.png" />
            <img class="asset left-350 sp450 t135 z2" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene3/desktop.png" />
            <img class="asset left-185 sp550 t220 z1" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene3/macbook.png" />
            <div class="info">
                <h2>Fully Responsive</h2>
                <a href="features.html">TOUR THE PRODUCT</a>
            </div>
        </article>
        <article class="slide" id="responsive" style="background: url('<?php echo Yii::app()->baseUrl; ?>/asset/images/main/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-472 sp600 t120 z3" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene4/html5.png" />
            <img class="asset left-190 sp500 t120 z2" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/slides/scene4/css3.png" />
            <div class="info">
                <h2>
                    Responsive <strong>HTML5 & CSS3</strong>
                    <!-- Theme -->
                </h2>                
            </div>
        </article>        
    </section>
<!-- End Start Fcs  -->

    <div id="features">
        <div class="container">
            <div class="section_header">
                <h3>About Us</h3>
            </div> 
            
            <div class="row feature">
                <div class="span6">
                    <!-- illustrasi about  -->
                    <img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/showcase1.png" />
                    <!-- End illustrasi about  -->
                </div>
                <!-- text info about -->
                <div class="span6 info">
                    <h3>
                        <img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/features-ico1.png" />
                        Beautiful on all devices
                    </h3>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                    </p>
                    <div class="clear"></div>
                </div>
                <!-- End text info about -->
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div id="showcase">
        <div class="container">

            <div class="section_header">
                <h3>Our Services</h3>
            </div>

            <div class="row feature_wrapper">
                <!-- Features Row -->
                <div class="features_op1_row list-service-home">

                    <!-- Feature -->
                    <!-- <div class="span4 feature first">
                        <div class="img_box">
                            <a href="services.html">
                                <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/service1.png">
                                <span class="circle"> 
                                    <span class="plus">&#43;</span>
                                </span>
                            </a>
                        </div>
                        <div class="text">
                            <h6>Responsive theme</h6>
                            <p>
                                There are many variations of passages of generators on the  embarrassing hidden in   content here making it look like.
                            </p>
                        </div>
                    </div> -->

                    <!-- Feature -->
                    <?php foreach ($layanan as $key => $v_layanan): ?>

                    <?php
                        $v_layanan = (object) $v_layanan;
                        $value['image'] = json_decode($v_layanan->image);
                        // echo print_r($value);
                    ?>
                    <?php // echo Yii::app()->baseUrl.ImageHelper::thumb(302,174, '/images/layanan/'.$value['image']->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>
                    <div class="span4 feature item">
                        <div class="img_box">
                            <a href="services.html">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/main/service3.png">
                                <span class="circle"> 
                                    <span class="plus">&#43;</span>
                                </span>
                            </a>
                        </div>
                        <div class="text">
                            <h6><?php echo ucwords($v_layanan->name); ?></h6>
                            <?php echo substr($v_layanan->content, 0, 170); ?> ...
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- Feature -->
                    <!-- <div class="span4 feature last">
                        <div class="img_box">
                            <a href="services.html">
                                <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/service3.png">
                                <span class="circle"> 
                                    <span class="plus">&#43;</span>
                                </span>
                            </a>
                        </div>
                        <div class="text">
                            <h6>Made with love</h6>
                            <p>
                                There are many variations of passages of generators on the  embarrassing hidden in   content here making it look like.
                            </p>
                        </div>
                    </div> -->
                    
                    <div class="clear"></div>
                </div>

            </div>
        </div>
    </div>

    <div id="clients">
        <div class="container">
            <div class="section_header">
                <h3>Portofolio</h3>
            </div>

            <div class="row">
                <div class="span2 client">
                    <div class="img client1"></div>
                </div>
                <div class="span2 client">
                    <div class="img client2"></div>
                </div>
                <div class="span2 client">
                    <div class="img client3"></div>
                </div>
                <div class="span2 client">
                    <div class="img client1"></div>
                </div>
                <div class="span2 client">
                    <div class="img client2"></div>
                </div>
                <div class="span2 client">
                    <div class="img client3"></div>
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <!-- <div id="features">
        <div class="container">
            <div class="section_header">
                <h3>Features</h3>
            </div> 
            <div class="row feature">
                <div class="span6">
                    <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/showcase1.png" />
                </div>
                <div class="span6 info">
                    <h3>
                        <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/features-ico1.png" />
                        Beautiful on all devices
                    </h3>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                    </p>
                </div>
            </div>
            <div class="row feature ss">
                <div class="span6 info">
                    <h3>
                        <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/features-ico2.png" />
                        Blog page included
                    </h3>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                    </p>
                </div>
                <div class="span6">
                    <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/showcase2.png" class="pull-right" />
                </div>
            </div>
            <div class="row feature ss">
                <div class="span6">
                    <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/showcase3.png" />
                </div>
                <div class="span6 info">
                    <h3>
                        <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/main/features-ico3.png" />
                        Simple and clean coming soon page
                    </h3>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                    </p>
                </div>
            </div>
        </div>
    </div> -->

    <div id="clients">
        <div class="container">
            <div class="section_header">
                <h3>Clients</h3>
            </div>
            <div class="row">
                <div class="span2 client">
                    <div class="img client1"></div>
                </div>
                <div class="span2 client">
                    <div class="img client2"></div>
                </div>
                <div class="span2 client">
                    <div class="img client3"></div>
                </div>
                <div class="span2 client">
                    <div class="img client1"></div>
                </div>
                <div class="span2 client">
                    <div class="img client2"></div>
                </div>
                <div class="span2 client">
                    <div class="img client3"></div>
                </div>
            </div>
        </div>
    </div>