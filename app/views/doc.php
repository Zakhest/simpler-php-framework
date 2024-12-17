<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Lengkap - Simpler Framework</title>
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
            max-width: 900px;
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
        .table-of-contents {
    background-color: #f8f8f8; /* Light gray background */
    padding: 20px;
    border-radius: 5px;
  }

  .table-of-contents ul {
    list-style-type: none;
    padding-left: 0;
  }

  .table-of-contents li {
    margin-bottom: 10px;
  }

  .table-of-contents a {
    color: #333; /* Dark gray text color */
    text-decoration: none;
  }

  .table-of-contents a:hover {
    text-decoration: underline;
  }

  /* Responsive design (adjust as needed) */
  @media (max-width: 768px) {
    .table-of-contents {
      /* Adjust layout for smaller screens */
    }
  }
    </style>
</head>
<body>
    <header>
        <h1>Dokumentasi Lengkap Simpler Framework</h1>
        <p>Panduan Lengkap untuk Penggunaan dan Pengembangan Framework PHP Sederhana ini</p>
    </header>

    <div class="container">
        <h2>Daftar Isi</h2>
        <div class="table-of-contents">
            <ul>
                <li><a href="#overview">1. Pengenalan</a></li>
                <li><a href="#installation">2. Instalasi</a></li>
                <li><a href="#configuration">3. Konfigurasi</a></li>
                <li><a href="#usage">4. Cara Penggunaan</a></li>
                <li><a href="#model">5. Model</a></li>
                <li><a href="#controller">6. Controller</a></li>
                <li><a href="#view">7. View</a></li>
                <li><a href="#bestpractices">8. Praktik Terbaik</a></li>
                <li><a href="#contribution">9. Kontribusi</a></li>
            </ul>
        </div>

        <h2 id="overview">1. Pengenalan</h2>
        <p><strong>Simpler</strong> adalah framework PHP minimalis yang dirancang untuk memberikan kemudahan dalam pengelolaan aplikasi web berbasis CRUD (Create, Read, Update, Delete). Framework ini menyarankan pemisahan kode antara logika aplikasi dan tampilan (MVC), namun tetap sederhana dan mudah digunakan.</p>

        <h2 id="installation">2. Instalasi</h2>
        <p>Untuk menginstal <strong>Simpler</strong>, cukup unduh atau klon repositori ini, kemudian tempatkan di server web Anda. Anda bisa mengikuti langkah-langkah berikut:</p>
        <ol>
            <li>Unduh framework ini dari repositori.</li>
            <li>Letakkan di dalam folder di server web Anda (misalnya <code>/xampp/htdocs/Simpler</code>).</li>
            <li>Sesuaikan konfigurasi database di file <code>app/config/database.php</code>.</li>
            <li>Mulai pengembangan dengan membuat controller, model, dan view sesuai kebutuhan.</li>
            <li>Setelah itu, akses di localhost/Simpler, pastikan xampp sudah menyala</li>
        </ol>

        <h2 id="configuration">3. Konfigurasi</h2>
        <p>Konfigurasi utama framework ini terletak di dalam folder <code>app/config</code>. Berikut adalah contoh konfigurasi database yang harus disesuaikan:</p>
        <pre><code>// app/config/database.php
return [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'nama_database',
    'charset' => 'utf8mb4'
];
        </code></pre>

        <h2 id="usage">4. Cara Penggunaan</h2>
        <p>Setelah menginstal dan mengonfigurasi framework, Anda bisa mulai membuat aplikasi dengan cara:</p>
        <ol>
            <li>Tambahkan <code>model</code> di dalam folder <code>app/models</code>.</li>
            <li>Buat <code>controller</code> di dalam folder <code>app/controllers</code> dan panggil model sesuai kebutuhan.</li>
            <li>Buat tampilan (view) di dalam folder <code>app/views</code> untuk menampilkan data ke pengguna.</li>
        </ol>

        <h2 id="model">5. Model</h2>
        <p>Model berfungsi untuk berinteraksi dengan database. Berikut adalah contoh pembuatan model untuk mengelola data pengguna:</p>
        <pre><code>// app/models/UserModel.php
class UserModel extends Model {
    public function __construct() {
        parent::__construct('nama_tabel');
    }
}

        </code></pre>

        <h2 id="controller">6. Controller</h2>
        <p>Controller mengatur logika aplikasi dan memanggil model serta view. Berikut adalah contoh controller untuk menampilkan daftar pengguna:</p>
        <pre><code>// app/controllers/Home.php
        class Home extends Controller {
               public function index() {
                 $model = $this->loadModel('UserModel');
                 $data = $model->getAll();
                 $this->loadView('home', ['users' => $data]);
               }
        }

        </code></pre>

        <h2 id="view">7. View</h2>
        <p>View bertanggung jawab untuk menampilkan data ke pengguna. Berikut adalah contoh tampilan untuk menampilkan daftar pengguna:</p>
        <pre><code>&lt;!-- app/views/user_list.php -->
&lt;ul>
    &lt;?php foreach ($users as $user): ?>
        &lt;li>&lt;?php echo $user['username']; ?> (&lt;?php echo $user['password']; ?>)&lt;/li>
    &lt;?php endforeach; ?>
&lt;/ul>
        </code></pre>

        <h2 id="bestpractices">8. Praktik Terbaik</h2>
        <p>Beberapa praktik terbaik yang bisa Anda ikuti:</p>
        <ul>
            <li>Gunakan penamaan yang konsisten untuk model, controller, dan view.</li>
            <li>Jaga kode tetap bersih dan terstruktur dengan baik.</li>
            <li>Gunakan query builder atau ORM untuk interaksi database yang lebih aman.</li>
        </ul>

        <h2 id="contribution">9. Kontribusi</h2>
        <p>Jika Anda ingin berkontribusi pada pengembangan framework ini, Anda bisa:</p>
        <ol>
            <li>Fork repositori ini di GitHub.</li>
            <li>Perbaiki bug atau tambahkan fitur baru.</li>
            <li>Ajukan pull request untuk perubahan yang Anda buat.</li>
        </ol>
    </div>

    <footer>
        <p>&copy; 2024 Simpler Framework - Dokumentasi Lengkap by Zak Enterprise</p>
    </footer>
</body>
</html>
