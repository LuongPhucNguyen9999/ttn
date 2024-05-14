<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./fonts/fontawesome-free-6.2.0-web/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <script src="./js/index.js"></script>
  <title>Document</title>
  <?php echo $this->_metaHTTP; ?>
  <?php echo $this->_metaName; ?>
  <?php echo $this->_title; ?>
  <?php echo $this->_cssFiles; ?>
</head>

<body>
  <div class="app" style="height:100vh">
    <?php include_once 'html/header.php'; ?>
    <div class="container">
      <div class="content">
        <?php
        require_once(MODULE_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php');
        ?>
      </div>
    </div>
    <?php include_once 'html/footer.php'; ?>
  </div>
  <?php echo $this->_jsFiles; ?>
  <script>
    Validator("#register-form");
    Validator("#register-form2");
  </script>
</body>

</html>