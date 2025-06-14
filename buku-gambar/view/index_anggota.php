<!DOCTYPE html>
<html>
<head>
	<title>Data Anggota - MVC OOP PHP</title>
	<style>
		:root {
			--primary-blue: #3498db;
			--dark-blue: #2980b9;
			--primary-green: #2ecc71;
			--dark-green: #27ae60;
			--light-bg: #f8fafc;
			--card-shadow: 0 10px 30px -15px rgba(0, 0, 0, 0.1);
		}

		/* Base Styles */
		body {
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
			background: linear-gradient(135deg, #f5f7fa 0%, #e4f0fb 100%);
			margin: 0;
			padding: 40px 20px;
			color: #2c3e50;
			line-height: 1.6;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
		}

		/* Header Styles */
		h1 {
			color: var(--primary-blue);
			text-align: center;
			margin-bottom: 30px;
			font-weight: 700;
			position: relative;
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

		/* Table Styles */
		.data-table {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
			margin: 30px 0;
			background: white;
			border-radius: 12px;
			overflow: hidden;
			box-shadow: var(--card-shadow);
		}

		.data-table thead {
			background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
			color: white;
		}

		.data-table th {
			padding: 16px;
			text-align: left;
			font-weight: 600;
			text-transform: uppercase;
			font-size: 0.85rem;
			letter-spacing: 0.5px;
		}

		.data-table td {
			padding: 14px 16px;
			border-bottom: 1px solid #e2e8f0;
		}

		.data-table tbody tr:last-child td {
			border-bottom: none;
		}

		.data-table tbody tr {
			transition: all 0.3s ease;
		}

		.data-table tbody tr:hover {
			background-color: rgba(52, 152, 219, 0.05);
		}

		/* Action Buttons */
		.action-buttons {
			display: flex;
			gap: 10px;
		}

		.btn {
			padding: 8px 14px;
			border-radius: 6px;
			font-weight: 500;
			font-size: 0.85rem;
			text-decoration: none;
			transition: all 0.3s ease;
			display: inline-flex;
			align-items: center;
			gap: 6px;
		}

		.btn-edit {
			background-color: rgba(46, 204, 113, 0.1);
			color: var(--dark-green);
			border: 1px solid rgba(46, 204, 113, 0.3);
		}

		.btn-edit:hover {
			background-color: rgba(46, 204, 113, 0.2);
			transform: translateY(-2px);
		}

		.btn-delete {
			background-color: rgba(231, 76, 60, 0.1);
			color: #e74c3c;
			border: 1px solid rgba(231, 76, 60, 0.3);
		}

		.btn-delete:hover {
			background-color: rgba(231, 76, 60, 0.2);
			transform: translateY(-2px);
		}

		/* Navigation Links */
		.nav-links {
			text-align: center;
			margin-top: 30px;
			display: flex;
			justify-content: center;
			gap: 20px;
		}

		.nav-link {
			padding: 12px 24px;
			border-radius: 8px;
			background: white;
			color: var(--primary-blue);
			font-weight: 600;
			text-decoration: none;
			box-shadow: var(--card-shadow);
			transition: all 0.3s ease;
			border: 1px solid rgba(52, 152, 219, 0.2);
			display: inline-flex;
			align-items: center;
			gap: 8px;
		}

		.nav-link:hover {
			background: var(--primary-blue);
			color: white;
			transform: translateY(-3px);
			box-shadow: 0 8px 20px rgba(52, 152, 219, 0.2);
		}

		.nav-link i {
			font-size: 1.1rem;
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			.data-table {
				display: block;
				overflow-x: auto;
			}
			
			.action-buttons {
				flex-direction: column;
				gap: 8px;
			}
			
			.nav-links {
				flex-direction: column;
				align-items: center;
				gap: 15px;
			}
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
	<div class="container">
		<h1>Data Anggota Perpustakaan</h1>
		
		<table class="data-table">
			<thead>
				<tr>
					<th>Kode Anggota</th>
					<th>Nama Anggota</th>
					<th>Alamat</th>
					<th>Tanggal Lahir</th>
					<th>No Telpon</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = $this->model->fetch($data)){ ?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td class="action-buttons">
						<a href="index.php?ea=<?php echo $row[0]; ?>" class="btn btn-edit">
							<i class="fas fa-edit"></i> Edit
						</a>
						<a href="index.php?da=<?php echo $row[0]; ?>" class="btn btn-delete" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
							<i class="fas fa-trash-alt"></i> Hapus
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<div class="nav-links">
			<a href="index.php?ia=tambah_anggota" class="nav-link">
				<i class="fas fa-user-plus"></i> Tambah Anggota
			</a>
			<a href="index.php?home" class="nav-link">
				<i class="fas fa-home"></i> Kembali ke Home
			</a>
		</div>
	</div>

	<script>
		// Add animation to table rows
		document.querySelectorAll('.data-table tbody tr').forEach((row, index) => {
			row.style.opacity = '0';
			row.style.transform = 'translateY(20px)';
			row.style.transition = `all 0.4s ease ${index * 0.05}s`;
			
			setTimeout(() => {
				row.style.opacity = '1';
				row.style.transform = 'translateY(0)';
			}, 100);
		});
	</script>
</body>
</html>