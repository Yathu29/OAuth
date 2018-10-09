<?php
require './login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>OAuth IT15079596</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script>
    function reDir() {
        var link="<?php echo $OAuthLink; ?>";
        location.replace(link)
    }
  </script>


</head>

<body>
    <?php if(isset($_SESSION['access_token'])) : ?>

      <div align="center">
        <h1><?php echo $user->getField('name'); ?></h1>
        <img src="<?php echo "//graph.facebook.com/",$user->getField('id'),"/picture" ?>">
        <button type="button" class="btn btn-warning">
          <a style="text-decoration: none;" href="logout.php">Sign Out</a>
        </button>
      </div>

    <?php else : ?>
    <script>
      reDir();
    </script>
      
    <?php endif; ?>
</body>
</html>
