<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Saper</title>
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/sass.css">
</head>
<body>
<div class="container">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Saper</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <section>

    <table class="board">
      <tr>
        <td class="blank one"><span></span></td>
        <td class="blank two"><span></span></td>
        <td class="blank three"><span></span></td>
        <td class="blank four"><span></span></td>
      </tr>
      <tr>
        <td class="blank five"><span></span></td>
        <td class="blank six"><span></span></td>
        <td class="blank seven"><span></span></td>
        <td class="blank eight"><span></span></td>
      </tr>
      <tr>
        <td class="blank"><span></span></td>
        <td class="blank"><span></span></td>
        <td class="blank"><span></span></td>
        <td class="blank"><span></span></td>
      </tr>
      <tr>
        <td class="blank mine-red"><img src=""></td>
        <td class="flag"><img src=""></td>
        <td class="mine"><img src=""></td>
        <td class="covered"><img src=""></td>
      </tr>
    </table>

  </section>

  <footer>
    JS na NaN%
  </footer>

</div>
</body>
</html>