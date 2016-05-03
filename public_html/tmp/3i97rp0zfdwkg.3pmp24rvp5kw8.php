<?php echo $this->render('templates/header.html',$this->mime,get_defined_vars(),0); ?>
<body>
    <div id="wrapper">
        <!----->
        <?php echo $this->render('templates/sidemenu.html',$this->mime,get_defined_vars(),0); ?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="content-main">

                <!--banner-->
                <div class="banner">
                    <h2>
                        <a href="<?php echo $BASE_URL; ?>">Home</a>
                        <?php foreach (($breadcumb?:array()) as $key=>$link): ?>
                            <i class="fa fa-angle-right"></i>
                            <span><a href="<?php echo $link; ?>"><?php echo $key; ?></a></span>
                        <?php endforeach; ?>
                    </h2>
                </div>
                <!--//banner-->
                <!--isi-->
                <?php echo $this->render('templates/'.$content,$this->mime,get_defined_vars(),0); ?>

                <!--isi-->
                <div class="copy">
<!--                    <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/"
                                                                                target="_blank">W3layouts</a></p>-->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <?php foreach (($loadJS?:array()) as $nama_js): ?>
        <script src="<?php echo $BASE_URL .'ui/js/'. $nama_js .'.js'; ?>" type="text/javascript"></script>
    <?php endforeach; ?>
    <?php foreach (($pageJS?:array()) as $nama_js): ?>
        <script src="<?php echo $BASE_URL .'ui/js/page/'. $nama_js .'.js'; ?>" type="text/javascript"></script>
    <?php endforeach; ?>
</body>
</html>
