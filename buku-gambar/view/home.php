<!DOCTYPE html>
<html>
<head>
	<title>MVC OOP PHP</title>
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
			margin: 0;
			padding: 0;
			min-height: 100vh;
			color: #2c3e50;
		}

		/* Main Container */
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 40px 20px;
			text-align: center;
		}

		/* Header Styles */
		h1 {
			color: var(--primary-blue);
			font-weight: 700;
			font-size: 2.5rem;
			margin-bottom: 10px;
			position: relative;
			display: inline-block;
		}

		h1::after {
			content: '';
			display: block;
			width: 80px;
			height: 4px;
			background: var(--primary-green);
			margin: 15px auto 0;
			border-radius: 2px;
		}

		h3 {
			color: var(--primary-green);
			font-weight: 600;
			font-size: 1.5rem;
			margin-bottom: 40px;
			animation: fadeInUp 0.8s ease-out;
		}

		/* Navigation Cards */
		.nav-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			gap: 25px;
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
		}

		.nav-card {
			background: white;
			border-radius: 12px;
			padding: 30px 20px;
			box-shadow: var(--card-shadow);
			transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
			position: relative;
			overflow: hidden;
			border: 1px solid rgba(52, 152, 219, 0.1);
		}

		.nav-card::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 4px;
			background: linear-gradient(90deg, var(--primary-blue), var(--primary-green));
		}

		.nav-card:hover {
			transform: translateY(-8px);
			box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.15);
		}

		.nav-card a {
			text-decoration: none;
			color: var(--primary-blue);
			font-weight: 600;
			font-size: 1.1rem;
			display: flex;
			flex-direction: column;
			align-items: center;
			gap: 12px;
		}

		.nav-card i {
			font-size: 2rem;
			color: var(--primary-blue);
			transition: all 0.3s ease;
		}

		.nav-card:hover i {
			color: var(--primary-green);
			transform: scale(1.1);
		}

		/* Special style for logout */
		.nav-card.logout {
			border-color: rgba(231, 76, 60, 0.1);
		}

		.nav-card.logout::before {
			background: #e74c3c;
		}

		.nav-card.logout a {
			color: #e74c3c;
		}

		.nav-card.logout i {
			color: #e74c3c;
		}

		.nav-card.logout:hover i {
			color: #c0392b;
		}

		/* Animations */
		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(20px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			h1 {
				font-size: 2rem;
			}
			
			h3 {
				font-size: 1.2rem;
			}
			
			.nav-grid {
				grid-template-columns: 1fr;
				max-width: 400px;
			}
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
	<div class="container">
		<h1>MVC OOP Perpustakaan Sederhana</h1>
		<h3>Selamat Datang, <?php echo $_SESSION['uname']; ?></h3>
		
		<div class="nav-grid">
			<div class="nav-card">
				<a href="index.php?idb=index_buku">
					<i class="fas fa-book"></i>
					<span>Buku</span>
				</a>
			</div>
			
			<div class="nav-card">
				<a href="index.php?ida=index_anggota">
					<i class="fas fa-users"></i>
					<span>Anggota</span>
				</a>
			</div>
			
			<div class="nav-card">
				<a href="index.php?idp=index_pinjam">
					<i class="fas fa-hand-holding"></i>
					<span>Pinjam</span>
				</a>
			</div>
			
			<div class="nav-card logout">
				<a href="logout.php">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span>
				</a>
			</div>
		</div>
	</div>

	<script>
		// Add interactive hover effects
		document.querySelectorAll('.nav-card').forEach(card => {
			card.addEventListener('mouseenter', () => {
				card.style.transform = 'translateY(-8px)';
			});
			
			card.addEventListener('mouseleave', () => {
				card.style.transform = '';
			});
		});
	</script>
</body>
</html>