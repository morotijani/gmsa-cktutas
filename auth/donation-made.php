<?php

    // Pay dues page

    require_once ("./../db_connection/conn.php");
    $TITLE = "Dues Paid";
    $navTheme = "";
    include ("../inc/header.inc.php");

    $message = '';
    if (isset($_GET['url']) && !empty($_GET['url'])) {
        // code...
        $reference = sanitize($_GET['url']);
        $donation = find_donation_details_with_refence($conn, $reference);
        if (is_array($donation)) {
            
            
        } else {
            $message = 404;
        }

    }


?>
    <main>

        <section class="pt-8">
            <div class="container">
                <div class="inner-container mb-6">
                    <h1 class="mb-0 lh-base position-relative text-center">
                        <span class="position-absolute top-0 start-0 mt-n5 ms-n5 d-none d-sm-block">
                            <svg class="fill-primary" width="63.6px" height="93.3px" viewBox="0 0 63.6 93.3" style="enable-background:new 0 0 63.6 93.3;" xml:space="preserve">
                                <path d="M58.5,1.9c0.5,0,1.6,5.3,2.4,11.8c0.8,6.5,1.4,14,1.6,18.5c0.3,8.8-0.5,15.9-1.6,16c-1.1,0-2.1-7.1-2.4-15.8 c-0.2-4.4-0.3-12-0.4-18.4C57.9,7.3,57.9,1.9,58.5,1.9z"/>
                                <path d="M47.7,44.4c-0.5,0.1-1.5-2.1-2.8-4.7c-1.3-2.6-2.8-5.5-3.7-7.2c-1.7-3.4-2.9-6.4-2.1-7c0.8-0.6,3.4,1.5,5.3,5.1 c1,1.8,2.2,5.1,2.9,8.1C48.1,41.8,48.2,44.3,47.7,44.4z"/>
                                <path d="M36.2,53.4c-0.2,0.5-4.1-1.2-8.5-3.5c-4.4-2.3-9.5-5.4-12.3-7.3c-5.6-3.9-9.6-7.9-9-8.8c0.6-0.9,5.4,1.7,11,5.5 c2.8,1.9,7.5,5.3,11.6,8.2C33.1,50.5,36.4,53,36.2,53.4z"/>
                                <path d="M27.2,68.3c-0.1,0.5-2.1,0.7-4.4,0.6c-2.4,0-5.1-0.3-6.7-0.7c-3.1-0.6-5.4-2-5.2-3c0.2-1,2.9-1.2,5.9-0.5 c1.5,0.3,4.1,1,6.3,1.7C25.4,67.1,27.2,67.8,27.2,68.3z"/>
                                <path d="M30.8,83.2c0.1,0.5-3.5,1.7-7.7,3.1c-4.3,1.4-9.2,3.1-12.1,4.1c-5.7,1.9-10.6,3.1-11,2.1 c-0.4-0.9,3.9-3.6,9.8-5.6c2.9-1,8.1-2.4,12.6-3.2C26.9,83,30.7,82.7,30.8,83.2z"/>
                            </svg>
                        </span>
                        <?= (($message == 200) ? 'Your GMSA dues has been successfully paid!<br> Thank you.' : '<span class="text-danger">Your GMSA dues has NOT been paid, please go and make payment</span>!'); ?>
                    </h1>
                    <?php if ($message == 200): ?>
                        <div class="card shadow p-4 p-sm-5 p-md-6 mt-3" id="print-area">
                            <div class="card-header border-bottom px-0 pt-0 pb-5 text-center">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <img src="<?= PROOT; ?>assets/media/logo/logo.png" class="img-fluid" style="width: 100px;">
                                    </div>
                                    <div class="">
                                        <h1 class="mb-3 h6">Bismillahir Rahmanir Rahim <br>In the name of Allah, most Gracious, most merciful</h1>
                                        <p class="mb-0">GHANA MUSLIM STUDENTS ASSOCIATION <br>C.K TEDAM UNIVERSITY OF TECHNOLOGY AND APPLIED SCIENCES</p>
                                    </div>
                                    <div class="">
                                        <img src="<?= PROOT; ?>assets/media/logo/CK-LOGO.png" class="img-fluid" style="width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <button type="submit" class="btn border mb-3">Oficial Reciept</button>
                                    </div>
                                    <div class="" >
                                        <input type="text" style="border-bottom: 2px dashed;" class="form-control-plaintext text-center" readonly value="<?= date("jS F, Y");?>">
                                    </div>
                                </div>
                                <div class="my-4">
                                    <b>Received from:</b> <span style="border-bottom: 2px dashed;"><?= ucwords($student_row['member_firstname'] . ' ' . $student_row['member_middlename'] . ' ' . $student_row['member_lastname']); ?></span>
                                </div>
                                <div class="my-4">
                                    <b>The sum of:</b> <span style="border-bottom: 2px dashed;"><?= ucfirst(convertNumber(number_format($student['transaction_amount'], 2))); ?> Ghana cedis</span>
                                </div>
                                <div class="my-4">
                                    <b>Being part / full payment for:</b> <span style="border-bottom: 2px dashed;"><?= $payment_status; ?></span>
                                </div>
                                <div class="d-flex my-4">
                                    <div class="flex-grow-1">
                                        <div class="">
                                            <b>Reference No:</b> <span style="border-bottom: 2px dashed;"><?= $reference; ?></span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <b>Balance:</b> <span style="border-bottom: 2px dashed;"><?= money($AMOUNT, 2); ?> Ghana cedis</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <button type="submit" class="btn border mb-3"><?= money($student['transaction_amount']); ?>p</button>
                                    </div>
                                    <div class="">
                                        <img src="<?= PROOT . $site_row['signature']; ?>" style="width: 75px; height: 75px;">
                                        <br>
                                        <b>Signature</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-5 text-center">
                            <a href="<?= PROOT; ?>" class="btn btn-dark">Go home.</a>&nbsp;
                            <button type="button" onclick="printDiv('print-area')" href="<?= PROOT; ?>" class="btn btn-light">Print receipt.</button>
                        </div>
                    <?php else: ?>
                        <div class="my-5">
                            <a href="<?= PROOT; ?>auth/pay-dues" class="btn btn-dark">Pay dues.</a>&nbsp;
                            <a href="<?= PROOT; ?>" class="btn btn-light">Go home.</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="container-fluid overflow-hidden">
                <div class="row g-4 g-lg-3 justify-content-lg-between">
                    <div class="col-6 col-sm-4 position-relative ms-lg-n5">
                        
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script type="text/javascript" src="<?= PROOT; ?>dist/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/functions.js"></script>

    <script type="text/javascript">
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>