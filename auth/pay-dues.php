<?php

    // Pay dues page

    require_once ("./../db_connection/conn.php");
    $TITLE = "Pay Dues";
    $navTheme = "";
    include ("../inc/header.inc.php");

    if (isset($_GET['url']) && !empty($_GET['url'])) {
        // code...
        $studentid = sanitize($_GET['url']);
        $student = find_member_by_studentID($conn, $studentid);
        $amountToPay = 0;
        $level = '';
        if (is_array($student)) {
            $a = get_amount_to_pay_using_level($conn, $studentid, $student['member_level']);

            if (is_array($student)) {
                $amountToPay = $a['levelAmount'];
                $level = $a['level'];
            }

        } else {
           echo js_alert('Student not found!');
           redirect(PROOT . 'auth/pay-dues');
        }

    }


?>
    <main>
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
                        Pay your GMSA yearly dues.
                    </h1>
                    <?php if (isset($_GET['url']) && !empty($_GET['url'])): ?>
                    <form id="paymentForm" class="col-md-7 bg-light border rounded-2 position-relative mx-auto p-2 mt-4 mt-md-5">
                       <div class="input-floating-label form-floating mb-4">
                            <input type="email" class="form-control bg-transparent" id="studentid" readonly value="<?= $studentid; ?>">
                            <label for="floatingInput">Student ID</label>
                        </div>
                        <div class="input-floating-label form-floating mb-4 mb-3">
                            <input type="text" class="form-control bg-transparent" id="level" readonly value="<?= $level; ?>">
                            <label for="floatingPassword">Level</label>
                        </div>
                        <div class="input-floating-label form-floating mb-4 mb-3">
                            <input type="text" class="form-control bg-transparent" id="email" value="<?= $student['member_email']; ?>">
                            <label for="floatingPassword">Email</label>
                        </div>
                        <div class="input-floating-label form-floating mb-4 mb-3">
                            <input type="tel" class="form-control bg-transparent" id="amount" min="10" value="<?= $amountToPay; ?>">
                            <label for="floatingPassword">Amount to pay</label>
                        </div>
                        <button type="submit" onclick="payWithPaystack()" class="btn btn-primary mb-0">Pay now</button>&nbsp;
                        <a href="<?= PROOT; ?>auth/pay-dues" class="btn mb-0">Cancel</a>
                    </form>
                    <?php else: ?>
                        <form class="col-md-7 bg-light border rounded-2 position-relative mx-auto p-2 mt-4 mt-md-5" method="GET">
                            <div class="input-group">
                                <input class="form-control focus-shadow-none bg-light border-0 me-1" type="text" autocomplete="off" autofocus id="url" name="url" placeholder="Student ID">
                                <button id="dues_next" class="btn btn-dark rounded-2 mb-0"><i class="bi bi-forward-fill me-2"></i>Next</button>
                            </div>
                        </form>
                        <a href="<?= PROOT; ?>" class="btn mb-0 mt-4 text-decoration-underline">Cancel</a>
                        <br>
                        <small>Not registered yet? <a href="<?= PROOT; ?>auth/register">register here</a></small>
                    <?php endif ?>
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
    <script src="https://js.paystack.co/v1/inline.js"></script>


    <script type="text/javascript">

        $(document).ready(function() {
            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack, false);

            function payWithPaystack(e) {
                e.preventDefault();

                const amount = document.getElementById("amount").value
                let handler = PaystackPop.setup({
                    key: '<?= PAYSTACK_TEST_PUBLIC_KEY; ?>', // Replace with your public key
                    email: document.getElementById("email").value,
                    amount: amount * 100,
                    currency: 'GHS',
                    channels: ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'], 
                    ref: 'GMSA'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                    onClose: function(){
                    alert('Window closed.');
                    },
                    callback: function(response) {
                        var reference = response.reference;
                        var student_id = '<?= $studentid; ?>'
                        var level = '<?= $level; ?>';
                        $.ajax ({
                            url: '<?= PROOT; ?>auth/dues.payment.php',
                            method : 'POST',
                            data: {
                                student_id : student_id, 
                                level : level, 
                                reference : reference,
                                amount : amount
                            },
                            success : function(data) {
                                if (data == '') {
                                    window.location = '<?= PROOT; ?>auth/dues-paid/'+reference;
                                }
                            }
                        })

                        let message = 'Payment complete! Reference: ' + response.reference;
                        alert(message);
                    }
                });
                if (amount <= <?= $amountToPay; ?>) {
                    if (amount > 0) {
                        handler.openIframe();
                    } else {
                        //alert('you cannot not pay less than 10ghc');
                        return false;
                    }
                } else {
                    alert('you cannot not pay more');
                    return false;
                }
            }
        });
    </script>

</body>
</html>