<?php 
    require_once ("../db_connection/conn.php");
    // if (!admin_is_logged_in()) {
    //     admn_login_redirect();
    // }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");
    $Category = new Category;
    $News = new News;

    $message = '';
    // CATEGORY
    $category = (isset($_POST['category']) ? sanitize($_POST['category']) : '');

    // category edit
    if ((isset($_GET['status']) && $_GET['status'] == 'edit_category')) {
        $id = sanitize((int)$_GET['id']);

        $sql = "
            SELECT * FROM gmsa_categories 
            WHERE id = ? 
            LIMIT 1
        ";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        $row = $statement->fetchAll();
        if ($statement->rowCount() > 0) {
            $category =  (isset($_POST['category']) ? sanitize($_POST['category']) : $row[0]['category']);
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/category');
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
                $q = "
                    INSERT INTO gmsa_categories (category, category_url) 
                    VALUES (?, ?)
                ";
                if (isset($_GET['status']) && $_GET['status'] == 'edit_category') {
                    $q = "
                        UPDATE gmsa_categories 
                        SET category = ?, category_url = ?
                        WHERE id = " . $id . "
                    ";
                }
                $statement = $conn->prepare($q);
                $result = $statement->execute([$category, $category_url]);
                if (isset($result)) {
                    $_SESSION['flash_success'] = ucwords($category) . ' successfully ' . ((isset($_GET['status']) && $_GET['status'] == 'edit_category') ? 'updated' : 'added') . '!';        
                    redirect(PROOT . 'admin/blog/category');
                } else {
                    echo js_alert('Something went wrong, please try again');
                    redirect(PROOT . 'admin/blog/category');
                }
            }
        } else {
            $message = 'Category name required.';
        }
    }

    // DELETE A Category
    if ((isset($_GET['type']) && $_GET['type'] == 'category') && (isset($_GET['status']) && $_GET['status'] == 'delete')) {
        $delete = sanitize((int)$_GET['id']);
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
        // dnd($_GET['featured']);
        $feature = $News->featuredNews($conn, (int)$_GET['featured'], (int)$_GET['id']);
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
    $news_created_by = 1; //(int)$admin_id;

    // news edit
    if (isset($_GET['status']) && $_GET['status'] == 'edit_news') { 
        $id = sanitize((int)$_GET['id']);
        $sql = "
            SELECT * FROM tein_news 
            WHERE id = ? 
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
                
                if ($_POST['uploaded_image'] != '') {
                    unlink($_POST['uploaded_image']);
                }
            } else {
                $message = '<div class="alert alert-danger">Passport Picture Can not be Empty</div>';
            }
        } else {
            $news_media = $_POST['uploaded_news_media'];
        }

        $query = "
            INSERT INTO `tein_news`(`news_title`, `news_url`, `news_content`, `news_media`, `news_category`, `news_created_by`) 
            VALUES (?, ?, ?, ?, ?, ?)
        ";
        if (isset($_GET['status']) && $_GET['status'] == 'edit_news') {
            $query = "
                UPDATE tein_news 
                SET news_title = ?, news_url = ?,  news_content = ?,  news_media = ?,  news_category = ?, news_created_by = ?
                WHERE id = " . $id . "
            ";
        }
        $statement = $conn->prepare($query);
        $result = $statement->execute([$news_title, $news_url, $news_content, $news_media, $news_category, $news_created_by]);
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
        $result = $News->deleteNewsMedia($conn, (int)$_GET['delete_np'], sanitize($_GET['image']));
        if ($result) {
            $_SESSION['flash_success'] = 'Media deleted, upload new one!';            
            redirect(PROOT . 'admin/blog/add/edit_news/' . (int)$_GET['delete_np']);
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
            redirect(PROOT . 'admin/blog/add/edit_news/' . (int)$_GET['delete_np']);
        }
    }

    // Delete news
    if (isset($_GET['type']) && $_GET['type'] == 'add') {
        if (isset($_GET['status']) && $_GET['status'] == 'delete') {
            // code...
            $delete = $News->deleteNews($conn, sanitize((int)$_GET['id']));
            if (isset($delete)) {
                $_SESSION['flash_success'] = 'News deleted but temporary';
                redirect(PROOT . 'admin/blog/all');
            } else {
                $_SESSION['flash_error'] = 'Something went wrong, please try again';
                redirect(PROOT . 'admin/blog/all');
            }
        }
    }


    // delete subscriber
    if (isset($_GET['status']) && $_GET['status'] == 'delete_subscriber') {
        $delete = $News->deleteSubscriber($conn, (int)$_GET['id']);
        if ($delete) {
            // code...
            $_SESSION['flash_success'] = 'Subscriber deleted!';            
            redirect(PROOT . 'admin/blog/subscribers/' . (int)$_GET['delete_np']);
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
            redirect(PROOT . 'admin/blog/subscribers/' . (int)$_GET['delete_np']);
        }
    }
