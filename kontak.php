<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | MyPortfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0f172a; color: #f8fafc; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gradient-text { background: linear-gradient(to right, #38bdf8, #818cf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="overflow-x-hidden">

    <nav class="fixed top-0 w-full z-50 glass py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h2 class="text-xl font-bold tracking-tighter">KAY<span class="text-sky-400">.</span></h2>
            <div class="space-x-6 text-sm font-medium">
                <a href="index.php" class="hover:text-sky-400 transition">Home</a>
                <a href="kontak.php" class="text-sky-400 transition border-b-2 border-sky-400 pb-1">Contact</a>
                <a href="tambah.php" class="bg-sky-500 px-4 py-2 rounded-full text-white hover:bg-sky-600">+ Project</a>
            </div>
        </div>
    </nav>

    <section class="pt-40 pb-20 px-6">
        <div class="container mx-auto max-w-5xl">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h1 class="text-5xl font-extrabold mb-6 leading-tight">Let's work <br> <span class="gradient-text">together.</span></h1>
                    <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                        Punya ide menarik atau ingin berkolaborasi? Saya siap membantu mewujudkannya menjadi produk digital yang luar biasa.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400">📧</div>
                            <p class="font-medium">kayanahayucan@gmail.com</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-purple-500/10 flex items-center justify-center text-purple-400">📍</div>
                            <p class="font-medium">Surabaya, Indonesia</p>
                        </div>
                    </div>
                </div>

                <div class="glass p-8 rounded-3xl">
                    <form action="#" class="space-y-4">
                        <input type="text" placeholder="Nama Lengkap" class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white">
                        <input type="email" placeholder="Email Address" class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white">
                        <textarea rows="4" placeholder="Pesan Anda" class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-sky-500 transition text-white"></textarea>
                        <button class="w-full bg-gradient-to-r from-sky-500 to-indigo-500 hover:opacity-90 text-white font-bold py-3 rounded-xl transition shadow-lg">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>