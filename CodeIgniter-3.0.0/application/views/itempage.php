<html>
	<head>
		<title><?=$item['item_name']?></title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<div class="row" style='text-align:right'>
				<div class='section'>
					<a href='/dashboard'>Home</a>
					<a href='/logout' style='margin-left:4%'>Log out</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h2><?=$item['item_name']?>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h4>Users who added this item to their wishlist:</h4>
				<div class="col s4">
					<?php foreach($wishedby as $wished): ?>
						<h5><?=$wished['name']?></h5>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</body>
</html>