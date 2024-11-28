<!-- Top News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            <?php foreach ($blogArray as $top){ ?>
                <div class="d-flex">
                    <?php echo image_view('uploads/blog',$top->blog_id,'100_'.$top->image,'50_noimage.png','width-height-80');?>
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold" href="<?php echo base_url('detail/'.$top->blog_id)?>"><?php echo $top->blog_title;?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Top News Slider End -->


<!-- Main News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    <?php foreach ($blogBan as $ban){ ?>
                    <div class="position-relative overflow-hidden" style="height: 435px;">
                        <?php echo image_view('uploads/blog',$ban->blog_id,'700_'.$ban->image,'50_noimage.png','object-fit');?>
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="#"><?php echo get_data_by_id('category_name','cc_category','cat_id',$ban->cat_id);?></a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white" href="#"><?php echo invoiceDateFormat($ban->createdDtm)?></a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="<?= base_url('detail/'.$ban->blog_id);?>"><?php echo $ban->blog_title;?></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Categories</h3>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                </div>
                <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="<?php echo base_url() ?>/assets/default/img/cat-500x80-1.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Business
                    </a>
                </div>
                <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="<?php echo base_url() ?>/assets/default/img/cat-500x80-2.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Technology
                    </a>
                </div>
                <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="<?php echo base_url() ?>/assets/default/img/cat-500x80-3.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Entertainment
                    </a>
                </div>
                <div class="position-relative overflow-hidden" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="<?php echo base_url() ?>/assets/default/img/cat-500x80-4.jpg" style="object-fit: cover;">
                    <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        Sports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- Featured News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Featured</h3>
            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
        </div>
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            <?php foreach ($featured as $fet){ ?>
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <?php echo image_view('uploads/blog',$fet->blog_id,'255_'.$fet->image,'50_noimage.png','img-fluid w-100 h-100 object-fit');?>
                <div class="overlay">
                    <div class="mb-1" style="font-size: 13px;">
                        <a class="text-white" href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$fet->cat_id);?></a>
                        <span class="px-1 text-white">/</span>
                        <a class="text-white" href=""><?php echo invoiceDateFormat($fet->createdDtm)?></a>
                    </div>
                    <a class="h4 m-0 text-white" href="<?= base_url('detail/'.$fet->blog_id);?>"><?php echo $fet->blog_title;?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<!-- Featured News Slider End -->


<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Business</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <?php foreach ($business as $bus){ ?>
                    <div class="position-relative">
                        <?php echo image_view('uploads/blog',$bus->blog_id,'256_'.$bus->image,'50_noimage.png','img-fluid w-100 object-fit');?>
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$bus->cat_id);?></a>
                                <span class="px-1">/</span>
                                <span><?php echo invoiceDateFormat($bus->createdDtm)?></span>
                            </div>
                            <a class="h4 m-0" href="<?= base_url('detail/'.$bus->blog_id);?>"><?php echo $bus->blog_title;?></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Technology</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <?php foreach ($technology as $tec){ ?>
                    <div class="position-relative">
                        <?php echo image_view('uploads/blog',$tec->blog_id,'256_'.$tec->image,'50_noimage.png','img-fluid w-100 object-fit');?>
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$tec->cat_id);?></a>
                                <span class="px-1">/</span>
                                <span><?php echo invoiceDateFormat($tec->createdDtm)?></span>
                            </div>
                            <a class="h4 m-0" href="<?= base_url('detail/'.$tec->blog_id);?>"><?php echo $tec->blog_title;?></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Category News Slider End -->


<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Entertainment</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <?php foreach ($entertainment as $ent){ ?>
                    <div class="position-relative">
                        <?php echo image_view('uploads/blog',$ent->blog_id,'256_'.$ent->image,'50_noimage.png','img-fluid w-100 object-fit');?>
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$ent->cat_id);?></a>
                                <span class="px-1">/</span>
                                <span><?php echo invoiceDateFormat($ent->createdDtm)?></span>
                            </div>
                            <a class="h4 m-0" href="<?= base_url('detail/'.$ent->blog_id);?>"><?php echo $ent->blog_title;?></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Sports</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <?php foreach ($sports as $spo){ ?>
                        <div class="position-relative">
                            <?php echo image_view('uploads/blog',$spo->blog_id,'256_'.$spo->image,'50_noimage.png','img-fluid w-100 object-fit');?>
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$spo->cat_id);?></a>
                                    <span class="px-1">/</span>
                                    <span><?php echo invoiceDateFormat($spo->createdDtm)?></span>
                                </div>
                                <a class="h4 m-0" href="<?= base_url('detail/'.$spo->blog_id);?>"><?php echo $spo->blog_title;?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Category News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Popular</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <?php foreach ($popular as $pop){ ?>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <?php echo image_view('uploads/blog',$pop->blog_id,'256_'.$pop->image,'50_noimage.png','img-fluid w-100 object-fit');?>
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$pop->cat_id);?></a>
                                    <span class="px-1">/</span>
                                    <span><?php echo invoiceDateFormat($pop->createdDtm)?></span>
                                </div>
                                <a class="h4 m-0" href="<?= base_url('detail/'.$pop->blog_id);?>"><?php echo $pop->blog_title;?></a>
                            </div>
                        </div>
                        <?php foreach ($popular as $po){ ?>
                        <div class="d-flex mb-3">
                            <?php echo image_view('uploads/blog',$po->blog_id,'100_'.$po->image,'50_noimage.png','  object-fit');?>
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$po->cat_id);?></a>
                                    <span class="px-1">/</span>
                                    <span><?php echo invoiceDateFormat($po->createdDtm)?></span>
                                </div>
                                <a class="h6 m-0" href="<?= base_url('detail/'.$po->blog_id);?>"><?php echo $po->blog_title;?></a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <?php } ?>
                </div>

                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid w-100" src="<?php echo base_url() ?>/assets/default/img/ads-700x70.jpg" alt=""></a>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Latest</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <?php foreach ($latest as $lat){ ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <?php echo image_view('uploads/blog',$lat->blog_id,'256_'.$lat->image,'50_noimage.png','img-fluid w-100 object-fit');?>
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$lat->cat_id);?></a>
                                        <span class="px-1">/</span>
                                        <span><?php echo invoiceDateFormat($lat->createdDtm)?></span>
                                    </div>
                                    <a class="h4 m-0" href="<?= base_url('detail/'.$lat->blog_id);?>"><?php echo $lat->blog_title;?></a>
                                </div>
                            </div>
                            <?php foreach ($latest as $la){ ?>
                                <div class="d-flex mb-3">
                                    <?php echo image_view('uploads/blog',$la->blog_id,'100_'.$la->image,'50_noimage.png','  object-fit');?>
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$la->cat_id);?></a>
                                            <span class="px-1">/</span>
                                            <span><?php echo invoiceDateFormat($la->createdDtm)?></span>
                                        </div>
                                        <a class="h6 m-0" href="<?= base_url('detail/'.$la->blog_id);?>"><?php echo $la->blog_title;?></a>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Social Follow Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Follow Us</h3>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                            <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                            <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                            <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                            <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                            <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                            <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Newsletter Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Newsletter</h3>
                    </div>
                    <div class="bg-light text-center p-4 mb-3">
                        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                        <small>Sit eirmod nonumy kasd eirmod</small>
                    </div>
                </div>
                <!-- Newsletter End -->

                <!-- Ads Start -->
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid" src="<?php echo base_url() ?>/assets/default/img/news-500x280-4.jpg" alt=""></a>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tranding</h3>
                    </div>
                    <?php foreach ($tranding as $tra){ ?>
                    <div class="d-flex mb-3">
                        <?php echo image_view('uploads/blog',$tra->blog_id,'100_'.$tra->image,'50_noimage.png','  object-fit');?>
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href=""><?php echo get_data_by_id('category_name','cc_category','cat_id',$tra->cat_id);?></a>
                                <span class="px-1">/</span>
                                <span><?php echo invoiceDateFormat($tra->createdDtm)?></span>
                            </div>
                            <a class="h6 m-0" href=""><?php echo $tra->blog_title;?></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags</h3>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a>
                    </div>
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->