<?php 
include 'config.php'; 

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $tech  = mysqli_real_escape_string($conn, $_POST['technology']);
    $desc  = mysqli_real_escape_string($conn, $_POST['description']);
    
    // Logika Gambar
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $target_dir = "assets/img/";

    // Buat folder jika belum ada
    if (!is_dir($target_dir)) { 
        mkdir($target_dir, 0777, true); 
    }

    if (!empty($filename)) {
        $unique_name = uniqid() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $filename);
        if (move_uploaded_file($tmp_name, $target_dir . $unique_name)) {
            $img_to_db = $unique_name;
        } else {
            $img_to_db = 'default.jpg';
        }
    } else {
        $img_to_db = 'default.jpg';
    }

    // QUERY UTAMA
    $query = "INSERT INTO projects (title, technology, description, image) 
              VALUES ('$title', '$tech', '$desc', '$img_to_db')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        die("Gagal simpan ke database: " . mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project | MyPortfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0f172a; color: #f8fafc; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">

    <div class="glass w-full max-w-lg p-8 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-bold mb-2">New <span class="text-sky-400">Project.</span></h2>
        <p class="text-gray-400 mb-8 text-sm">Pamerkan karya terbaru kamu ke dunia.</p>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Judul Projek</label>
                <input type="text" name="title" required class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white" placeholder="E-Commerce App">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Teknologi</label>
                <input type="text" name="technology" required class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white" placeholder="PHP, Tailwind, MySQL">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="3" required class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white" placeholder="Jelaskan sedikit tentang projek ini..."></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Thumbnail Gambar</label>
                <input type="file" name="image" class="text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sky-500/10 file:text-sky-400 hover:file:bg-sky-500/20">
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="submit" name="submit" class="flex-1 bg-sky-500 hover:bg-sky-600 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-sky-500/20">Simpan Projek</button>
                <a href="index.php" class="px-6 py-3 border border-white/10 rounded-xl hover:bg-white/5 transition text-center">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>