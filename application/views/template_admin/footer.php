        <!-- Footer Start -->
        <footer class="footer">
          <div class="credit">
            <p>Created by <b>Fauzan Rahmani Ahdan</b> | &copy; <?= date('Y'); ?>.</p>
          </div>
        </footer>

      </main>
    </div>
    
    <!-- My Javascript -->
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
            
    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
            
    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

    <script src="<?= base_url('assets/'); ?>js/admin.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
      $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/dashboard_admin/changeaccess'); ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function() {
            document.location.href = "<?= base_url('admin/dashboard_admin/roleaccess/'); ?>" + roleId;
          }
        });
      });
    </script>

  </body>
</html>
