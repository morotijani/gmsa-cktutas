<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");
    $Category = new Category;
    $News = new News;

    $total_data = $conn->query("SELECT * FROM gmsa_news WHERE status = 0")->rowCount();

    $message = '';
    // CATEGORY
    $category = (isset($_POST['category']) ? sanitize($_POST['category']) : '');

    // category edit
    if ((isset($_GET['status']) && $_GET['status'] == 'edit_category')) {
        $id = sanitize($_GET['id']);

        $sql = "
            SELECT * FROM gmsa_categories 
            WHERE category_id = ? 
            LIMIT 1
        ";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        $row = $statement->fetchAll();
        if ($statement->rowCount() > 0) {
            $category =  (isset($_POST['category']) ? sanitize($_POST['category']) : $row[0]['category']);
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/blog/category');
        }
    }

    // ADD CATEGORY
    if (isset($_POST['submit_category'])) {
        if (!empty($category)) {
            $check = $conn->query("SELECT * FROM gmsa_categories WHERE category = '".$category."'")->rowCount();
            if (isset($_GET['status']) && $_GET['status'] == 'edit') {
                $check = $conn->query("SELECT * FROM gmsa_categories WHERE category = '" . $category . "' AND id != " . $id . "")->rowCount();
            }
            if ($check > 0) {
                $message = $category . ' already exists.';
            } else {
                $category_url = php_url_slug($category);
                $category_id = guidv4();

                $q = "
                    INSERT INTO gmsa_categories (category, category_url, category_id) 
                    VALUES (?, ?, ?)
                ";
                if (isset($_GET['status']) && $_GET['status'] == 'edit_category') {
                    $category_id = $id;
                    $q = "
                        UPDATE gmsa_categories 
                        SET category = ?, category_url = ?
                        WHERE category_id = ?
                    ";
                }
                $statement = $conn->prepare($q);
                $result = $statement->execute([$category, $category_url, $category_id]);
                if (isset($result)) {
                    $_SESSION['flash_success'] = ucwords($category) . ' successfully ' . ((isset($_GET['status']) && $_GET['status'] == 'edit_category') ? 'updated' : 'added') . '!';        
                    redirect(PROOT . 'admin/blog/category');
                } else {
                    echo js_alert('Something went wrong, please try again');
                    redirect(PROOT . 'admin/blog/category');
                }
            }
        } else {
            $message = 'Category name required!';
        }
    }

    // DELETE A Category
    if ((isset($_GET['type']) && $_GET['type'] == 'category') && (isset($_GET['status']) && $_GET['status'] == 'delete')) {
        $delete = sanitize($_GET['id']);
        $result = $Category->deleteCategory($conn, $delete);
        if ($result) {
            $_SESSION['flash_success'] = 'Category deleted!';            
            redirect(PROOT . 'admin/blog/category');
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/blog/category');
        }
    }  



    /*
    * FEATURE news
    * 
     */
    if (isset($_GET['status']) && $_GET['status'] == 'featured' && !empty($_GET['id']) && !empty($_GET['featured'])) {
        $_GET['featured'] = (($_GET['featured'] == 2) ? 0 : $_GET['featured']);
        $feature = $News->featuredNews($conn, (int)$_GET['featured'], sanitize($_GET['id']));
        if ($feature) {
            $_SESSION['flash_success'] = 'News ' . (($_GET['featured'] == 0) ? 'un-featured' : 'featured') . ' successfully!';
            redirect(PROOT . 'admin/blog/all');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again!';
            redirect(PROOT . 'admin/blog/all');
        }
    }
    
    /*
    * NEWS
    * 
     */
    $news_title = (isset($_POST['news_title']) ? sanitize($_POST['news_title']) : '');
    $news_category = (isset($_POST['news_category']) ? sanitize($_POST['news_category']) : '');
    $news_content = (isset($_POST['news_content']) ? $_POST['news_content'] : '');
    $news_media = '';
    $news_url = php_url_slug($news_title);
    $news_created_by = $admin_data['admin_id'];

    // news edit
    if (isset($_GET['status']) && $_GET['status'] == 'edit_news') { 
        $id = sanitize($_GET['id']);
        $sql = "
            SELECT * FROM gmsa_news 
            WHERE news_id = ? 
            LIMIT 1
        ";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        $row = $statement->fetchAll();
        
        if ($statement->rowCount() > 0) {
            $news_title = (isset($_POST['news_title']) ? sanitize($_POST['news_title']) : $row[0]['news_title']);
            $news_category = (isset($_POST['news_category']) ? sanitize($_POST['news_category']) : $row[0]['news_category']);
            $news_content = (isset($_POST['news_content']) ? $_POST['news_content'] : $row[0]['news_content']);
            $news_media = (($row[0]['news_media'] != '') ? $row[0]['news_media'] : '');
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/blog/add');
        }
    }

    if (isset($_POST['submitNews'])) {
        // UPLOAD PASSPORT PICTURE TO uploadedprofile IF FIELD IS NOT EMPTY
        if ($_POST['uploaded_news_media'] == '') {
            if (!empty($_FILES)) {

                $image_test = explode(".", $_FILES["news_media"]["name"]);
                $image_extension = end($image_test);
                $image_name = md5(microtime()).'.'.$image_extension;

                $news_media = 'assets/media/news/'.$image_name;
                move_uploaded_file($_FILES["news_media"]["tmp_name"], BASEURL . $news_media);
                
                if (isset($_POST['uploaded_image']) && $_POST['uploaded_image'] != '') {
                    unlink($_POST['uploaded_image']);
                }
            } else {
                $message = '<div class="alert alert-danger">Passport Picture Can not be Empty</div>';
            }
        } else {
            $news_media = $_POST['uploaded_news_media'];
        }

        $news_id = guidv4();
        $query = "
            INSERT INTO `gmsa_news`(`news_title`, `news_url`, `news_content`, `news_media`, `news_category`, `news_created_by`, `news_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ";
        if (isset($_GET['status']) && $_GET['status'] == 'edit_news') {
            $news_id = $id;
            $query = "
                UPDATE gmsa_news 
                SET news_title = ?, news_url = ?,  news_content = ?,  news_media = ?,  news_category = ?, news_updated_by = ?
                WHERE news_id = ?
            ";
        }
        $statement = $conn->prepare($query);
        $result = $statement->execute([$news_title, $news_url, $news_content, $news_media, $news_category, $news_created_by, $news_id]);
        if (isset($result)) {
            $_SESSION['flash_success'] = ucwords($news_title) . ' successfully ' . ((isset($_GET['status']) && $_GET['status'] == 'edit_news') ? 'updated' : 'added') . '!';
            redirect(PROOT . 'admin/blog/all');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
            redirect(PROOT . 'admin/blog/all');
        }
    }


    // DELETE A picture on edit news post
    if ((isset($_GET['delete_np']) && !empty($_GET['delete_np'])) && (isset($_GET['image']) && !empty($_GET['image']))) {
        $result = $News->deleteNewsMedia($conn, sanitize($_GET['delete_np']), sanitize($_GET['image']));
        if ($result) {
            $_SESSION['flash_success'] = 'Media deleted, upload new one!';            
            redirect(PROOT . 'admin/blog/add/edit_news/' . sanitize($_GET['delete_np']));
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
            redirect(PROOT . 'admin/blog/add/edit_news/' . sanitize($_GET['delete_np']));
        }
    }

    // Delete news
    if (isset($_GET['type']) && $_GET['type'] == 'add') {
        if (isset($_GET['status']) && $_GET['status'] == 'delete') {
            // code...
            $delete = $News->deleteNews($conn, sanitize($_GET['id']));
            if (isset($delete)) {
                $_SESSION['flash_success'] = 'News deleted but temporary';
                redirect(PROOT . 'admin/blog/all');
            } else {
                $_SESSION['flash_error'] = 'Something went wrong, please try again';
                redirect(PROOT . 'admin/blog/all');
            }
        }
    }

?> 
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> <?= ((isset($_GET['type']) && $_GET['type'] == 'archive') ? '<span class="text-danger">Archive</span>' : '') ; ?> News </h1>
                            <div class="btn-toolbar">
                                <a href="<?= PROOT; ?>admin/blog/<?= ((isset($_GET['type']) && $_GET['type'] != 'all') ? 'all' : 'add'); ?>" class="btn btn-light"> <span class="ml-1"><?= ((isset($_GET['type']) && $_GET['type'] != 'all') ? ' * All' : ' + Add'); ?> News</span></a>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-expanded="false"><span>More</span> <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <div class="dropdown-arrow"></div>
                                        <a href="<?= PROOT; ?>admin/blog/add" class="dropdown-item">Add news</a> 
                                        <a href="<?= PROOT; ?>admin/blog/category" class="dropdown-item">Add Category</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?= PROOT; ?>admin" class="dropdown-item">Dashoard</a> 
                                        <a href="<?= PROOT; ?>admin/blog/archive" class="dropdown-item">Archive</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-fluid">

                            <?php if (isset($_GET['type'])): ?>
                                <?php if ($_GET['type'] == 'all'): ?>
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?= PROOT; ?>admin/blog/all">All (<?= $total_data; ?>)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= PROOT; ?>admin/blog/archive">Archive</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                                </div>
                                                <input type="text" id="search" class="form-control" placeholder="Search record">
                                            </div>
                                        </div>
                                        <div id="load-content"></div>
                                <?php elseif ($_GET['type'] == 'archive'): ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Heading</th>
                                                    <th>Category</th>
                                                    <th>Views</th>
                                                    <th>Date</th>
                                                    <th>Added by</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                    
                                                <?php 
                                                    echo $News->allNews($conn, 1);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php elseif ($_GET['type'] == 'category' || (isset($_GET['status']) && $_GET['status'] == 'edit_category')): ?>
                                    <div class="container-fluid mt-4">
                                        <div>
                                            <form method="POST" action="<?= ((isset($_GET['status']) && $_GET['status'] == 'edit_category') ? '?edit_category=' . sanitize($_GET['id']) : ''); ?>">
                                                <div class="bg-danger text-center"><?= $message; ?></div>
                                                <fieldset>
                                                    <legend>Category</legend>
                                                    <div class="form-group">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="category" name="category" placeholder="Category name" required="" value="<?= $category; ?>"> <label for="category">Category</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success" name="submit_category" id="submit_category"><?= (isset($_GET['status']) && $_GET['status'] == 'edit_category') ? 'Update': 'Add'; ?> Category</button>
                                                        <?php if ((isset($_GET['status']) && $_GET['status'] == 'edit_category')): ?>
                                                            <a href="<?= PROOT; ?>admin/blog/category" class="btn">Cancel</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Category</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <?= $Category->allCategory($conn); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php elseif ($_GET['type'] == 'add' || (isset($_GET['status']) && $_GET['status'] == 'edit_news')): ?>
                                    <!-- ADD NEWS -->
                                    <div class="container-fluid mt-4">
                                        <?= $message; ?>
                                        <form method="POST" enctype="multipart/form-data" action="<?= ((isset($_GET['status']) && $_GET['status'] == 'edit_news') ? '?edit_news=' . sanitize($_GET['id']) : ''); ?>">
                                            <fieldset>
                                                 <legend>Add news</legend>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" name="news_title" id="news_title" value="<?= $news_title; ?>" required>
                                                        <label for="news_title">Heading</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <select type="text" class="custom-select" name="news_category" id="news_category" required>
                                                           <option value="" <?= (($news_category == '') ? 'selected' : ''); ?>>...</option>
                                                            <?php foreach ($Category->listCategory($conn) as $category_row): ?>
                                                                <option value="<?= $category_row['category_id']; ?>" <?= (($news_category == $category_row['category_id']) ? 'selected' : ''); ?>><?= ucwords($category_row['category']); ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <label for="news_category">Category</label>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="news_content" class="form-label">Content</label>
                                                    <textarea name="news_content" id="news_content" rows="9" class="form-control" required><?= $news_content; ?></textarea>
                                                    <div class="form-text text-white">Type in news details.</div>
                                                </div>

                                                <?php if ($news_media != ''): ?>
                                                <div class="mb-3">
                                                    <label>Product Image</label><br>
                                                    <img src="<?= PROOT . $news_media; ?>" class="img-fluid img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
                                                    <a href="<?= PROOT; ?>admin/blog?delete_np=<?= $_GET['id']; ?>&image=<?= $news_media; ?>" class="badge bg-danger">Change Image</a>
                                                </div>
                                                <?php else: ?>
                                                <div class="mb-3">
                                                    <div>
                                                        <label for="news_media" class="form-label">Featured news image</label>
                                                        <input type="file" class="form-control" id="news_media" name="news_media" required>
                                                        <span id="upload_file"></span>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <input type="hidden" name="uploaded_news_media" id="uploaded_news_media" value="<?= $news_media; ?>">

                                                <div class="form-actions mb-2">
                                                    <button type="submit" class="btn btn-secondary" name="submitNews" id="submitNews"><?= (isset($_GET['status']) && $_GET['status'] == 'edit_news') ? 'Update': 'Create'; ?> News</button>
                                                    <?php if (isset($_GET['status']) && $_GET['status'] == 'edit_news'): ?>
                                                        <br><br>
                                                        <a href="<?= PROOT; ?>admin/blog/all" class="btn">Cancel</a>
                                                    <?php endif ?>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <script src="https://cdn.tiny.cloud/1/87lq0a69wq228bimapgxuc63s4akao59p3y5jhz37x50zpjk/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
                                    <script type="text/javascript">
                                        tinymce.init({ 
                                            selector: 'textarea',
                                            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                                            setup: function (editor) {
                                                editor.on('change', function (e) {
                                                    editor.save();
                                                });
                                            }
                                        });
                                    </script>
                                <?php endif; ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
        </main>
    </div>

<?php include ("includes/footer.php"); ?>

    <script type="text/javascript">
     
        $(document).ready(function() {

            // SEARCH AND PAGINATION FOR LIST
            function load_data(page, query = '') {
                $.ajax({
                    url : "<?= PROOT; ?>admin/auth/list.blog.php",
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


            // DELETE TEMPORARY UPLOADED IMAGE
            $(document).on('click', '.removeImg', function() {
                var tempuploded_file_id = $(this).attr('id');

                $.ajax ({
                    url: "<?= PROOT; ?>admin/auth/delete.temporary.uploaded.php",
                    method: "POST",
                    data:{
                        tempuploded_file_id : tempuploded_file_id
                    },
                    success: function(data) {
                        $('#removeTempuploadedFile').remove();
                        $('#passport').css('visibility', 'visible');
                        $('#passport').val('');

                        $('#news_media').css('visibility', 'visible');
                        $('#news_media').val('');
                    }
                });
            });


            // Upload IMAGE Temporary
            $(document).on('change','#news_media', function() {

                var property = document.getElementById("news_media").files[0];
                var image_name = property.name;

                var image_extension = image_name.split(".").pop().toLowerCase();
                if (jQuery.inArray(image_extension, ['jpeg', 'png', 'jpg', 'gif']) == -1) {
                    alert("The file extension must be .jpg, .png, .jpeg, .gif");
                    $('#news_media').val('');
                    return false;
                }

                var image_size = property.size;
                if (image_size > 15000000) {
                    alert('The file size must be under 15MB');
                    return false;
                } else {

                    var form_data = new FormData();
                    form_data.append("news_media", property);
                    $.ajax({
                        url: "<?= PROOT; ?>admin/auth/temporary.upload.news.php",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $("#upload_file").html("<div class='text-success font-weight-bolder'>Uploading news image ...</div>");
                        },
                        success: function(data) {
                            $("#upload_file").html(data);
                            $('#news_media').css('visibility', 'hidden');
                        }
                    });
                }
            });

        });
    </script>

