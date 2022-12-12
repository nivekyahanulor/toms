 <footer class="main-footer">
        <div class="footer-left">
          <a href="#">SK CARMONA</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <script src="../assets/admin/js/app.min.js"></script>
  <script src="../assets/admin/js/functions.js"></script>
  <script src="../assets/admin/bundles/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/admin/js/page/index.js"></script>
  <script src="../assets/admin/bundles/summernote/summernote-bs4.js"></script>
  <script src="../assets/admin/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/admin/bundles/jquery-ui/jquery-ui.min.js"></script>
  <script src="../assets/admin/js/page/datatables.js"></script>
  <script src="../assets/admin/js/scripts.js"></script>
  <script src="../assets/admin/js/admin.js"></script>
  <script src="../assets/admin/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="../assets/admin/bundles/jquery-steps/jquery.steps.min.js"></script>
  <script src="../assets/admin/js/page/form-wizard.js"></script>
  <script src="../assets/admin/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="../assets/admin/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="../assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../assets/admin/js/page/create-post.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAKOU_JfykYBj4kDS8ryXPSd0kxsygDcGU" ></script>
  <script src="../assets/admin/bundles/gmaps.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js" ></script>

  <?php include('dashboard-overall.php');?>
  <?php include('footer-dashboard-1.php');?>
  <script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
</body>
</html>