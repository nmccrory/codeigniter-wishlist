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
					<?=$this->session->flashdata('errors')?>
					<form action='/register' method='post'>
						<h4>Register</h4>
						Name: <input type='text' name='name'>
						Username: <input type="text" name='username'>
						Password: <input type="password" name='password'>
						Confirm Password: <input type="password" name='confirm_password'>
						Date Hired: <input type="date" name='date_hired'>
						<button type='submit'>Register</button>
					</form>
				</div>
				<div class='col s6'>
					<?=$this->session->flashdata('login_errors')?>
					<form action="/login" method='post'>
						<h3>Login</h3>
						Username: <input type="text" name='username'>
						Password: <input type="password" name='password'>
						<button type='submit'>Login</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>