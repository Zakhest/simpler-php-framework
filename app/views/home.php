<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpler Framework</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background: #1d3557;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #e63946;
        }
        pre {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
            border: 1px solid #ddd;
        }
        a {
            color: #1d3557;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background: #1d3557;
            color: #fff;
        }
        .warning {
            background-color: #fdd;
            border-left: 5px solid #e63946;
            padding: 10px;
            margin: 20px 0;
        }
        .warning h3 {
            margin: 0;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Simpler Framework</h1>
        <p>Framework PHP Sederhana untuk CRUD Generik</p>
    </header>

    <div class="container">
        <h2>Informasi Framework</h2>
        <p><strong>Simpler</strong> adalah framework PHP minimalis yang dirancang untuk mempermudah pengelolaan data CRUD secara generik. 
        Anda hanya perlu menambahkan file di direktori <code>app</code> tanpa perlu menyentuh kode inti di <code>/Core</code>.</p>

        <h2>Tata Cara Penggunaan</h2>
        <ol>
            <li>Konfigurasi database di file <code>app/config/database.php</code>.</li>
            <li>Tambahkan model di <code>app/models</code> dan sesuaikan nama tabel serta kolom.</li>
            <li>Buat controller di <code>app/controllers</code> yang memanggil model sesuai kebutuhan.</li>
            <li>Desain tampilan di <code>app/views</code> sesuai keinginan.</li>
        </ol>

        <h2>Contoh Kode</h2>
        <h3>1. Model</h3>
        <pre><code>// app/models/UserModel.php
        class UserModel extends Model {
    public function __construct() {
        parent::__construct('nama_tabel');
    }
}
        </code></pre>

        <h3>2. Controller</h3>
        <pre><code>// app/controllers/User.php
        class Home extends Controller {
    public function index() {
        $model = $this->loadModel('UserModel');
        $data = $model->getAll();
        $this->loadView('home', ['users' => $data]);
    }
        }
        </code></pre>

        <h3>3. View</h3>
        <pre><code>&lt;!-- app/views/user_list.php -->
&lt;ul>
    &lt;?php foreach ($users as $user): ?>
        &lt;li>&lt;?php echo $user['username']; ?> (&lt;?php echo $user['password']; ?>)&lt;/li>
    &lt;?php endforeach; ?>
&lt;/ul>
        </code></pre>

        <p><a href="home/doc">Lihat dokumentasi lengkap</a></p>

        <div class="warning">
            <h3>Larangan Penggunaan</h3>
            <ul>
                <li>Jangan mengubah kode di dalam folder <code>/Core</code>, kecuali Anda memahami risikonya.</li>
                <li>Hanya tambahkan atau modifikasi file di dalam folder <code>/app</code> untuk menjaga kestabilan framework.</li>
                <li>Hindari mengubah struktur dasar folder atau file, karena bisa mempengaruhi fungsionalitas framework.</li>
                <li>Dilarang mengedit <code>index.php</code> yang berada disebelah <code>.htaccess</code></li>
                <li>Selalu lakukan backup sebelum melakukan perubahan besar di kode aplikasi.</li>
                <li>Penggunaan teknologi atau fitur tambahan seperti libraries eksternal harus diuji terlebih dahulu untuk kompatibilitas.</li>
            </ul>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Simpler Framework by Zak Enterprise</p>
    </footer>
</body>
</html>
