<?php

    // Contact us page

    require_once ("db_connection/conn.php");
    $TITLE = "Contacts us";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");

    $post = cleanPost($_POST);
    $name = ((isset($_POST['name']) && !empty($_POST['name'])) ? $post['name'] : '');
    $email = ((isset($_POST['email']) && !empty($_POST['email'])) ? $post['email'] : '');
    $phone = ((isset($_POST['phone']) && !empty($_POST['phone'])) ? $post['phone'] : '');
    $message = ((isset($_POST['message']) && !empty($_POST['message'])) ? $post['message'] : '');

    if ($_POST) {
        // code..
        $message_id = guidv4();
        $createdAt = date("Y-m-d H:i:s A");
        $data = [$message_id, $name, $email, $phone, $message, $createdAt];

        $query = "
            INSERT INTO `gmsa_contacts`(`message_id`, `message_name`, `message_email`, `message_phone`, `message`, `createdAt`) 
            VALUES (?, ?, ?, ?, ?, ?)
        ";
        $statement = $conn->prepare($query);
        $result = $statement->execute($data);

        if ($result) {
            // code...
            echo js_alert("Your message have been sent successfully!");
            redirect(PROOT . 'contact-us');
        } else {
            echo js_alert("Something went wrong, please try again!");
        }
    }


?>
    <main>

        <section class="pt-xl-8">
            <div class="container">
                <div class="row g-4 g-xxl-5">
                    <div class="col-xl-9 mx-auto">
                        <img src="<?= PROOT; ?>assets/media/02.jpg" class="rounded" alt="contact-bg">

                        <div class="row mt-n5 mt-sm-n7 mt-md-n8">
                            <div class="col-11 col-lg-9 mx-auto">
                                <div class="card shadow p-4 p-sm-5 p-md-6">
                                    <div class="card-header border-bottom px-0 pt-0 pb-5">
                                        <nav class="mb-3" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-dots pt-0">
                                                <li class="breadcrumb-item"><a href="<?= PROOT; ?>">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                                            </ol>
                                        </nav>
                                        <h1 class="mb-3 h3">We will like to here from you, anytime</h1>
                                        <p class="mb-0">You can reach us anytime via <a href="mailto:<?= $site_row["about_email"]; ?>"><?= $site_row["about_email"]; ?></a></p>
                                    </div>
                                    <form class="card-body px-0 pb-0 pt-5" method="POST">
                                        <div class="input-floating-label form-floating mb-4">
                                            <input type="text" class="form-control bg-transparent" id="name" name="name" required placeholder="Name" value="<?= $name; ?>">
                                            <label for="name">Your name</label>
                                        </div>
                                        <div class="input-floating-label form-floating mb-4">
                                            <input type="email" class="form-control bg-transparent" id="email" name="email" required placeholder="name@example.com" value="<?= $email; ?>">
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="input-floating-label form-floating mb-4">
                                            <input type="text" class="form-control bg-transparent" id="phone" name="phone" placeholder="Phone" value="<?= $phone; ?>">
                                            <label for="phone">Phone number</label>
                                        </div>
                                        <div class="input-floating-label form-floating mb-4">
                                            <textarea class="form-control bg-transparent" name="message" required placeholder="Leave a comment here" id="message" style="height: 100px"><?= $message; ?></textarea>
                                            <label for="floatingTextarea2">Message</label>
                                        </div>
                                        <button class="btn btn-lg btn-primary mb-0">Send a message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <Section class="py-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card card-body bg-light border p-sm-5">
                            <div class="mb-4"><i class="bi bi-geo-alt fa-xl text-primary"></i></div>
                            <h6 class="mb-4">Office Address</h6>
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar avatar-xxs me-2">
                                    <img class="avatar-img rounded-circle" src="<?= PROOT; ?>assets/media/ghana.png" alt="avatar">
                                </div>
                                <span class="heading-color fw-semibold mb-0">CKT-UTAS office:</span>
                            </div>
                            <address class="mb-0"><?= ucwords($site_row['about_state'] . ', ' . $site_row['about_city']) . ', ' . $site_row['about_street1']; ?></address>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card card-body bg-light border p-sm-5">
                            <div class="mb-4"><i class="bi bi-envelope fa-xl text-primary"></i></div>
                            <h6 class="mb-3">Email us</h6>
                            <p>We're on top of things and aim to respond to all inquiries within 24 hours.</p>
                            <a href="mailto:<?= $site_row["about_email"]; ?>" class="heading-color text-primary-hover text-decoration-underline mb-0"><?= $site_row["about_email"]; ?></a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card card-body bg-light border p-sm-5">
                            <div class="mb-4"><i class="bi bi-telephone fa-xl text-primary"></i></div>
                            <h6 class="mb-3">Call us</h6>
                            <p>Let's work together towards a common goal - get in touch!</p>
                            <a href="tel:<?= $site_row["about_phone"]; ?>" class="heading-color text-primary-hover text-decoration-underline mb-0"><?= $site_row["about_phone"] . (($site_row["about_phone2"] != '') ? ' / ' . $site_row["about_phone2"] : ''); ?></a>
                        </div>
                    </div>

                </div>
            </div>

            <iframe class="w-100 h-200px h-lg-400px grayscale d-block mt-8" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221.61455527218982!2d-1.0799117690523523!3d10.866837179901394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2b5ba167c3ecf1%3A0x54af29111cb78a8b!2sCKt-UTAS%20Campus%20Mosque!5e1!3m2!1sen!2sgh!4v1720855199185!5m2!1sen!2sgh" style="margin-bottom: -5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-hidden="false" tabindex="0"></iframe>

        </Section>

    </main>
<?php include ("inc/footer.inc.php"); ?>