    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

  <!-- Alertify JS -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <script>
      alertify.set('notifier', 'position', 'top-right');
      <?php 
          if (isset($_SESSION['message']))
          { 
              ?>
                alertify.success('<?= $_SESSION['message']; ?>');
              <?php
              unset($_SESSION['message']);
          } 
      ?>
  </script>

  </body>
</html>