<?php 
include 'config.php'; 

// 1. Ambil ID dari URL
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM projects WHERE id = $id");
$data = mysqli_fetch_assoc($result);

// 2. Logika Update Data
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $tech  = mysqli_real_escape_string($conn, $_POST['technology']);
    $desc  = mysqli_real_escape_string($conn, $_POST['description']);
    
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $target_dir = "assets/img/";

    // Jika user upload gambar baru
    if (!empty($filename)) {
        $unique_name = uniqid() . '_' . $filename;
        move_uploaded_file($tmp_name, $target_dir . $unique_name);
        $img_to_db = $unique_name;
    } else {
        // Jika tidak upload baru, pakai gambar lama
        $img_to_db = $data['image'];
    }

    $query = "UPDATE projects SET 
                title='$title', 
                technology='$tech', 
                description='$desc', 
                image='$img_to_db' 
              WHERE id=$id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        die("Gagal update: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project | MyPortfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0f172a; color: #f8fafc; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">

    <div class="glass w-full max-w-lg p-8 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-bold mb-2">Edit <span class="text-sky-400">Project.</span></h2>
        <p class="text-gray-400 mb-8 text-sm">Perbarui informasi projek kamu di sini.</p>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Judul Projek</label>
                <input type="text" name="title" value="<?php echo $data['title']; ?>" required class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Teknologi</label>
                <input type="text" name="technology" value="<?php echo $data['technology']; ?>" required class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="3" required class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white"><?php echo $data['description']; ?></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Ganti Gambar (Kosongkan jika tidak ingin diubah)</label>
                <div class="mb-3">
                    <p class="text-[10px] text-gray-500 mb-1">Gambar saat ini: <?php echo $data['image']; ?></p>
                </div>
                <input type="file" name="image" class="text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sky-500/10 file:text-sky-400 hover:file:bg-sky-500/20">
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="submit" name="submit" class="flex-1 bg-sky-500 hover:bg-sky-600 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-sky-500/20">Simpan Perubahan</button>
                <a href="index.php" class="px-6 py-3 border border-white/10 rounded-xl hover:bg-white/5 transition text-center">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>