<!DOCToolsYPE html>
<html>
	<head>
		<title><?= $this->config( 'title' ) ?></title>
		<meta charset="<?= $this->config( 'charset' ) ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="<?= Tools::url( 'images/favicon.png' ) ?>" rel="shortcut icon" type="image/png" />
		<link href="<?= Tools::url( 'css/vazir.css' ) ?>" rel="stylesheet" type="text/css" />
		<link href="<?= Tools::url( 'font/fontawsome/css/all.min.css' ) ?>" rel="stylesheet" type="text/css" />
		<link href="<?= Tools::url( 'css/bootstrap.min.css' ) ?>" rel="stylesheet" type="text/css" />
		<link href="<?= Tools::url( 'css/bootstrap.rtl.css' ) ?>" rel="stylesheet" type="text/css" />
		<link href="<?= Tools::url( 'css/base-styles.css' ) ?>" rel="stylesheet" type="text/css" />
		<link href="<?= Tools::url( 'css/styles.css' ) ?>" rel="stylesheet" type="text/css" />
	</head>
	<body>

		<section class="container">

			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand ml-4" href="#"><?= $this->config( 'title' ) ?></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">صفحه اصلی</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">لینک</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dropdown
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="جستجو" aria-label="Search">
						<button class="btn btn-primary my-2 my-sm-0" type="submit">جستجو</button>
					</form>
					<div class="form-inline my-2 my-lg-0">
						<a class="nav-link" href="#">عضویت</a>
						<span> / </span>
						 <a class="nav-link" href="#">ورود</a>
						 <a class="btn btn-danger" href="#">خروج</a>
					</div class="form-inline my-2 my-lg-0">
				</div>
			</nav>

			<div class="content">
				<?= $content ?>
			</div>

			<footer class="footer">
				<p>&copy <?= Tools::getDate( '2020', 'Y' ) ?></p>
			</footer>
		</section>


		<script src="<?= Tools::url( 'js/jquery.min.js' ) ?>" type="text/javascript"></script>
		<script src="<?= Tools::url( 'js/bootstrap.min.js' ) ?>" type="text/javascript"></script>
		<script src="<?= Tools::url( 'js/scripts.js' ) ?>" type="text/javascript"></script>
	</body>
</html>
