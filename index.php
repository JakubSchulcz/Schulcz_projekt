<?php
    require('partials/header.php');
?>

  <?php
    require('partials/banner.php')
  ?>
  
  
  <?php
    require ('partials/visit.php');
  ?>


  <?php
    require ('partials/footer.php')
  ?>

  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });
  </script>

  </body>

</html>
