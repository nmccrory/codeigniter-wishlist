<html>
	<head>
		<title>Create Item</title>
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
			<h2>Create a new wish list item</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col s6">
					<form action="/add" method='post'>
						Item/Product <input type="text" name='item'>
						<input type="hidden" name='user_id' value=<?=$this->session->userdata('logged_user')['id']?>>
						<button type='submit'>Add</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>