?> 
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> News </h1>
                            <div class="btn-toolbar">
                                <a href="<?= PROOT; ?>admin/blog/<?= ((isset($_GET['type']) && $_GET['type'] != 'all') ? 'all' : 'add'); ?>" class="btn btn-light"> <span class="ml-1"><?= ((isset($_GET['type']) && $_GET['type'] != 'all') ? ' * All' : ' + Add'); ?> News</span></a>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-expanded="false"><span>More</span> <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <div class="dropdown-arrow"></div>
                                        <a href="#" class="dropdown-item">Add tasks</a> 
                                        <a href="#" class="dropdown-item">Invite members</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Share</a> 
                                        <a href="#" class="dropdown-item">Archive</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div><?= $flash; ?></div>
                    <div class="page-section">
                        <div class="card card-fluid">

                            <?php if (isset($_GET['type'])): ?>
                                <?php if ($_GET['type'] == 'all'): ?>
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
                                                    echo $News->allNews($conn);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php elseif ($_GET['type'] == 'subscribers'): ?>
                                <?php elseif ($_GET['type'] == 'category' || (isset($_GET['status']) && $_GET['status'] == 'edit_category')): ?>
                                    <div class="container-fluid mt-4">
                                        <div>
                                            <code><?= $message; ?></code>
                                            <form method="POST" action="<?= ((isset($_GET['status']) && $_GET['status'] == 'edit_category') ? '?edit_category=' . (int)$_GET['id'] : ''); ?>">
                                                <div class="mb-3">
                                                    <div>
                                                        <label for="category" class="form-label">Category</label>
                                                        <input type="text" class="form-control form-control-sm" id="category" name="category" placeholder="Category name" value="<?= $category; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="mt-2 mb-2">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary" name="submit_category" id="submit_category"><?= (isset($_GET['status']) && $_GET['status'] == 'edit') ? 'Update': 'Add'; ?> Category</button>
                                                    <?php if ((isset($_GET['status']) && $_GET['status'] == 'edit_category')): ?>
                                                        <a href="<?= PROOT; ?>admin/blog/category">Cancel</a>
                                                    <?php endif ?>
                                                </div>
                                            </form>
                                        </div>

                                        <table class="table table-sm text-white table-bordered my-4" style="width: auto; margin: 0 auto;">
                                            <thead>
                                                <tr style="color: #A7A7A7; font-weight: 700;">
                                                    <th></th>
                                                    <th>Category</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <?php 
                                                    echo $Category->allCategory($conn);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php elseif ($_GET['type'] == 'add' || (isset($_GET['status']) && $_GET['status'] == 'edit_news')): ?>
                                    <!-- ADD NEWS -->
                                    <div class="container-fluid mt-4">
                                        <?= $message; ?>
                                        <form method="POST" enctype="multipart/form-data" action="<?= ((isset($_GET['status']) && $_GET['status'] == 'edit_news') ? '?edit_news=' . (int)$_GET['id'] : ''); ?>">
                                            <div class="mb-3">
                                                <label for="news_title">Heading</label>
                                                <input type="text" class="form-control form-control-sm" name="news_title" id="news_title" value="<?= $news_title; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="news_category">Category</label>
                                                <select type="text" class="form-control form-control-sm" name="news_category" id="news_category" required>
                                                   <option value="" <?= (($news_category == '') ? 'selected' : ''); ?>>...</option>
                                                    <?php foreach ($Category->listCategory($conn) as $category_row): ?>
                                                        <option value="<?= $category_row['id']; ?>" <?= (($news_category == $category_row['id']) ? 'selected' : ''); ?>><?= ucwords($category_row['category']); ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="news_content" class="form-label">Content</label>
                                                <textarea name="news_content" id="news_content" rows="9" class="form-control form-control-sm" required><?= $news_content; ?></textarea>
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
                                                    <input type="file" class="form-control form-control-sm" id="news_media" name="news_media" required>
                                                    <span id="upload_file"></span>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <input type="hidden" name="uploaded_news_media" id="uploaded_news_media" value="<?= $news_media; ?>">

                                            <div class="mt-2 mb-3">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary" name="submitNews" id="submitNews"><?= (isset($_GET['status']) && $_GET['status'] == 'edit_news') ? 'Update': 'Create'; ?> News</button>
                                                <?php if (isset($_GET['status']) && $_GET['status'] == 'edit_news'): ?>
                                                    <br><br>
                                                    <a href="<?= PROOT; ?>admin/blog/all" class="button text-secondary">Cancel</a>
                                                <?php endif ?>
                                            </div>
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

