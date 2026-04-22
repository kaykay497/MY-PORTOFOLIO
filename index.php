<?php 
include 'config.php'; 

// Logika Hapus (Tetap dipertahankan)
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus']; 
    $get_img = mysqli_query($conn, "SELECT image FROM projects WHERE id = $id");
    $img_data = mysqli_fetch_assoc($get_img);
    if ($img_data && $img_data['image'] != 'default.jpg' && file_exists("assets/img/" . $img_data['image'])) {
        unlink("assets/img/" . $img_data['image']); 
    }
    mysqli_query($conn, "DELETE FROM projects WHERE id = $id");
    header("Location: index.php"); 
    exit();
}

$total_result = mysqli_query($conn, "SELECT COUNT(*) as total FROM projects");
$total_data = ($total_result) ? mysqli_fetch_assoc($total_result)['total'] : 0;
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayana Hayu | Digital Architect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root { --bg: #ffffff; --accent: #0ea5e9; --text: #0f172a; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); }
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        
        /* Hero Styling */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background-color: #f8fafc;
        }
        .hero-bg-image {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background-image: url('assets/img/profile.jpeg');
            background-size: cover;
            background-position: center;
            z-index: 1;
            filter: grayscale(100%) brightness(0.9);
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, #f8fafc 45%, rgba(248, 250, 252, 0.8) 65%, transparent 100%);
            z-index: 2;
        }
        .nav-glass { backdrop-filter: blur(20px); background: rgba(255,255,255,0.8); border-bottom: 1px solid rgba(0,0,0,0.05); }
    </style>
</head>
<body class="antialiased overflow-x-hidden">

<nav class="fixed top-0 w-full z-50 px-8 py-5 flex justify-between items-center nav-glass">
    <a href="#" class="text-xl font-black tracking-tighter uppercase italic">
        KAYANA<span class="text-sky-500 text-3xl">.</span>
    </a>
    
    <div class="flex items-center gap-8">
        <div class="hidden md:flex items-center gap-8">
            <a href="#about" class="text-[9px] font-bold uppercase tracking-[0.3em] text-slate-500 hover:text-sky-600 transition-all">Journey</a>
            <a href="#projects" class="text-[9px] font-bold uppercase tracking-[0.3em] text-slate-500 hover:text-sky-600 transition-all">Works</a>
        </div>

        <a href="tambah.php" class="bg-slate-900 border border-slate-900 text-white text-[9px] font-black uppercase tracking-[0.2em] px-5 py-2.5 rounded-full hover:bg-sky-600 hover:border-sky-600 transition-all duration-500">
            + New Project
        </a>
    </div>
