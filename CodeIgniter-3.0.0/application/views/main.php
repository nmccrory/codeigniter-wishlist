<html>
	<head>
		<title>Product Listings</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<h2>Welcome!</h2>
		</div>
		<div class='container'>
			<div class="row">
				<div class="col s6">
					<form action='/register' method='post'>
						Name: <input type='text' name='name'>
						Username: <input type="text" name='username'>
						Password: <input type="password" name='password'>
						Confirm Password: <input type="password" name='confirm_password'>
						Date Hired: <input type="date" name='date_hired'>
						<button type='submit'>Register</button>
					</form>
				</div>
				<div class='col s6'>
					<form action="/login" method='post'>
						Username: <input type="text" name='username'>
						Password: <input type="password" name='password'>
						<button type='submit'>Login</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>