            <footer class="app-footer">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Terms of Service</a>
                    </li>
                </ul>
                
                <div class="copyright" id="copyright"> Copyright &copy; 2021 - <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script> . All right reserved. </div>
            </footer>
        </main>

    </div>

    <!-- BEGIN BASE JS -->
    <script src="<?= PROOT; ?>admin/dist/js/jquery.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/popper.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/bootstrap.min.js"></script>
    <!-- BEGIN PLUGINS JS -->
    <script src="<?= PROOT; ?>admin/dist/js/pace.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/stacked-menu.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/perfect-scrollbar.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/flatpickr.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/jquery.easypiechart.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/Chart.min.js"></script>
    <!-- BEGIN THEME JS -->
    <script src="<?= PROOT; ?>admin/dist/js/theme.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
      
        gtag('js', new Date());
        gtag('config', 'UA-116692175-1');

        // $('#temporary').parent().fadeOut('');
        // Fade out messages
        $("#temporary").fadeOut(6000);

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    </script>
</body>
</html>