<html>
	<head>
		<title>Product Listings</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<div class="row" style='text-align:right'>
				<a href='/logout'>Log out</a>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h3>Hello, <?=$this->session->userdata('logged_user')['name']?></h3>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h5>Your Wish list</h5>
				<table class='striped'>
					<thead>
						<th>Item</th>
						<th>Added by</th>	
						<th>Date added</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php foreach($wishlist as $wishes): ?>
						<tr>
							<td><a href=<?php echo "/wish_items/{$wishes['item_id']}"?>><?=$wishes['item_name']?></a></td>
							<td><?=$wishes['name']?></td>
							<td><?=$wishes['created_at']?></td>
							<?php if($wishes['added_by'] == $this->session->userdata('logged_user')['id']):?>
								<td><a href=<?php echo "/delete/{$wishes['item_id']}"?>>Delete</a></td>
							<?php else: ?>
								<td><a href=<?php echo "/remove/{$wishes['item_id']}"?>>Remove from my wishlist</a></td>
							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h5>Other Users' Wish list</h5>
				<table class='striped'>
					<thead>
						<th>Item</th>
						<th>Added by</th>	
						<th>Date added</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php foreach($otherswishes as $otherwishes): ?>
						<tr>
							<td><a href=<?php echo "/wish_items/{$otherwishes['id']}"?>><?=$otherwishes['item_name']?></a></td>
							<td><?=$otherwishes['name']?></td>
							<td><?=$otherwishes['created_at']?></td>
							<td><a href=<?php echo "/addtowishlist/{$otherwishes['id']}"?>>Add to my wishlist</a></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="container">
			<div class="row" style='text-align:right'>
				<div class="section">
					<a href='/wish_items/create'>Add a new item</a>
				</div>
			</div>
		</div>
	</body>
</html>