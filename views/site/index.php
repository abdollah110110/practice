<div class="jumbotron jumbotron-fluid text-center">
	<div class="d-flex justify-content-center align-items-center">
		<div>
			<?php
			$user = new Users();
			if ( $user->check() ) {
				echo '<h2 class="display-3 text-white">سلام، ' . $user->userName() . '</h2>';
				echo '<h1 class="display-3 text-success">خوش آمدید!</h1>';
			}
			else {
				echo '<h1 class="display-3">خوش آمدید!</h1>';
			}
			?>
			<p class="lead">عبدالله سمعی هستم برنامه نویس وب سایت</p>
			<p>برای سفارش انجام پروژه لطفاً لینک زیر را کلیک کنید:</p>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="<?= Tools::url( 'project/index' ) ?>" role="button">سفارش انجام پروژه</a>
			</p>
		</div>
		<div>
			<img src="<?= Tools::url( 'images/myimage.jpg' ) ?>" class="img-thumbnail" />
		</div>
	</div>
</div>
<?php if ( isset( $categories ) ): ?>
	<?php foreach ( $categories as $category ): ?>
		<p><?= Tools::encode( $category->name ) ?></p>
	<?php endforeach; ?>
<?php endif; ?>

