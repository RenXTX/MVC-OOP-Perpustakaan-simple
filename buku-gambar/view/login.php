<html>
<head>
	<title>MVC OOP PHP Login</title>
	<style>
		:root {
			--primary-blue: #3498db;
			--dark-blue: #2980b9;
			--primary-green: #2ecc71;
			--dark-green: #27ae60;
			--light-bg: #f8fafc;
			--card-shadow: 0 10px 30px -15px rgba(0, 0, 0, 0.1);
		}

		/* Base Styles with Gradient Background */
		body {
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
			background: linear-gradient(135deg, #f5f7fa 0%, #e4f0fb 100%);
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			margin: 0;
			padding: 20px;
			color: #2c3e50;
		}

		/* Modern Card Design */
		.login-card {
			background: white;
			border-radius: 16px;
			padding: 40px;
			box-shadow: var(--card-shadow);
			width: 100%;
			max-width: 420px;
			transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
			position: relative;
			overflow: hidden;
		}

		.login-card:hover {
			transform: translateY(-8px);
			box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.15);
		}

		.login-card::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 6px;
			background: linear-gradient(90deg, var(--primary-blue), var(--primary-green));
		}

		/* Typography */
		.login-title {
			color: var(--primary-blue);
			margin-bottom: 30px;
			font-weight: 700;
			font-size: 1.8rem;
			text-align: center;
			position: relative;
		}

		.login-title::after {
			content: '';
			display: block;
			width: 60px;
			height: 4px;
			background: var(--primary-green);
			margin: 12px auto 0;
			border-radius: 2px;
		}

		label {
			display: block;
			margin-bottom: 10px;
			color: #4a5568;
			font-weight: 500;
			font-size: 0.95rem;
		}

		/* Enhanced Form Elements */
		.form-group {
			margin-bottom: 25px;
			position: relative;
		}

		.form-group input {
			width: 100%;
			padding: 14px 16px;
			border: 2px solid #e2e8f0;
			border-radius: 8px;
			font-size: 15px;
			transition: all 0.3s ease;
			background-color: #f8fafc;
		}

		.form-group input:focus {
			outline: none;
			border-color: var(--primary-blue);
			background-color: white;
			box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.15);
		}

		.form-group input:not(:placeholder-shown) {
			border-color: var(--primary-green);
		}

		/* Animated Floating Labels */
		.form-group label {
			position: absolute;
			top: -10px;
			left: 12px;
			background: white;
			padding: 0 6px;
			font-size: 0.8rem;
			color: var(--primary-blue);
			opacity: 0;
			transition: all 0.3s ease;
		}

		.form-group input:focus + label,
		.form-group input:not(:placeholder-shown) + label {
			opacity: 1;
			transform: translateY(-18px);
		}

		/* Enhanced Button with Icon */
		.login-btn {
			background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
			color: white;
			border: none;
			padding: 15px;
			border-radius: 8px;
			cursor: pointer;
			font-size: 16px;
			font-weight: 600;
			width: 100%;
			transition: all 0.3s ease;
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			box-shadow: 0 4px 6px rgba(52, 152, 219, 0.2);
		}

		.login-btn:hover {
			background: linear-gradient(135deg, var(--dark-blue), var(--primary-blue));
			transform: translateY(-3px);
			box-shadow: 0 6px 12px rgba(52, 152, 219, 0.25);
		}

		.login-btn:active {
			transform: translateY(0);
		}

		/* Loading Animation */
		@keyframes spin {
			to { transform: rotate(360deg); }
		}

		.login-btn.loading::after {
			content: '';
			display: inline-block;
			width: 16px;
			height: 16px;
			border: 2px solid rgba(255, 255, 255, 0.3);
			border-radius: 50%;
			border-top-color: white;
			animation: spin 0.8s linear infinite;
		}

		/* Responsive Design */
		@media (max-width: 480px) {
			.login-card {
				padding: 30px 20px;
			}
			
			.login-title {
				font-size: 1.5rem;
			}
		}
	</style>
</head>
<body>
	<div class="login-card">
		<h3 class="login-title">MVC OOP PHP Login</h3>
		<form action="login.php" method="POST">
			<div class="form-group">
				<input type="text" name="uname" placeholder="Username" id="username">
				<label for="username">Username</label>
			</div>
			<div class="form-group">
				<input type="password" name="pw" placeholder="Password" id="password">
				<label for="password">Password</label>
			</div>
			<button type="submit" class="login-btn" name="submit">
				Login
			</button>
		</form>
	</div>

	<script>
		// Add interactive loading animation
		document.querySelector('form').addEventListener('submit', function(e) {
			const btn = document.querySelector('.login-btn');
			btn.classList.add('loading');
			btn.innerHTML = 'Authenticating <span></span>';
		});
	</script>
</body>
</html>