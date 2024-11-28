<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description;?>" >
    <meta name="keywords" content="<?php echo $keywords;?>" >
    <link rel="shortcut icon" href="<?php echo base_url() ?>/uploads/logo/<?php echo get_lebel_by_value_in_theme_settings('favicon');?>">

    <!-- Bootstrap CSS -->
    <link href="<?php echo  base_url()?>/assets/default/css/bootstrap.min.css" rel="stylesheet" >
    <link href="<?php echo  base_url()?>/assets/default/css/style.css" rel="stylesheet" >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<section class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <?php $uri = current_url(true); $url = empty($uri->getSegment(2))?'':$uri->getSegment(3);  ?>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($url == '')?'active':''?>" aria-current="page"  href="<?= base_url()?>">হোম</a>
                                </li>
<!--                                <li class="nav-item">-->
<!--                                    <a class="nav-link" href="#">বর্তমান মূল্য</a>-->
<!--                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($url == 'transport')?'active':''?>" href="<?= base_url('page/transport')?>">ট্রান্সপোর্ট</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($url == 'about-us')?'active':''?>" href="<?= base_url('page/about-us')?>">আমাদের সম্পর্কে জানুন</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($url == 'contact')?'active':''?>" href="<?= base_url('page/contact')?>">যোগাযোগ করুন</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($url == 'notice')?'active':''?>" href="<?= base_url('page/notice')?>">যাবতীয় নোটিশ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>