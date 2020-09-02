<div class="jumbotron text-center">
	<h1 class="display-4">ورود</h1>
</div>
<?php
if ( Session::get( 'errors' ) !== null ) {
	$errors = Session::get( 'errors' );
	Session::clear('errors');
}
?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-8 col-lg-6">
			<form action="<?= Tools::url( 'user/login' ) ?>" method="POST" class="form-horizontal bg-light p-5 mb-5">
				<?php if(isset($errors['error'])): ?>
				<div class="has-error p-3 text-center">
					<?= $errors['error'] ?>
				</div>
				<?php endif; ?>
				<div class="form-group row <?= (isset( $errors[ 'email' ] ) ? 'has-error' : '') ?>">
					<label for="email" class="col-12 col-form-label text-lg-right">ایمیل:</label>
					<div class="col-12">
						<input class="form-control" type="email" id="email" name="email" value="" placeholder="ایمیل را وارد کنید...">
					</div>
					<div class="col-12 text-center mt-sm-1">
						<?= (isset( $errors[ 'email' ] ) ? $errors[ 'email' ] : '') ?>
					</div>
				</div>
				<div class="form-group row <?= (isset( $errors[ 'password' ] ) ? 'has-error' : '') ?>">
					<label for="password" class="col-12 col-form-label text-lg-right">رمز عبور:</label>
					<div class="col-12">
						<input class="form-control" type="password" id="password" name="password" placeholder="رمز عبور را وارد کنید...">
					</div>
					<div class="col-12 text-center mt-sm-1">
						<?= (isset( $errors[ 'password' ] ) ? $errors[ 'password' ] : '') ?>
					</div>
				</div>
				<div class="form-group row <?= (isset( $errors[ 'remember' ] ) ? 'has-error' : '') ?>">
					<div class="col-lg-6">
						<span class="form-inline">
							<input type="checkbox" class="form-check ml-2" name="remember" value="1" > مرا به خاطر بسپار
						</span>
						<div class="text-center mt-sm-1">
							<?= (isset( $errors[ 'remember' ] ) ? $errors[ 'remember' ] : '') ?>
						</div>
					</div>
					<div class="col-lg-6 d-flex align-items-lg-start mt-sm-1">
						<a href="">فراموشی یا تغییر رمز عبور</a>
					</div>
				</div>
				<div class="d-flex justify-content-center mt-4">
					<button type="submit" class="btn btn-success btn-block">ورود</button>
				</div>
			</form>
		</div>
	</div>
</div>

