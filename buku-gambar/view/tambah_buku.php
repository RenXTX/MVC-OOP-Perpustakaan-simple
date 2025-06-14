<?php 
//pembuatan kode buku otomatis
$r = $this->model->fetch($data);
$kode=substr($r['kode'],3,8);
$tambah=$kode+1;
if($tambah<10){
  $id="BK"."0000".$tambah;
}else{
  $id="BK"."000".$tambah;
}
    if(isset($_POST['submit'])) { //jika button submit diklik maka panggil fungsi insert pada controller
        $main = new controller();
        $main->insert_buku();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku - MVC OOP PHP</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #2c3e50;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: var(--card-shadow);
            width: 100%;
            max-width: 600px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.15);
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-green));
        }

        /* Form Header */
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h3 {
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .form-header::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--primary-green);
            margin: 15px auto 0;
            border-radius: 2px;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #4a5568;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
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

        /* Read-only field */
        .form-group input[readonly] {
            background-color: #edf2f7;
            color: #718096;
        }

        /* File Input Customization */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-button {
            border: 2px dashed #e2e8f0;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #f8fafc;
        }

        .file-input-button:hover {
            border-color: var(--primary-blue);
            background-color: rgba(52, 152, 219, 0.05);
        }

        .file-input-button i {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }

        .file-input-button span {
            display: block;
            color: #4a5568;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        /* Button Styles */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: white;
            border: none;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.2);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, var(--dark-blue), var(--primary-blue));
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(52, 152, 219, 0.25);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-back {
            background-color: white;
            color: var(--primary-blue);
            border: 1px solid rgba(52, 152, 219, 0.3);
        }

        .btn-back:hover {
            background-color: rgba(52, 152, 219, 0.1);
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-card {
                padding: 30px 20px;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="form-card">
        <div class="form-header">
            <h3>Tambah Buku Baru</h3>
        </div>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kode">Kode Buku</label>
                <input type="text" name="kd_buku" value="<?php echo $id ?>" readonly>
            </div>
            
            <div class="form-group">
                <label for="nama">Nama Buku</label>
                <input type="text" name="nm_buku" placeholder="Masukkan nama buku" required>
            </div>
            
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pg_buku" placeholder="Masukkan nama pengarang" required>
            </div>
            
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="pn_buku" placeholder="Masukkan nama penerbit" required>
            </div>
            
            <div class="form-group">
                <label for="tahun">Tahun Terbit</label>
                <input type="text" name="thn_buku" placeholder="Masukkan tahun terbit" required>
            </div>
            
            <div class="form-group">
                <label for="cover">Cover Buku</label>
                <div class="file-input-wrapper">
                    <div class="file-input-button">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Klik untuk memilih file cover</span>
                        <small>Format: JPG, PNG (Max 2MB)</small>
                    </div>
                    <input type="file" name="cover" accept="image/*" required>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-submit">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="index.php?idb=index_buku" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

    <script>
        // Add animation to form elements
        document.querySelectorAll('.form-group').forEach((group, index) => {
            group.style.opacity = '0';
            group.style.transform = 'translateY(20px)';
            group.style.transition = `all 0.4s ease ${index * 0.1}s`;
            
            setTimeout(() => {
                group.style.opacity = '1';
                group.style.transform = 'translateY(0)';
            }, 100);
        });

        // File input display
        document.querySelector('input[type="file"]').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
            document.querySelector('.file-input-button span').textContent = fileName;
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            let valid = true;
            document.querySelectorAll('[required]').forEach(input => {
                if (!input.value.trim()) {
                    input.style.borderColor = '#e74c3c';
                    valid = false;
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Harap lengkapi semua field yang wajib diisi!');
            }
        });
    </script>
</body>
</html>
