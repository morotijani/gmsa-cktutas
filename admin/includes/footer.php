            <footer class="app-footer">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="<?= PROOT; ?>policy-privacy">Documentation</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="<?= PROOT; ?>policy-privacy">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="<?= PROOT; ?>tc">Terms of Service</a>
                    </li>
                </ul>
                
                <div class="copyright" id="copyright"> Copyright &copy; 2021 - <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>. </div>
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

    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    </script>
</body>
</html>