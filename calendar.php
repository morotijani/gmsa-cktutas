<?php

    // Calendar page

    require_once ("db_connection/conn.php");
    $TITLE = "Calendar";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
<style type="text/css">
    *, body {
    font-family: "Montserrat" !important;
    font-optical-sizing: auto;
/*      font-weight: <weight>;*/
    font-style: normal;
}
</style>
    
    <main>

        <section class="">
            <div class="container-fluid">
                <h2 class="text-decorated text-decorated-padding text-uppercase font-weight-bold">Full <br>calendar</h2>
                
                <div id='calendar' class="mb-5"></div>

                <div class="row" data-aos="fade-up">
                    <div class="col text-center">
                        <p><span class="badge bg-success text-blue mr-1">GMSA</span> we give you all prayer time and details. <a href="<?= PROOT; ?>prayer-time" class="link">Prayer time</a></p>
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php include ("inc/footer.inc.php"); ?>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
    </script>