</nav>

    <section class="hero-section">
        <div class="hero-bg-image"></div>
        <div class="hero-overlay"></div>

        <div class="container mx-auto px-10 relative z-10 pt-24">
            <div class="max-w-3xl" data-aos="fade-up">
                <div class="inline-flex items-center gap-3 px-3 py-1 rounded-full bg-sky-50 border border-sky-100 text-sky-600 text-[9px] font-bold tracking-[0.2em] uppercase mb-6 italic">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                    </span>
                    Open for Collaboration
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] tracking-tighter mb-6 text-slate-900">
                    Architecting Logic, <br> <span class="font-serif italic text-sky-500">Managing Vision.</span>
                </h1>

                <div class="max-w-2xl mb-10">
                    <p class="text-slate-600 text-base leading-relaxed font-medium">
                        Saya <span class="text-slate-900 font-bold">Kayana Hayu Candraningtyas</span>, Mahasiswa <span class="text-slate-900">Teknologi Informasi</span> di 
                        <span class="text-sky-600 font-semibold italic">Telkom University Surabaya</span>. 
                        Memasuki semester 4, saya mengombinasikan ketajaman <span class="underline decoration-sky-300">arsitektur web</span> dengan pengalaman kepemimpinan di organisasi kampus untuk menciptakan solusi digital yang fungsional dan berdampak.
                    </p>
                </div>

                <div class="flex flex-wrap gap-6 pt-6 border-t border-slate-200">
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Core Tech</p>
                        <p class="text-xs font-bold">PHP Native, Laravel, & MySQL</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Management</p>
                        <p class="text-xs font-bold">BEM EKRAF, Fin-Tracking</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Current Focus</p>
                        <p class="text-xs font-bold">System Arch & API Development</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white px-10">
        <div class="container mx-auto">
            <h2 class="text-3xl font-black italic tracking-tighter mb-12">The Journey</h2>
            <div class="grid md:grid-cols-2 gap-10">
                <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100" data-aos="fade-up">
                    <h3 class="text-sky-600 font-bold text-xs uppercase tracking-widest mb-2">Semester 1 - 3</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Membangun fondasi teknis IT sambil mengasah kemampuan manajerial. Pernah dipercaya sebagai <b>Sekretaris</b> dalam proyek Webinar matakuliah, mengelola administrasi dan dokumentasi acara secara presisi.
                    </p>
                </div>
                <div class="p-8 bg-slate-50 rounded-3xl border border-sky-200" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-sky-600 font-bold text-xs uppercase tracking-widest mb-2">Semester 4 - Present</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Aktif di <b>BEM Kampus (Kementrian EKRAF)</b>. Mengelola aspek komersial dan kreatif organisasi sebagai:
                        <ul class="mt-3 space-y-1 text-sm font-bold text-slate-800">
                            <li>• PIC Proker Jastip & Merchandise</li>
                            <li>• Bendahara Proker Besar EKRAF</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-24 px-8 bg-slate-50">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div>
                    <h2 class="text-4xl md:text-5xl font-extrabold italic tracking-tighter">Selected Artifacts</h2>
                    <p class="text-slate-400 mt-2 tracking-[0.2em] uppercase text-[9px] font-bold italic">Curated Experiences</p>
                </div>
                <div class="text-[10px] font-bold uppercase tracking-widest text-sky-600 bg-sky-50 px-4 py-1.5 border border-sky-100 rounded-full">
                    Total: <?php echo $total_data; ?>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM projects ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($result)) :
                    $img = (!empty($row['image']) && file_exists("assets/img/" . $row['image'])) ? "assets/img/" . $row['image'] : "assets/img/default.jpg";
                ?>
                <div class="group" data-aos="fade-up">
                    <div class="relative aspect-[16/10] overflow-hidden rounded-2xl bg-white border border-slate-200 transition-all duration-500 hover:shadow-xl">
                        <img src="<?php echo $img; ?>" class="w-full h-full object-cover opacity-90 group-hover:scale-105 transition-all duration-1000">
                        
                        <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="bg-white text-slate-900 px-5 py-2 rounded-full text-[9px] font-black uppercase hover:bg-sky-500 hover:text-white transition-all">Edit</a>
                            <a href="?hapus=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-5 py-2 rounded-full text-[9px] font-black uppercase hover:bg-red-600 transition-all" onclick="return confirm('Hapus Project?')">Delete</a>
                        </div>
                    </div>

                    <div class="mt-6 space-y-2">
                        <div class="flex items-center gap-3">
                            <span class="text-[9px] font-black uppercase tracking-[0.3em] text-sky-600"><?php echo htmlspecialchars($row['technology']); ?></span>
                            <div class="h-[1px] flex-grow bg-slate-200"></div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 group-hover:text-sky-600 transition-colors duration-300 tracking-tight italic">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h4>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <footer id="contact" class="py-40 px-10 text-center bg-white border-t border-slate-100">
        <div class="max-w-4xl mx-auto" data-aos="fade-up">
            <h2 class="font-serif italic text-6xl md:text-8xl mb-16 tracking-tighter">Let's craft the <br> remarkable.</h2>
            <a href="mailto:kayanahayucan@gmail.com" class="text-2xl md:text-4xl font-extrabold text-slate-900 border-b-4 border-sky-400/30 hover:border-sky-500 transition-all duration-500 pb-4 inline-block tracking-tighter italic">kayanahayucan@gmail.com</a>
            
            <div class="mt-32 flex justify-center gap-12 text-[10px] font-black uppercase tracking-[0.6em] text-slate-400">
                <a href="#" class="hover:text-sky-500 transition-colors">Instagram</a>
                <a href="#" class="hover:text-sky-500 transition-colors">LinkedIn</a>
                <a href="#" class="hover:text-sky-500 transition-colors">GitHub</a>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 1000, once: true, easing: 'ease-out-expo' });</script>
</body>
</html>