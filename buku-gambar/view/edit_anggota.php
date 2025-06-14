<?php
    if(isset($_POST['submit'])) { //jika button submit diklik maka panggil fungsi update pada controller
        $main = new controller();
        $main->update_anggota();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota - MVC OOP PHP</title>
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
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            color: white;
            border: none;
            box-shadow: 0 4px 6px rgba(46, 204, 113, 0.2);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(46, 204, 113, 0.25);
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

        /* Hidden Input */
        input[type="hidden"] {
            display: none;
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
            <h3>Edit Data Anggota</h3>
        </div>
        
        <form action="" method="POST">
            <div class="form-group">
                <label for="namaa">Nama Anggota</label>
                <input type="text" name="nm_anggota" value="<?php echo $row[1] ?>" placeholder="Masukkan nama anggota" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" value="<?php echo $row[2] ?>" placeholder="Masukkan alamat" required>
            </div>
            
            <div class="form-group">
                <label for="tgl">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="<?php echo $row[3] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="notel">No Telpon</label>
                <input type="text" name="notel" value="<?php echo $row[4] ?>" placeholder="Masukkan nomor telepon" required>
            </div>
            
            <input type="hidden" name="kda" value="<?=$row[0]?>">
            
            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-submit">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="index.php?ida=index_anggota" class="btn btn-back">
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

        // Add form validation
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
