<?php $this->load->view('templates/header.php');?>
    <!-- Page Header-->
        <header class="masthead" style="background-image: url('asset/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>API BLOG</h1>
                            <span class="subheading">A Blog Theme by </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <!-- Page Header End-->

    <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <?php foreach ($api_data as $item): ?>

                        <?php $status = $item['status'];

                         if($status == 1){ ?>

                            <div class="post-preview">
                                <a href="<?php echo $item['canonical_url']; ?>" target="_blank">
                                    <img src="<?php echo $item['img']; ?>"  width="800">
                                    <h2 class="post-title"><?php echo $item['title']; ?></h2>
                                    <h3 class="post-subtitle"><?php echo $item['content']; ?></h3>
                                </a>
                                
                                <p class="post-meta">
                                    <?php echo $item['date']; ?>
                                </p>
                            </div>

                        <?php }else{ ?>
                                <!-- <a class="btn btn-danger">InActive</a> -->
                        <?php } ?>

                    <?php endforeach; ?>
                    <!-- Pager-->
                    <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div> -->
                </div>
            </div>
        </div>
<?php $this->load->view('templates/footer.php');?>