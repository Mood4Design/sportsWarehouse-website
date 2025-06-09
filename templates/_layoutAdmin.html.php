<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "NO TITLE" ?> - Auth testing</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <div class="site-wrapper">
    <header class="site-header">
      <h1 class="site-title"><a href="index.php">Auth class testing</a></h1>
    </header>
    <main class="main-content">

      <?= $output ?? 'NO TEMPLATE CONTENT - $output not defined' ?>
      
    </main>
    <footer class="site-footer">
      <p class="copyright">Copyright &copy;2023 Mike Kirkwood-Smith.</p>
    </footer>
  </div>
</body>
</html>