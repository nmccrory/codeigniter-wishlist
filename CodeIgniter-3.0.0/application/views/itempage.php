<html>
	<head>
		<title><?=$item['item_name']?></title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<div class="row" style='text-align:right'>
				<a href='/dashboard'>Home</a>
				<a href='/logout'>Log out</a>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h2><?=$item['item_name']?>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h5>Users who added this item to wishlist:</h5>
				<div class="col s4">
					<?php foreach($wishedby as $wished): ?>
						<p><?=$wished['name']?></p>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</body>
</html>