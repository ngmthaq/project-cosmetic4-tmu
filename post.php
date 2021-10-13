<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>
    <!-- Liên kết CSS -->
    <link rel="stylesheet" href="./public/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./public/css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/main.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="main">
        <!-- Liên kết file header -->
        <?php require_once('./layouts/_header.php') ?>

        <!-- Nội dung chính -->
        <div class="content">
            <div class="container">
                <div class="row bg-light">
                    <div class="col-9">
                        <div class="py-3">
                            <h4 class="pt-3 pb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </h4>
                            <div class="pb-3">
                                <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%2Fproject%2Fbeauty%2Fpost.php&layout=button_count&size=small&width=86&height=20&appId" 
                                    width="86" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
                                    allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                                </iframe>
                            </div>
                            <p class="pb-3">
                                <i>
                                    <strong>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Nulla, ducimus. Ut, ipsam eligendi labore iste,
                                        pariatur et atque tempora veniam,
                                        soluta cupiditate minima voluptatum alias odit exercitationem totam cumque officiis.
                                    </strong>
                                </i>
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Impedit dignissimos culpa ut autem sunt voluptate,
                                quos odio saepe maxime quas quis, optio alias excepturi!
                                Cupiditate laborum vitae eum molestiae nostrum.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Impedit dignissimos culpa ut autem sunt voluptate,
                                quos odio saepe maxime quas quis, optio alias excepturi!
                                Cupiditate laborum vitae eum molestiae nostrum.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Impedit dignissimos culpa ut autem sunt voluptate,
                                quos odio saepe maxime quas quis, optio alias excepturi!
                                Cupiditate laborum vitae eum molestiae nostrum.
                            </p>
                            <div class="text-center py-3">
                                <img src="./public/images/1.jpg" alt="Ảnh">
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Hic dolor modi, sit eligendi quia laboriosam suscipit ipsam minus,
                                labore officia pariatur rem similique earum architecto quibusdam,
                                accusantium eaque voluptatem. Repudiandae!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Hic dolor modi, sit eligendi quia laboriosam suscipit ipsam minus,
                                labore officia pariatur rem similique earum architecto quibusdam,
                                accusantium eaque voluptatem. Repudiandae!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Hic dolor modi, sit eligendi quia laboriosam suscipit ipsam minus,
                                labore officia pariatur rem similique earum architecto quibusdam,
                                accusantium eaque voluptatem. Repudiandae!
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Repudiandae, quis consectetur hic voluptate ex quo dolor velit aliquam,
                                dolore asperiores in alias incidunt deleniti odio reiciendis nobis sequi aspernatur et.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Repudiandae, quis consectetur hic voluptate ex quo dolor velit aliquam,
                                dolore asperiores in alias incidunt deleniti odio reiciendis nobis sequi aspernatur et.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Repudiandae, quis consectetur hic voluptate ex quo dolor velit aliquam,
                                dolore asperiores in alias incidunt deleniti odio reiciendis nobis sequi aspernatur et.
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="ads my-3 h-50">
                            <p>Quảng cáo MỸ PHẨM</p>
                            <h5>COSMETIC4</h5>
                            <p>Thương hiệu mỹ phẩm nổi bật</p>
                        </div>
                        <div class="ads mb-3 h-25">
                            <p>Quảng cáo MỸ PHẨM</p>
                            <h5>COSMETIC4</h5>
                            <p>Thương hiệu mỹ phẩm nổi bật</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liên kết file footer -->
        <?php require_once('./layouts/_footer.php') ?>
    </div>
    <!-- Liên kết JS -->
    <script src="./public/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./public/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="./public/vendors/fontawesome/js/all.min.js"></script>
    <script src="./public/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>