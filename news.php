<?php

    // Contact us page

    require_once ("db_connection/conn.php");
    $TITLE = "News";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");

    $categories = get_category_for_user_view($conn);

    $News = new News;
    $Category = new Category;

    $newsUrl = '';

    if (isset($_GET['url']) && !empty($_GET['url'])) {
        $newsUrl = $_GET['url'];
    }

?>
    
    <main>

        <?php if (isset($_GET['url']) && !empty($_GET['url'])):
            $view = $News->singleView($conn, $newsUrl);
            if ($view == false) {
                redirect(PROOT);
            } else {
                $News->updateViews($conn, $newsUrl);
                echo $view;
            }
        ?>
            <section class="pt-lg-8">
                <div class="container pt-4 pt-lg-0">
                    <div class="row g-4 g-sm-7">
                        <!-- Main content START -->
                        <div class="col-lg-8">
                            <!-- Breadcrumb -->
                            <div class="d-flex position-relative z-index-9">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-dots mb-1">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog single sidebar</li>
                                    </ol>
                                </nav>
                            </div>

                            <!-- Title -->
                            <h1 class="h2 mb-0">The Power of Gratitude: Cultivating Joy and Abundance</h1>

                            <!-- Action -->
                            <div class="d-flex align-items-center flex-wrap mt-4">
                                <a href="#" class="badge text-bg-dark mb-0">Lifestyle</a>
                                <span class="text-secondary opacity-3 mx-3">|</span>
                                <div class="dropdown">
                                    <a href="#" class="text-secondary text-primary-hover" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-share me-2"></i>14
                                    </a>
                                    <!-- Card feed action dropdown menu -->
                                    <ul class="dropdown-menu min-w-auto" aria-labelledby="cardFeedAction">
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-facebook fa-fw me-2"></i>Facebook</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-instagram fa-fw me-2"></i>Instagram</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-whatsapp fa-fw me-2"></i>Whatsapp</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="fa-regular fa-paste fa-fw me-2"></i>Copy link</a></li>
                                    </ul>
                                </div>
                                <span class="text-secondary opacity-3 mx-3">|</span>
                                <a href="#" class="text-secondary text-primary-hover mb-0"><i class="bi bi-chat me-2"></i>5</a>
                                <span class="text-secondary opacity-3 mx-3">|</span>
                                <span class="text-secondary">2 min read</span>
                            </div>

                            <!-- Image -->
                            <img src="assets/images/blog/03.jpg" class="img-fluid rounded mt-5" alt="blog-img">

                            <!-- Content -->
                            <p class="mt-5">Shifting our perspective from lack to abundance. In this article, we will explore the power of gratitude and how it can enhance our overall well-being and create a positive ripple effect in our lives and the lives of those around us. <strong>In a world filled with chaos</strong> and uncertainty, it's easy to lose sight of the things that truly matter.</p>
                            <p>Additionally, expressing gratitude to others through acts of kindness or <u> heartfelt appreciation strengthens our relationships and</u> fosters a sense of interconnectedness.</p>
                            <p>Incorporating gratitude into our daily routine can be as simple as keeping a gratitude journal, where we write down three things we are grateful for each day. <strong>This practice helps us become more attuned</strong> to the positive aspects of our lives, no matter how small they may seem. </p>
                            <p class="mb-0">By reframing obstacles as opportunities for growth and learning, <mark>we can navigate through difficulties with</mark> a sense of gratitude for the lessons they bring. This mindset shift empowers us to find joy and meaning in every circumstance, leading to a more fulfilling and purposeful life.</p>
                        </div>
                        <div class="col-lg-4 ps-xl-6">
                            <div class="align-items-center mt-5">
                                <h6 class="mb-3 d-inline-block">Related post:</h6>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">5 investment doubts you should clarify</a></li>
                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Mastering Responsive Web Design with Bootstrap</a></li>
                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Effortless Web Development with Mizzle</a></li>
                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Sleek and Responsive - Designing with Bootstrap and Mizzle</a></li>
                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Ten questions you should answer truthfully.</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
        <section class="pt-8">
            <div class="container">
                <div class="inner-container text-center mb-6">
                    <h1 class="mb-0 lh-base position-relative">
                        <span class="position-absolute top-0 start-0 mt-n5 ms-n5 d-none d-sm-block">
                            <svg class="fill-primary" width="63.6px" height="93.3px" viewBox="0 0 63.6 93.3" style="enable-background:new 0 0 63.6 93.3;" xml:space="preserve">
                                <path d="M58.5,1.9c0.5,0,1.6,5.3,2.4,11.8c0.8,6.5,1.4,14,1.6,18.5c0.3,8.8-0.5,15.9-1.6,16c-1.1,0-2.1-7.1-2.4-15.8 c-0.2-4.4-0.3-12-0.4-18.4C57.9,7.3,57.9,1.9,58.5,1.9z"/>
                                <path d="M47.7,44.4c-0.5,0.1-1.5-2.1-2.8-4.7c-1.3-2.6-2.8-5.5-3.7-7.2c-1.7-3.4-2.9-6.4-2.1-7c0.8-0.6,3.4,1.5,5.3,5.1 c1,1.8,2.2,5.1,2.9,8.1C48.1,41.8,48.2,44.3,47.7,44.4z"/>
                                <path d="M36.2,53.4c-0.2,0.5-4.1-1.2-8.5-3.5c-4.4-2.3-9.5-5.4-12.3-7.3c-5.6-3.9-9.6-7.9-9-8.8c0.6-0.9,5.4,1.7,11,5.5 c2.8,1.9,7.5,5.3,11.6,8.2C33.1,50.5,36.4,53,36.2,53.4z"/>
                                <path d="M27.2,68.3c-0.1,0.5-2.1,0.7-4.4,0.6c-2.4,0-5.1-0.3-6.7-0.7c-3.1-0.6-5.4-2-5.2-3c0.2-1,2.9-1.2,5.9-0.5 c1.5,0.3,4.1,1,6.3,1.7C25.4,67.1,27.2,67.8,27.2,68.3z"/>
                                <path d="M30.8,83.2c0.1,0.5-3.5,1.7-7.7,3.1c-4.3,1.4-9.2,3.1-12.1,4.1c-5.7,1.9-10.6,3.1-11,2.1 c-0.4-0.9,3.9-3.6,9.8-5.6c2.9-1,8.1-2.4,12.6-3.2C26.9,83,30.7,82.7,30.8,83.2z"/>
                            </svg>
                        </span>
                        Thoughts, stories and ideas from GMSA - CKTUTAS
                    </h1>

                    <form class="col-md-7 bg-light border rounded-2 position-relative mx-auto p-2 mt-4 mt-md-5">
                        <div class="input-group">
                            <input class="form-control focus-shadow-none bg-light border-0 me-1" type="email" placeholder="Search blog">
                            <button type="button" class="btn btn-dark rounded-2 mb-0"><i class="bi bi-search me-2"></i>Search</button>
                        </div>
                    </form>
                </div>

                <h6 class="mb-4">Blog category</h6>
                <!-- Slider START -->
                <div class="swiper" data-swiper-options='{
                    "slidesPerView": 2, 
                    "spaceBetween": 30,
                    "pagination":{
                        "el":".swiper-pagination",
                        "clickable":"true"
                    },
                    "breakpoints": {
                        "576": {"slidesPerView": 3},
                        "992": {"slidesPerView": 5}
                    }}'>
                        <div class="swiper-wrapper">
                        <?php if (is_array($categories)): ?>
                            <?php foreach ($categories as$category): ?>
                                <div class="swiper-slide">
                                    <a href="<?= PROOT; ?>category/<?= $category['category_url']; ?>" class="card card-img-scale overflow-hidden">
                                        <div class="card">
                                            <div class="badge text-bg-dark"><?= ucwords($category['category']); ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                    <div class="swiper-pagination swiper-pagination-primary position-relative mt-4"></div>
                </div>
            </div>
        </section>


        <section class="pt-0">
            <div class="container">
                <div class="row g-xl-7">
                    <div class="col-lg-8">
                        <h4 class="mb-4">Our Blog</h4>
                        <div id="load-content"></div>
                    </div>

                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <div class="card card-body bg-light p-4">
                            <svg class="mb-3" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1113_392)">
                                <path class="fill-primary" d="M22.5492 24.7427C23.8548 25.6131 26.1456 25.6132 27.4515 24.7426C27.4517 24.7425 27.452 24.7423 27.4522 24.7422L49.7048 9.90706C48.9749 7.79611 46.9686 6.27539 44.6128 6.27539H5.38754C3.03156 6.27539 1.0254 7.79611 0.29541 9.90706L22.5485 24.7423C22.5488 24.7425 22.549 24.7425 22.5492 24.7427Z"/>
                                <path class="fill-mode" d="M29.077 27.1812C29.0767 27.1814 29.0765 27.1816 29.0763 27.1817C27.9335 27.9435 26.4665 28.3244 25 28.3244C23.5332 28.3244 22.0668 27.9436 20.9239 27.1816C20.9237 27.1815 20.9236 27.1814 20.9234 27.1813L0 13.2324V38.3373C0 41.3077 2.41672 43.7244 5.38735 43.7244H44.6128C47.5834 43.7244 50 41.3077 50 38.3373V13.2324L29.077 27.1812Z"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1113_392">
                                <rect width="50" height="50" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                            <h6 class="mb-3">Get the latest GMSA article delivered to your inbox</h6>
                            <form>
                                <input type="email" id="subscribe" name="subscribe" class="form-control mb-2" placeholder="Email address">
                                <button type="button" onclick="subscribe_news(); return false;" class="btn btn-dark mb-0">Subscribe</button>
                            </form>
                        </div>

                        <?php if ($site_row['ads'] != ''): ?>
                            <div class="card text-bg-dark mt-5">
                                <img src="<?= PROOT . $site_row['ads']; ?>" class="card-img" alt="adv image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Advertisement</h5>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="mt-5">
                            <h6 class="mb-3">Follow us on:</h6>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"> <a target="_blank" class="btn btn-round bg-facebook" href="<?= $site_row['facebook']; ?>"><i class="bi bi-facebook lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a target="_blank" class="btn btn-round bg-instagram" href="<?= $site_row['instagram']; ?>"><i class="bi bi-instagram lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a target="_blank" class="btn btn-round bg-twitter" href="<?= $site_row['twitter']; ?>"><i class="bi bi-twitter lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a target="_blank" class="btn btn-round bg-linkedin" href="<?= $site_row['linkedin']; ?>"><i class="bi bi-linkedin lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a target="_blank" class="btn btn-round bg-youtube" href="<?= $site_row['youtube']; ?>"><i class="bi bi-youtube lh-base"></i></a> </li>
                            </ul>
                        </div>

                        <!-- <div class="align-items-center mt-5">
                            <h6 class="mb-3 d-inline-block">Popular Tags:</h6>
                            <ul class="list-inline mb-0 social-media-btn">
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">blog</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">business</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">bootstrap</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">data science</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">deep learning</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Adventure</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Community</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Tutorials</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Interview</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Photography</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Classic</a> </li>
                            </ul>
                        </div> -->

                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>
<?php include ("inc/footer.inc.php"); ?>
<script type="text/javascript">
     // SEARCH AND PAGINATION FOR LIST
    function load_data(page, query = '') {
        $.ajax({
            url : "<?= PROOT; ?>auth/fetch.news.posts.php",
            method : "POST",
            data : {
                page : page, 
                query : query
            },
            success : function(data) {
                $("#load-content").html(data);
            }
        });
    }

    load_data(1);
    $('#search').keyup(function() {
        var query = $('#search').val();
        load_data(1, query);
    });

    $(document).on('click', '.page-link-go', function() {
        var page = $(this).data('page_number');
        var query = $('#search').val();
        load_data(page, query);
    });

    // SUBSCRIBE TO NEW
    function subscribe_news() {
        var email = $('#subscribe').val();

        if (email == '') {
            alert('Enter email to subscribe');
            return false;
        } else if (!isEmail(email)) {
            alert('Please enter a valid email.');
            return false;
        } else {
            $.ajax({
                url : '<?= PROOT; ?>auth/subscriber.php',
                method : 'POST',
                data : {email : email},
                success : function(data) {
                    alert(data);
                    location.reload();
                },
                error : function() {
                    alert('Something went wrong.');
                }
            });
        }

    }
</script>