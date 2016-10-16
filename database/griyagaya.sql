-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2011 at 02:03 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `griyagaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(20, 'Aneka Jam', 'http://rizalonline.morganhosting.co.cc/anekajam', 'anekajam.jpg', '2011-05-28'),
(27, 'Rumah Kenriza', 'http://rumahkenriza.co.cc', 'rumahkenriza.jpg', '2011-08-08'),
(28, 'KenrizResto', 'http://kenrizresto.co.cc', 'kenrizresto.jpg', '2011-08-08'),
(29, 'Art Furniture', 'http://rizalonline.morganhosting.co.cc/artfurniture', 'artfurniture.jpg', '2011-09-03'),
(30, 'Selaras Interior', 'http://rizalonline.morganhosting.co.cc/selarasinterior', 'selaras.jpg', '2011-09-03'),
(31, 'RizalOnline', 'http://rizalonline.co.cc', 'ro.jpg', '2011-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategoriblog` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_blog` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `id_kategoriblog`, `username`, `judul`, `judul_seo`, `headline`, `isi_blog`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(6, 4, 'admin', 'T-shirt Keren', 'tshirt-keren', 'Y', 'Jika Anda selalu berpikir untuk mendapatkan pakaian baru, mendapatkannya. Anda akan punya banyak pilihan untuk pergi dengan. Anda dapat memilih pakaian yang memberi Anda terlihat rapi atau Anda mungkin ingin efek yang lebih sporty. Anda dapat pergi pintar kasual atau trendi. Atau Anda hanya dapat menempel ke dasar dari kesejukan. Dapatkan t-shirt keren!<br />\r\n<br />\r\nSebenarnya ada sebuah penelitian yang membuktikan bahwa apapun pakaian seseorang telah pada akan mempengaruhi udara yang ia proyek kepada orang lain. Itu berarti jika Anda mengenakan sesuatu yang keren, Anda mungkin akan mulai bertindak dingin. Dengan definisi, kata ini bisa apa saja dari yang unik untuk menarik bagi radikal untuk modis dan bahkan non-modis dengan cara yang percaya diri. Cool sedang nyaman dengan diri sendiri dan menyadari tekanan dunia. Pada dasarnya, yang keren sedang nyaman dengan diri sendiri.<br />\r\n<br />\r\nDalam hal mode, keren adalah segala sesuatu yang menggambarkan kepercayaan atau kurangnya khawatir tentang hal-hal yang &quot;tidak keren&quot; individu akan terlalu sibuk dengan. Dengan kata lain, cool sama sekali tidak mengkhawatirkan tentang menjadi dingin.<br />\r\n<br />\r\nCool t-shirt kemudian akan apa pun yang Anda pakai itu tampaknya memberikan kesan bahwa Anda merasa nyaman dengan diri sendiri. Ini desain kaos akan berputar di sekitar kepribadian Anda. Ada banyak t-shirt keren yang tersedia di pasar tetapi dalam rangka untuk satu yang akan benar-benar &quot;keren&quot; pada Anda, ia harus pergi dengan aura Anda. Jika tidak, seluruh ide keren untuk melihat akan menjadi bumerang. Selain itu, untuk menjadi sejuk bahkan bukan ide. Ini adalah kecenderungan alami. Jadi, ketika Anda memilih &quot;keren&quot; baju, jangan pilih salah satu yang tidak Anda. Setiap upaya untuk menciptakan kepribadian palsu akan selalu menunjukkan dan pura-pura adalah kebalikan dari yang keren.<br />\r\n<br />\r\nShirt dengan kutipan di media tersebut mungkin keren tapi semua masih tergantung pada pemakainya. Jika Anda mengenakan sesuatu dengan kutipan yang bahkan tidak berbicara tentang Anda, apalagi jarak jauh mengidentifikasi dengan kepribadian Anda, maka itu un-cool. Bagian dari persepsi seluruh kesejukan adalah pencampuran dengan baik. Segala sesuatu yang tidak pergi dengan apa pun hanya akan ejekan.<br />\r\n<br />\r\nSekarang musim panas yang ada di dalam ayunan penuh, kaos keren pasti masuk Lewatlah sudah hari-hari ketika Anda akan berusaha keras untuk menarik pakaian yang rumit hanya untuk tampak bodoh. Sekarang, Anda hanya bisa ambil kemeja dingin dan menjadi diri sendiri. Tanpa embel-embel.<br />\r\n<br />\r\nSebuah T-shirt keren tidak begitu sulit untuk menemukan. Mencari produk murah, tapi hati-hati memperhatikan kualitas kain dan memilih desain yang cocok untuk anda. Adapun logo Anda ingin agar dicantumkan pada T-shirt, pilih dari model terbaru, namun perlu diingat bahwa pesan yang paling sesuai dengan kepribadian Anda adalah salah satu yang Anda akan memakai dengan kenikmatan lebih banyak lagi, karena akan membuat Anda merasa dan tampilan keren.\r\n', 'Kamis', '2011-10-06', '20:22:16', '92tShirt_model.jpg', 5, ''),
(7, 4, 'admin', 'Perkembagan Busana Muslim', 'perkembagan-busana-muslim', 'Y', 'Pakaian busana muslim adalah seni yang datang dan menyebar sangat cepat karena kebanyakan orang suka memakai kain tersebut. Sekarang muslim semakin banyak perempuan dan anak perempuan yang datang dan membuat karir mereka di industri fashion. Seseorang harus menghargai upaya para perempuan Muslim dan anak perempuan yang meskipun begitu banyak rintangan yang datang dan membantu dengan cara yang indah banyak Muslim untuk tersebar di seluruh dunia.<br />\r\n<br />\r\nBanyak orang di dunia pada awalnya tidak menyadari begitu banyak desain yang indah dan kemampuan wanita-wanita. Namun hari-hari telah pergi dan sekarang busana muslim datang dengan ide-ide baru dan bekerja kreativitas karena kerja keras mereka dan sekarang orang-orang datang untuk mengetahui pikiran kreativitas para perempuan diremehkan dan gadis.<br />\r\n<br />\r\nBeberapa perancang mode terkenal mengambil pakaian busana muslim yang sangat serius dan mereka bekerja banyak dalam pengembangan busana muslim merancang. Banyak desainer terkenal dirancang muslim kain mode sekarang mudah tersedia di toko-toko online. Satu bisa membelinya dengan sangat mudah secara online atau di outlet mana mereka tersedia dengan diskon besar.<br />\r\n<br />\r\n<strong>Tantangan</strong><br />\r\n<br />\r\nSebagai perempuan Muslim dan anak perempuan tidak banyak modis dibandingkan dengan wanita dari agama lain, tetapi perempuan Muslim dan anak perempuan yang keluar dari burkha dan beradaptasi dengan era mode saat ini sangat cepat. Sebagai perempuan Muslim dan perempuan yang sebelumnya tidak diizinkan untuk melakukan mode tapi sekarang hari muslim perempuan dan gadis datang dengan ide-ide sendiri mode dan menghasilkan tantangan baik terhadap perancang busana lain tetapi mereka masih menghadapi tantangan hal untuk perancang busana sesama mereka . perempuan Muslim dan perubahan pakaian laki-laki dari satu tempat ke tempat, di negara-negara modern yang bisa melihat wanita tidak mengenakan burkha tapi tidak bisa melihat mereka dalam gaun pendek baik. Dan di negara-negara Muslim khas seseorang dapat wanita menutupi wajah di atas burkha dan mengenakan gaun hitam.<br />\r\n<br />\r\n<strong>Keuntungan</strong><br />\r\n<br />\r\npakaian muslim pada dasarnya sangat terkenal, warna desain dan bordir. Sejak berabad-abad busana muslim terkenal untuk pakaian, tetapi karena beberapa masalah sosial yang mereka tidak datang di seluruh dunia tapi sekarang situasi berubah karir sangat cepat dan sebagian besar wanita dan anak perempuan sekarang membuat dengan cara merancang yang masih seperti mimpi beberapa dekade kembali. Mode busana Muslim berkembang sangat cepat dalam hal kualitas dan gaya. pakaian muslim sekarang tersedia hampir di semua setiap warna dan gaya dengan polyester tradisional yang terbuat gaun. Busana muslim sekarang tersedia hampir di setiap warna dan dengan mode saat ini.<br />\r\n<br />\r\nBeberapa perancang mode terkenal mengambil pakaian busana muslim yang sangat serius dan mereka bekerja banyak dalam pengembangan busana muslim merancang. Banyak desainer terkenal dirancang muslim kain mode sekarang mudah tersedia di toko-toko online. Satu dapat membelinya sangat mudah online di diskon besar dan dapat menghemat waktu dan uang. Ada berbagai desain pakaian tersedia dari minimum untuk maksimal mencakup dalam busana busana muslim.\r\n', 'Kamis', '2011-10-06', '20:25:28', '56baju-muslim-keren1.jpg', 23, ''),
(8, 4, 'admin', 'Style Harajuku ', 'style-harajuku-', 'Y', 'Jepang adalah tempat di mana setiap orang adalah individu - tapi dalam kelompok. Jika Anda pergi ke taman pada jam tertentu setiap hari Sabtu, Anda akan melihat ratusan anak laki-laki berpakaian rocks and rollers, menari untuk musik rock and roll ... sangat serius. Maka tidak mengherankan bahwa ketika gadis-gadis ingin menampilkan mode inovatif bahwa tidak ada -seorangpun yang pernah melihat sebelumnya, mereka ingin melakukannya di tempat yang sama, pada waktu yang sama. Dan tempat itu adalah distrik Harajuku di Tokyo.<br />\r\n<br />\r\nIstilah &quot;Harajuku Girls&quot; telah digunakan oleh media berbahasa Inggris untuk menggambarkan remaja berpakaian dalam gaya busana yang berada di wilayah Harajuku. mode ini menanamkan beberapa terlihat dan gaya untuk membuat bentuk yang unik dari gaun. Salah satu gaya, Kawaii, menjadi terkenal pada 1990-an. Kawaii menjadi ungkapan populer yang berarti ada sesuatu yang manis atau cantik. Kawaii adalah bentuk resistensi dalam gaya dan budaya yang terkait dengan itu tidak dilihat sebagai menarik oleh generasi tua. Gagasan Kawaii adalah budaya pemuda yang berbeda yang terpisah dari yang tradisional di cyber-punk melihat existence.The mengambil pengaruh dari fashion gothic dan menggabungkan neon dan colors.However metalik, tidak sepopuler itu pada 1990-an.<br />\r\n<br />\r\n<strong>Asal Usul Harajuku</strong><br />\r\n<br />\r\nfashion Harajuku mendapatkan namanya dari distrik Harajuku di Tokyo. Semua diaktifkan-pada anak-anak harajuku pergi ke sana untuk menjelajahi banyak toko-toko pakaian dan mengumpulkan Yoyogi taman, kafe-kafe di jalan Omotesando atau dalam perjalanan ke kuil Meiji untuk menampilkan kreasi terbaru mereka harajuku untuk wisatawan maupun untuk teman-teman mereka.<br />\r\n<br />\r\nHarajuku menjadi terkenal pada 1980-an karena penyanyi jalanan dan liar-berpakaian remaja yang berkumpul di sana pada hari Minggu ketika Omotesando ditutup untuk lalu lintas. Omotesando adalah jalan yang sangat panjang dengan kafe-kafe dan butik fashion kelas atas populer dengan penduduk dan turis. Setelah menjadi pejalan kaki di hari minggu itu adalah tempat yang sempurna untuk bertemu, bermain musik dan pamer!<br />\r\n<br />\r\nMemiliki tempat pertemuan reguler untuk seni, percakapan dan kinerja memunculkan adegan band Hokoten bersemangat. Ini berhenti pada akhir tahun 1990-an dan jumlah pemain, penggemar Visual Kei,<br />\r\npenari rockabilly dan bajingan telah terus menurun sejak. Hari ini di hari Minggu orang bisa melihat banyak Gothic Lolita serta banyak wisatawan asing mengambil gambar dari mereka dalam perjalanan ke Meiji Shrine. Beberapa wisatawan yang terkejut melihat suatu pameran besar pemuda Jepang berpakaian dalam pakaian sering mengejutkan.\r\n', 'Kamis', '2011-10-06', '21:25:20', '38harajuku.jpg', 14, ''),
(9, 4, 'admin', 'Kejutan Koleksi Elegan ', 'kejutan-koleksi-elegan-', 'Y', 'Koleksi Hermes terbaru di Paris Fashion Week kental dengan kesan simpel, segar, dan mewah. Di tangan desainer barunya, Christophe Lemaire, koleksi Hermes mampu memukau ratusan tamu undangan yang hadir.<br />\r\n<br />\r\nSaat pergelaran, Lemaire mencetuskan ide dengan menyembunyikan para model dalam bilik-bilik ruangan yang hanya diterangi cahaya lampu redup. Setelah itu, model keluar dan berjalan mengitari kursi penonton, kemudian secara acak berhenti di hadapan mereka sembari berpose anggun, lalu kembali berlenggak lenggok di atas panggung.<br />\r\n<br />\r\n&ldquo;Saya ingin menciptakan sesuatu yang baru dan segar, menampilkan wajah Hermes yang lebih segar dan penuh kejutan,&rdquo; ucap Lemaire seperti dilansir WWD.<br />\r\n<br />\r\nIde pergelaran itu terinspirasi dari pelancong yang mengembara ke tempat-tempat berbeda sambil mendengarkan alunan musik, lalu ada seorang wanita yang datang tiba-tiba, memesona dan cantik.<br />\r\n<br />\r\nIbarat penonton, pemandangan seperti itulah yang tertangkap dalam imajinasi. Apa hanya pergelaran yang berbeda? Ternyata tidak.<br />\r\n<br />\r\nKejutan juga datang dari koleksi busana, tas, serta aksesori yang dirancang Lemaire. Koleksi busana Hermes lebih bermain pada warna-warna putih, pastel, dan kombinasi warna terang seperti merah, oranye, kuning, dan hijau.<br />\r\n<br />\r\nPergelaran dibuka dengan koleksi atasan berwarna putih yang dikombinasi dengan model celana harem dan jaket balon berukuran besar. Selanjutnya ditampilkan pula koleksi gaun tunik dan celana kulit berpotongan lebar dengan tiga strip garis di bagian betis. Ada juga rok dengan detail cutting dan siluet menyamping, serta atasan dari bahan kulit.<br />\r\n<br />\r\nAdapun yang menjadi inspirasi dari koleksi tersebut adalah gaun futuristik Yunani di era 1980-an ketika warna putih menjadi warna dominan yang berpadu dengan bahan kulit serta garis lipitan yang tegas memanjang. Sekilas, gaun tersebut terkesan klasik dan monoton. Tapi, perhatian penonton tak hentinya tertuju pada model-model yang berseliweran di depan dan sekeliling mereka.<br />\r\n<br />\r\nHanya ada beberapa gaun yang direpresentasikan dengan ekspresi ceria oleh sang model. Oh ya, satu lagi yang menarik, kebanyakan dari mereka mengenakan ikat kepala dari bahan kulit tepat di batas garis poni lurus yang tertata rapi. Lemaire tidak hanya menunjukkan warna putih pada rancangannya.<br />\r\n<br />\r\nDia kembali hadir membawa nuansa warna pelangi. Salah satunya koleksi two pieces yang penuh kombinasi dua warna, yakni merah dan biru berupa baju atasan dan rok mini berpadu dengan stocking warna senada.<br />\r\n<br />\r\nSelanjutnya, model memamerkan rok mini lipit, kemeja polos, dan jaket berkulit lembut yang bahannya diambil dari bulu domba.<br />\r\n<br />\r\nDiikuti oleh model yang mengenakan gaun pendek berwarna oranye berbahan linen dengan variasi sabuk kulit.Gaun ini cukup menarik perhatian karena menampilkan kesan yang unik. Pergelaran berlanjut pada model yang membawa koleksi setelan baju warna hijau berpadu dengan celana pendek warna karamel diikuti gaun cetak bergaya Amerika Indian yang memiliki kantung celana di bagian sisi kanan dan kiri pinggul.<br />\r\n<br />\r\nKemudian,ada dua model yang bergantian tampil, salah satunya mengenakan suede shirt warna hijau dengan lengan tiga perempat dipadu rok berbahan kulit warna ungu terong. Sebagian besar koleksi Hermes tersebut coba memadukan antara gaya Yunani klasik dan gaya modern Amerika yang dibalut dengan permainan warnawarni yang selaras.<br />\r\n<br />\r\nLemaire mengemas pergelaran Hermes dengan sentuhan yang &ldquo;berjiwa&rdquo; dan filosofi yang kuat. Tidak jauh berbeda dengan identitas Hermes sebelumnya, koleksi Spring/Summer 2012ini menampilkan kreasi yang lebih dinamis dan tentu saja elegan.\r\n', 'Kamis', '2011-10-06', '21:54:35', '72fengho1.jpg', 30, ''),
(10, 3, 'admin', 'Bebaskan Ekspresi Anda dalam Bergaya!', 'bebaskan-ekspresi-anda-dalam-bergaya', 'Y', 'Perancang ternama dari kiblat fashion dunia, Paris, Yves Saint Laurent<br />\r\nFashion pernah mengatakan, &ldquo;Fashion come and go, but style is forever&rdquo;.<br />\r\n<br />\r\nSederhananya, fashion bisa saja terus berubah, apa pun model dan trennya. Namun soal gaya, akan menetap pada diri seseorang sesuai karakternya. Ketika seseorang merasa nyaman dengan gaya tertentu, yang menjadi ciri khasnya, itu adalah pilihannya.<br />\r\n<br />\r\nHal ini pula yang diyakini Melia Prawira, pemilik toko fashion Jabotabek Shopping &amp; Friends. Dalam sebuah talkshow pembukaan pusat belanja dan fashion remaja, Melia mengatakan tidak ada tren fashion tertentu, menjawab pertanyaan apakah tren fashion tahun ini untuk anak muda.<br />\r\n<br />\r\nMenurut perempuan yang berkecimpung di dunia fashion selama 9 tahun ini, kecenderungan anak muda saat ini adalah ekspresif dengan dirinya. Model fashion yang muncul di layar kaca dari kiblat mana pun tak lagi jadi acuan mutlak.<br />\r\n<br />\r\n&ldquo;Gaya busana anak muda sekarang lebih ekspresif dan senang mengombinasikan warna. Mereka cenderung melihat ke dirinya. Apa yang pantas dan tidak untuk dikenakan,&rdquo; papar Melia.<br />\r\n<br />\r\nIstilah korban mode sudah nyaris tak lagi ditemui sekarang ini. Fashion pada anak muda lebih berkarakter dan menunjukkan ciri khas personal, termasuk padupadan warna.<br />\r\n<br />\r\nSementara itu fashion stylist Karin Wijaya justru mengakui tren warna ini. Menurutnya, trashing warna pada gaya busana anak muda yang menjadi tren terkini.<br />\r\n<br />\r\n&ldquo;Warna cerah yang optimis merepresentasikan semangat optimisme anak muda,&rdquo; kata Karin dalam launching produk sportswear beberapa waktu lalu.<br />\r\n<br />\r\nMeski begitu, fashion etnik menjadi tren yang cenderung menonjol pada tahun ini seperti diakui oleh Melia. Batik, menjadi produk lokal yang fashionable dan digemari anak muda. Menurut Melia, batik sebagai fashion muncul sejak budaya lokal mulai diklaim negara tetangga. Jadi, tren etnik batik muncul sebagai bentuk kecintaan karakter khas negeri.<br />\r\n<br />\r\nVariasi model dan desain batik pun semakin banyak yang berkarakter khas anak muda. Padupadan batik juga lebih berani. Misalkan, kata Melia, batik tak hanya berpasangan dengan high heels, tapi juga bisa dengan sepatu kets. Aksesori etnik juga pantas dipadukan dengan motif batik yang cenderung kaya warna. Pilihan warna juga tak harus seragam. Jadi, berani mengkolaborasikan ragam model dan desain serta warna, itulah tren fashion saat ini.<br />\r\n<br />\r\nSyaratnya, menurut Melia, nilai kepantasan berbusana lebih menjadi ukuran daripada apa mereknya atau keluaran mana. Simak triknya:<br />\r\n<br />\r\n<strong>Warna kulit</strong><br />\r\nOrang Indonesia cenderung memiliki warna kulit kecoklatan. Triknya, jangan gunakan warna krem karena kulit akan terlihat kumal. Coklat gelap lebih cocok karena akan lebih menonjolkan warna kulit.<br />\r\n<br />\r\n<strong>Bentuk badan</strong><br />\r\nPersoalan kepercayaan diri kaitannya dengan bentuk badan bisa terlihat dari busana yang dikenakannya. Jika ada orang berbadan besar, dan cukup nyaman serta percaya diri dengan pakaian sedikit terbuka, sah saja. Namun perlu juga diperhatikan apakah bentuk badan Anda cocok untuk busana tertentu. Tidak semua busana bisa pas di badan atau enak dilihat. Perlu konsultasi dengan pakar fashion atau sering membaca referensi fashion untuk mengenali gaya busana sesuai bentuk badan.<br />\r\n<br />\r\n<strong>Karakter</strong><br />\r\nBagaimana karakter dan pembawaan dalam diri juga bisa menjadi ukuran kepantasan. Jika Anda merasa nyaman dengan tampil sporty, tren batik masih bisa diikuti. Padankan saja dengan sepatu kets dan cardigan. Masih ada sentuhan feminin dan maskulin bukan? Atau gunakan jaket sporty dengan dalaman kemeja lengan panjang dan bawahan celana jins misalnya. Sporty dan rapi menjadi gaya busana yang tak menipu karakter Anda bukan?\r\n', 'Kamis', '2011-10-06', '22:37:24', '43you.jpg', 12, ''),
(11, 2, 'admin', 'Motivasi Diri Menjadi yang Terbaik', 'motivasi-diri-menjadi-yang-terbaik', 'Y', 'Semua orang ingin memiliki kehidupan yang bersemangat dan penuh warna. Dan menurut saya untuk memiliki kehidupan yang kita inginkan, kita harus memiliki mimpi, dan berusaha mewujudkan mimpi itu hingga berhasil. Percayalah, saat yang paling menyenangkan adalah saat proses pencapaiannya. Nah berikut ada kumpulan Kata bijak yang akan memotivasi anda menjadi yang terbaik untuk memperoleh mimpimu.<br />\r\n<br />\r\n1. Jangan pernah memotong sesuatu yang dapat dibuka ikatannya.<br />\r\n2. Lihatlah masalah sebagai kesempatan untuk pertumbuhan dan penguasaan diri.<br />\r\n3. Jadilah ahli dalam manajemen waktu.<br />\r\n4. Nilailah keberhasilanmu dengan menggunakan tolok ukur seberapa banyak engkau menikmati kedamaian, kesehatan, dan kasih sayang.<br />\r\n5. Jangan tunda pelaksanaan gagasan (ide-ide) yang baik. Kemungkinan ada orang lain yang baru saja memikirkannya juga. Sukses datang kepada orang yang bertindak terlebih dahulu.<br />\r\n6. Berhati-hatilah terhadap orang yang mengatakan kepadamu betapa ia itu jujur.<br />\r\n7. Ingatlah bahwa pemenang melakukan apa yang tidak mau dilakukan oleh pecundang.<br />\r\n8. Carilah peluang, bukan rasa aman. Kapal di pelabuhan memang aman, tetapi pada waktunya bagian bawahnya akan rusak berkarat.<br />\r\n9. Jalanilah hidupmu sedemikian rupa sehingga tulisan di batu nisanmu dapat berbunyi: &ldquo;Tidak Ada Penyesalan&rdquo;.<br />\r\n10. Usahakan mencapai keunggulan, bukan kesempurnaan.<br />\r\n11. Beri orang kesempatan kedua, tetapi jangan kesempatan ketiga.<br />\r\n12. Belajarlah mengenali hal-hal yang tidak berkaitan, kemudian abaikan!<br />\r\n13. Jangan lupa, kebutuhan emosional terbesar seseorang adalah untuk merasa dihargai.<br />\r\n14. Habiskan lebih sedikit waktu untuk membahas siapa yang benar, dan lebih banyak waktu untuk membahas apa yang benar!<br />\r\n15. Pekerjakan orang yang lebih pandai darimu.<br />\r\n16. Jangan membakar jembatan, engkau akan heran betapa sering engkau harus menyeberangi sungai yang sama.<br />\r\n17. Jagalah agar ekspektasi (harapan-harapan) tetap tinggi.<br />\r\n18. Jangan gunakan waktu dan/atau kata dengan ceroboh, keduanya tidak dapat diperoleh kembali.<br />\r\n19. Jadilah orang yang berani dan tabah! Sewaktu mengingat kembali kehidupan yang telah lewat, engkau akan lebih menyesali hal-hal yang tidak dilakukan, daripada hal-hal yang telah dilakukan pada masa lalu.<br />\r\n20. Evaluasi prestasimu berdasarkan standarmu sendiri, bukan standar orang lain.<br />\r\n21. Berusahalah untuk tetap hidup lebih berarti, dari pada hidup lebih lama.<br />\r\n22. Jadilah orang yang tegas, walaupun itu berarti engkau kadang-kadang keliru.<br />\r\n23. Tentukanlah sikapmu, jangan biarkan orang lain menentukannya untukmu.<br />\r\n24. Lupakan Panitia! Gagasan baru yang mengubah dunia selalu datang dari satu orang yang mau bekerja sama dengan orang lain, bukan melalui upacara-upacara!<br />\r\n25. Berikanlah upah yang sama untuk pekerjaan yang sama, tanpa memandang hal-hal yang lain.<br />\r\n26. Jangan biarkan hartamu memilikimu!<br />\r\n27. Jagalah reputasimu! Reputasi adalah modal yang paling berharga.<br />\r\n28. Perbaiki prestasimu melalui memperbaiki sikap dan kemampuanmu.<br />\r\n29. Kerjakan dengan benar pada kesempatan pertama.<br />\r\n30. Jangan pernah meremehkan kekuatan kata atau perbuatan yang baik.<br />\r\n31. Jangan takut untuk mengatakan: &ldquo;Saya tidak tahu&rdquo;, &ldquo;Maafkan Saya&rdquo;, &ldquo;Saya yang membuat kesalahan itu&rdquo;, &ldquo;Saya memerlukan bantuan Anda&rdquo;.<br />\r\n32. Pikiranmu hanya dapat menyimpan satu pikiran pada satu kesempatan, oleh karena itu jadikanlah itu pikiran yang positif dan konstruktif.<br />\r\n33. Jangan pernah mencabut/mematikan harapan seseorang, mungkin hanya itulah yang dimilikinya!<br />\r\n34. Sesudah bekerja keras untuk mendapatkan apa yang engkau inginkan, luangkanlah waktu untuk menikmatinya!\r\n', 'Kamis', '2011-10-06', '22:43:09', '73mencapai-kesuksesan.jpg', 7, ''),
(12, 2, 'admin', 'Ikat Pinggang (Cara Pakai dan Gaya)', 'ikat-pinggang-cara-pakai-dan-gaya', 'Y', '<p>\r\nSeperti aksesoris lainnya, ikat pinggang dipakai tidak hanya karena fungsinya, tapi juga karena alasan style dan fashion. Belt dapat mengubah pakaian biasa menjadi lebih stylish dalam sekejap. Kenakan belt dengan model berbeda2, maka anda mendapatkan pakaian yang sama dengan gaya yang berbeda untuk beberapa acara.<br />\r\n<br />\r\nAwalnya belt dikenakan di pinggang untuk membentuk pinggang dan menciptakan siluet feminin. Tapi kini ikat pinggang telah bermigrasi ke seluruh torso, di bawah garis dada, ke pinggang, dan bahkan di sekitar pinggul sebagai fashion belt.<br />\r\n<br />\r\n<strong>Belt Lebar</strong><br />\r\nKenakan Belt lebar di bagian terkecil dari torso ~ yaitu di pinggang anda ~ Belt akan memberi bentuk dan menonjolkan lekukan pada tubuh. Untuk pemakaian di pinggang dapat dipilih yang ukuran sedang maupun obi yang oversize. Untuk pemakaian di pinggul pilih yang berukuran tidak terlalu besar.<br />\r\n<br />\r\nAnda bisa mengenakan belt lebar dengan blazer, cardigan, atasan longgar, oversize dress, atau terusan<br />\r\n<br />\r\nTips: Agar lebih nyaman saat dikenakan, untuk pemakaian di pinggang, pilih bahan belt yang lentur dan tidak kaku. yang dapat tahan dan tetap pada tempatnya mengikuti gerakan membungkuk ataupun duduk bahkan apabila dikenakan selama seharian.<br />\r\n<br />\r\nSuka Oversized Belt? Usahakan agar aksesoris lainnya tetap simple.<br />\r\n<br />\r\nUntuk tubuh agak berisi, hindari belt yang terlalu ketat, karena akan membuat tonjolan di atas dan bawah belt. Anda dapat mengenakan jaket atau cardigan di luarnya untuk menutupi nya. Dan pilih belt yang tidak terlalu tebal.<br />\r\n<br />\r\n<strong>Skinny Belts</strong><br />\r\nIkat Pinggang Skinny adalah salah satu must have accessories saat ini. Dari artikel majalah sampai lookbook, selalu terlihat fashion photo dengan skinny belt.<br />\r\n<br />\r\nSkinny belt cocok digunakan dari di empire waist (bawah garis dada), pinggang, maupun di pinggul.&nbsp; Biasanya terbuat dari kulit, rantai ataupun jalinan tali atau kain, dan karena ukurannya yang kecil kita dapat memilih skinny belt dengan warna-warna terang ataupun shimmering tanpa mendominasi pakaian yang dikenakan.<br />\r\n<br />\r\nTips: Untuk penggunaan di empire waist, belt anda akan memerlukan sedikit bantuan agar tidak melorot. Pastikan ada celah untuk menyelipkan belt anda sehingga akan tetap pada tempatnya.\r\n</p>\r\n', 'Kamis', '2011-10-06', '22:58:35', '57ikat-pinggang-fashion.jpg', 5, ''),
(13, 3, 'admin', ' Tampil Gaya Sesuai Bentuk Tubuh', '-tampil-gaya-sesuai-bentuk-tubuh', 'Y', 'Bentuk badan tak ideal bukan berarti Anda tak bisa tampil gaya. Anda tetap bisa mengikuti tren fashion terbaru dengan menyiasati bentuk tubuh Anda.<br />\r\n<br />\r\nBentuk tubuh wanita banyak macamnya, tapi secara garis besar dibagi menjadi empat kategori. Yaitu bentuk tubuh apel, pir, lurus, dan jam pasir.<br />\r\n<br />\r\nJika Anda telah mengenali bentuk tubuh Anda dan kekurangannya, akan lebih mudah mencari busana yang sesuai. Ikuti tips berikut ini.<br />\r\n<br />\r\n<strong>Bentuk tubuh apel</strong><br />\r\nPostur tubuh seperti buah apel memiliki bentuk badan yang cenderung bulat pendek dan sedikit lebih besar di bagian tengah. Agar tubuh tampil lebih proporsional, kenakan busana dengan bentuk kerah V-neck.<br />\r\n<br />\r\nUntuk menyiasati bentuk bagian tengah badan yang lebih besar, kenakan busana atasan model empire. Garis potongan empire di bawah dada akan mengalihkan perhatian dari bagian torso.<br />\r\n<br />\r\nSebagai padanannya, Anda bisa mengenakan celana berpotongan lurus. Anda bisa mengenakan celana berpotongan mengecil di bawah (pensil) jika pagian pinggul tak terlalu besar. Tapi celana pensil akan memberi efek kaki lebih pendek.<br />\r\n<br />\r\n<strong>Bentuk tubuh pir</strong><br />\r\nTubuh dengan bentuk pir memiliki ciri khas lebih besar di bagian bawah, terutama pinggul dan bokong. Untuk mengatasinya, kenakan atasan yang berwarna lebih cerah daripada bagian bawah.<br />\r\n<br />\r\nHindari atasan berwarna gelap karena memberi kesan tubuh bagian bawah makin besar. Anda bisa memilih atasan dengan potongan bahu yang tegas misalnya jaket. Dan juga pilih bahan yang sedikit tebal dan kaku.wool<br />\r\n<br />\r\n<strong>Bentuk tubuh lurus</strong><br />\r\nAnda memerlukan busana yang bisa membuat tubuh terlihat lebih berisi dan berbentuk. Kenakan baju dengan detail di beberapa bagian, misalnya frill, kerut, pita, dan sebagainya.<br />\r\n<br />\r\nBila mengenakan gaun, pilih yang berpotongan rok mengembang atau A-line. Anda bisa mengenakan busana yang memberi kesan bervolume. Seperti bentuk lengan gembung, draperi, dan sebagainya. Kenakan ikat pinggang besar sebagai aksen.<br />\r\n<br />\r\nJangan mengenakan busana berbahan ringan dan jatuh karena akan membuat tubuh terlihat makin &#39;tipis&#39;.<br />\r\n<br />\r\n<strong>Bentuk jam pasir</strong><br />\r\nSiluet tubuh jam pasir bisa dikatakan sangat ideal. Bagian tubuh yang mengecil di pinggang bisa Anda jadikan aset untuk tampil seksi. Kenakan gaun dengan rok berpotongan A-line untuk memusatkan perhatian pada pinggang yang langsing.\r\n', 'Kamis', '2011-10-06', '23:07:54', '23busana_sesuai_bentuk_tubuh.jpg', 4, ''),
(14, 2, 'admin', 'Resep Awet Muda Hillary', 'resep-awet-muda-hillary', 'Y', 'Kegiatan Hillary Clinton yang padat juga berefek pada gaya rambutnya. Saat masih menjadi Ibu Negara, rambutnya masih bergaya bob diatas bahu, dan sering dipercantik dengan menggunakan bando. Tetapi, saat kegiatannya semakin padat ia pun memangkas rambutnya menjadi pendek.<br />\r\n<br />\r\nPenampilan Hillary Clinton memang tipikal wanita karier. Dengan rambut pendek dan busananya yang selalu resmi, membuatnya lebih berkarisma dan berwibawa. Untuk wanita sibuk seperti Hillary, rambut pendek memang pilihan tepat. Penataannya praktis dan tidak&nbsp; menghabiskan waktu berjam-jam.<br />\r\n<br />\r\nGaya rambut ini juga dapat membuatnya tampak lebih segar dan muda. Apalagi, sangat cocok dengan bentuk wajahnya yang&nbsp; berbentuk hati. Ditambah senyum lepasnya yang menawan, model rambut ini menyulap penampilan Hillary tampak lebih muda<br />\r\n<br />\r\nUntuk meniru gaya rambut ini, usapkan gel atau mousse pada rambut secara acak, lalu di-blow dry. Untuk tatanan poni, rol rambut bagian depan ini beberapa saat. Penampilan pun menjadi lebih mempesona.<br />\r\n<br />\r\nNamun, gaya rambut Hillary ini sempat menuai kritik. Ia pernah menata rambut pendeknya ala wanita Ukraina di malam pencalonan dirinya di Partai Demokrat. Yaitu dengan hiasan kepang melingkari kepalanya. Gaya rambutnya itu terinspirasi dari Perdana Menteri Ukraina, Tymoshenko. Tymoshenko memang memiliki gaya rambut yang sangat khas.<br />\r\n<br />\r\nSalah satu yang mengkritiknya adalah Mario Diab, penata rambut Laura dan Barbara Bush. Ia menyayangkan tatanan rambut yang diikuti Hillary itu. &quot;Itu gaya rambuat 80-an dan sangat tidak chic,&quot; kata Mario. Menanggapi reaksi itu, Hillary berkomentar, bahwa ia mengalami bad hair day pada waktu itu.&nbsp; Dan, ia menutupinya dengan hiasan kepang ala wanita Ukraina.<br />\r\n&nbsp;<br />\r\nUntuk biaya penataan rambut, kabarnya Hillary menghabiskan US $ 1000 untuk tatanan rambut, dan $ 2000 untuk riasan wajah yang ditangani langsung oleh Barbara Lacy. Lacy merupakan penata rambut dan perias wajah andalan selebritis Hollywood.\r\n', 'Kamis', '2011-10-06', '23:11:08', '2168hillaryclinton.jpg', 26, '');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(10, 'Katalog 001', 'test.jpg', '2011-01-31', 4);

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(1, 'Green', '', '2011-08-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `id_header` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(21, 'Header1', '', '1.jpg', '2011-03-29'),
(22, 'Header2', '', '2.jpg', '2011-03-29'),
(23, 'Header3', '', '3.jpg', '2011-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `hubungi`
--


-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE IF NOT EXISTS `katajelek` (
  `id_jelek` int(11) NOT NULL AUTO_INCREMENT,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_jelek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `ganti`) VALUES
(4, 'sex', 's**'),
(2, 'bajingan', 'b*******'),
(3, 'bangsat', 'b******');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(17, 'Koleksi Baju', 'koleksi-baju'),
(16, 'Jaket Gaya', 'jaket-gaya'),
(15, 'Celana Gaul', 'celana-gaul'),
(14, 'Aneka Kaos', 'aneka-kaos'),
(18, 'Ragam Topi', 'ragam-topi');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriblog`
--

CREATE TABLE IF NOT EXISTS `kategoriblog` (
  `id_kategoriblog` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategoriblog` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategoriblog_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategoriblog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategoriblog`
--

INSERT INTO `kategoriblog` (`id_kategoriblog`, `nama_kategoriblog`, `kategoriblog_seo`) VALUES
(2, 'Tips & Trik', 'tips--trik'),
(3, 'Kabar-kabari', 'kabarkabari'),
(4, 'Dunia Fashion', 'dunia-fashion');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_blog` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_blog`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`) VALUES
(12, 8, 'oman', '', ' tes   ', '2011-10-23', '21:54:38', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(3) NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(10) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_perusahaan`, `nama_kota`, `ongkos_kirim`) VALUES
(5, 5, 'Jakarta', 15000),
(6, 6, 'Bandung', 15000),
(7, 5, 'Surabaya', 13000),
(8, 5, 'Semarang', 17500),
(9, 6, 'Medan', 20000),
(10, 6, 'Aceh', 25000),
(11, 6, 'Banjarmasin', 17600);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(15, 'Pasang Iklan', 'http://', 'logo.png', '2011-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_main` int(5) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_main`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `link`, `aktif`) VALUES
(10, 'BERANDA', 'index.php', 'Y'),
(11, 'PROFIL ', 'profil-kami.html', 'Y'),
(12, 'PRODUK', 'semua-produk.html', 'Y'),
(13, 'KERANJANG BELANJA', 'keranjang-belanja.html', 'Y'),
(14, 'CARA PEMBELIAN', 'cara-pembelian.html', 'Y'),
(15, ' KATALOG', 'semua-download.html', 'Y'),
(16, 'HUBUNGI KAMI', 'hubungi-kami.html', 'Y'),
(17, 'TESTIMONI', 'testimoni.html', 'Y'),
(18, 'BLOG', 'semua-blog.html', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `status`, `aktif`, `urutan`) VALUES
(18, 'Tambah Produk', '?module=produk', '', '', 'admin', 'Y', 5),
(42, 'Lihat Order Masuk', '?module=order', '', '', 'admin', 'Y', 8),
(10, 'Manajemen Modul', '?module=modul', '', '', 'admin', 'Y', 19),
(31, 'Tambah Kategori Produk', '?module=kategori', '', '', 'admin', 'Y', 4),
(43, 'Edit Profil', '?module=profil', '<p class="MsoNormal">\r\n<!--[if gte mso 9]><xml>\r\n<w:WordDocument>\r\n<w:View>Normal</w:View>\r\n<w:Zoom>0</w:Zoom>\r\n<w:Compatibility>\r\n<w:BreakWrappedTables/>\r\n<w:SnapToGridInCell/>\r\n<w:WrapTextWithPunct/>\r\n<w:UseAsianBreakRules/>\r\n</w:Compatibility>\r\n<w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n</w:WordDocument>\r\n</xml><![endif]-->\r\n<!--\r\n/* Style Definitions */\r\np.MsoNormal, li.MsoNormal, div.MsoNormal\r\n{mso-style-parent:"";\r\nmargin:0cm;\r\nmargin-bottom:.0001pt;\r\nmso-pagination:widow-orphan;\r\nfont-size:12.0pt;\r\nfont-family:"Times New Roman";\r\nmso-fareast-font-family:"Times New Roman";}\r\n@page Section1\r\n{size:612.0pt 792.0pt;\r\nmargin:72.0pt 90.0pt 72.0pt 90.0pt;\r\nmso-header-margin:35.4pt;\r\nmso-footer-margin:35.4pt;\r\nmso-paper-source:0;}\r\ndiv.Section1\r\n{page:Section1;}\r\n-->\r\n<!--[if gte mso 10]>\r\n<style>\r\n/* Style Definitions */\r\ntable.MsoNormalTable\r\n{mso-style-name:"Table Normal";\r\nmso-tstyle-rowband-size:0;\r\nmso-tstyle-colband-size:0;\r\nmso-style-noshow:yes;\r\nmso-style-parent:"";\r\nmso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\nmso-para-margin:0cm;\r\nmso-para-margin-bottom:.0001pt;\r\nmso-pagination:widow-orphan;\r\nfont-size:10.0pt;\r\nfont-family:"Times New Roman";}\r\n</style>\r\n<![endif]--><font size="2">Griya Gaya adalah toko fashion online, yang menyediakan segala kebutuhan fashion anda. Griya Gaya&nbsp; ingin memberikan kemudahan kepada para calon pembeli, cara santai, mudah dan hemat dalam berbelanja fashion berkualias dengan harga yang terjangkau.<br />\r\n<br />\r\nKarena itulah website ini dibuat sedemikian sederhananya sehingga diharapkan dapat membantu para pengunjung untuk dapat menelusuri produk-produk yang ditawarkan secara lebih mudah.<br />\r\n<br />\r\nSelain melayani pesanan produk-produk yang ada di toko online, kami menerima pembuatan/pemesanan fashion sesuai design/pola&nbsp; yang anda inginkan.<br />\r\n<br />\r\nAkhirnya, kami mengucapkan terima kasih atas kunjungan anda di Griya Gaya.<br />\r\n<br />\r\n</font>\r\n</p>\r\n', '12sfhijau.jpg', 'admin', 'Y', 7),
(44, 'Lihat Pesan Masuk', '?module=hubungi', '', '', 'admin', 'Y', 9),
(45, ' Edit Cara Pembelian', '?module=carabeli', '<ol>\r\n	<li>Klik pada tombol&nbsp;<span style="font-weight: bold">Beli</span> pada produk yang ingin Anda pesan.</li>\r\n	<li>Produk yang Anda pesan akan masuk ke dalam <span style="font-weight: bold">Keranjang Belanja</span>. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom <span style="font-weight: bold">Jumlah</span>, kemudian klik tombol <span style="font-weight: bold">Update</span>. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.</li>\r\n	<li>Jika sudah selesai, klik tombol <span style="font-weight: bold">Selesai Belanja</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</li>\r\n	<li>Setelah data pembeli selesai diisikan, klik tombol <span style="font-weight: bold">Proses</span>, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordernya). Dan juga ada total pembayaran serta nomor rekening pembayaran.</li>\r\n	<li>Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan. <br />\r\n	</li>\r\n</ol>\r\n', 'gedung.jpg', 'admin', 'Y', 10),
(47, 'Edit Link Terkait', '?module=banner', '', '', 'user', 'Y', 13),
(48, 'Edit Ongkos Kirim', '?module=ongkoskirim', '', '', 'user', 'Y', 11),
(49, 'Ganti Password', '?module=password', '', '', 'user', 'Y', 1),
(53, 'User Yahoo Messenger', '?module=ym', '', '', 'user', 'Y', 15),
(52, 'Lihat Laporan Transaksi', '?module=laporan', '', '', 'user', 'Y', 14),
(56, 'Edit Jasa Pengiriman', '?module=jasapengiriman', '<span class="center_content2"><font size="2"><span class="center_content">\r\n<div class="profil">\r\n<div>\r\n<font size="3"><strong>Selamat Datang di GriyaGaya. </strong></font><br />\r\n</div>\r\n<div>\r\n&nbsp;\r\n</div>\r\n<div>\r\n<span class="center_content2"><font size="2"><span class="center_content">Griya Gaya adalah toko fashion online, yang menyediakan segala kebutuhan fashion anda. Griya Gaya&nbsp; ingin memberikan kemudahan kepada para calon pembeli, cara santai, mudah dan hemat dalam berbelanja fashion berkualias dengan harga yang terjangkau.<br />\r\n<br />\r\nKarena itulah website ini dibuat sedemikian sederhananya sehingga diharapkan dapat membantu para pengunjung untuk dapat menelusuri produk-produk yang ditawarkan secara lebih mudah.<br />\r\n<br />\r\nSelain melayani pesanan produk-produk yang ada di toko online, kami menerima pembuatan/pemesanan fashion sesuai design/pola&nbsp; yang anda inginkan.<br />\r\n<br />\r\nAkhirnya, kami mengucapkan terima kasih atas kunjungan anda di Griya Gaya.<br />\r\n<br />\r\n</span></font></span>\r\n</div>\r\n</div>\r\n</span></font></span>\r\n', 'hai.jpg', 'user', 'Y', 12),
(57, 'Edit Rekening Bank', '?module=bank', '', '', 'user', 'Y', 16),
(58, 'Edit Selamat Datang', '?module=welcome', 'rizalfaizal \r\nini.\r\n', 'rizal.jpg', 'user', 'Y', 6),
(59, 'Ganti Header', '?module=header', '', '', 'user', 'Y', 18),
(61, 'Edit Menu Utama', '?module=menuutama', '', '', 'user', 'Y', 2),
(62, 'Edit Sub Menu', '?module=submenu', '', '', 'user', 'Y', 3),
(63, 'Edit Download Katalog', '?module=download', '', '', 'user', 'Y', 17),
(64, 'Edit Polling', '?module=poling', '', '', 'user', 'Y', 20);

-- --------------------------------------------------------

--
-- Table structure for table `mod_alamat`
--

CREATE TABLE IF NOT EXISTS `mod_alamat` (
  `id_alamat` int(5) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mod_alamat`
--

INSERT INTO `mod_alamat` (`id_alamat`, `alamat`) VALUES
(1, '<p>\r\n<strong>Griya Gaya</strong>\r\n</p>\r\n<p>\r\nJl. Kalibata Selatan II/2B\r\n</p>\r\n<p>\r\nJakarta 12740, Indonesia \r\n</p>\r\n<p>\r\nTelp. 021.32972759\r\n</p>\r\n<p>\r\nEmail: rizal_fzl@yahoo.com \r\n</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mod_bank`
--

CREATE TABLE IF NOT EXISTS `mod_bank` (
  `id_bank` int(5) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mod_bank`
--

INSERT INTO `mod_bank` (`id_bank`, `nama_bank`, `no_rekening`, `pemilik`, `gambar`) VALUES
(1, 'Mandiri', '1260005244719', 'Niken Sulanjari', 'mandiri.gif');

-- --------------------------------------------------------

--
-- Table structure for table `mod_ym`
--

CREATE TABLE IF NOT EXISTS `mod_ym` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mod_ym`
--

INSERT INTO `mod_ym` (`id`, `nama`, `username`) VALUES
(1, 'Rizal Faizal', 'rizal_fzl');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kustomer` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status_order` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Baru',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_kota` int(3) NOT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `nama_kustomer`, `alamat`, `telpon`, `email`, `status_order`, `tgl_order`, `jam_order`, `id_kota`) VALUES
(1, 'Ryan', 'kalibata', '7986744', 'rizal_fzl@yahoo.com', 'Lunas/Terkirim', '2011-08-22', '13:34:30', 10),
(4, 'a', 'aa', '24', '2a@yahoo.com', 'Baru', '2011-09-02', '10:46:47', 10),
(5, 'a', 'aa', '24', '2a@yahoo.com', 'Baru', '2011-09-02', '10:48:32', 10),
(6, 'rizal', 'kalibata', '966553', 'rizal_fzl@yahoo.com', 'Baru', '2011-09-02', '16:32:32', 10),
(7, 'agus', 'kebon jeruk', '7778888', 'rizal_fzl@yahoo.com', 'Baru', '2011-09-04', '12:11:33', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `jumlah`) VALUES
(1, 66, 1),
(2, 81, 1),
(11, 85, 2),
(13, 87, 1),
(34, 86, 2),
(1, 69, 1),
(2, 87, 1),
(3, 69, 1),
(4, 74, 2),
(6, 88, 1),
(7, 74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL,
  PRIMARY KEY (`id_orders_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `orders_temp`
--

INSERT INTO `orders_temp` (`id_orders_temp`, `id_produk`, `id_session`, `jumlah`, `tgl_order_temp`, `jam_order_temp`, `stok_temp`) VALUES
(78, 66, '29mu1g66u58aas6trijis199h3', 1, '2011-09-11', '19:35:02', 79),
(76, 88, 'j3lqr9u1199jj4l2vetk7use16', 1, '2011-09-10', '01:45:29', 78),
(77, 70, 't473jal0t3r0ikqjpkj28oos60', 1, '2011-09-10', '22:40:42', 98);

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE IF NOT EXISTS `poling` (
  `id_poling` int(5) NOT NULL AUTO_INCREMENT,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_poling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `status`, `rating`, `aktif`) VALUES
(1, 'Bagus', 'Jawaban', 46, 'Y'),
(2, 'Lumayan', 'Jawaban', 87, 'Y'),
(3, 'Tidak', 'Jawaban', 30, 'Y'),
(8, 'Bagaimana tampilan web ini?', 'Pertanyaan', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `produk_seo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1',
  `diskon` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`, `diskon`) VALUES
(83, 14, 'Black Love', 'black-love', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 67000, 0, '0.00', '2011-03-15', '14blacklove.jpg', 1, 0),
(82, 16, 'Brown Garut', 'brown-garut', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 455000, 78, '0.00', '2011-03-15', '57garut.jpg', 1, 0),
(79, 17, 'Block Man', 'block-man', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 173000, 78, '0.00', '2011-03-15', '57blockman.jpg', 1, 0),
(80, 16, 'Snow White', 'snow-white', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 230000, 89, '0.00', '2011-03-15', '51snowwhite.jpg', 1, 0),
(81, 15, 'Arm Short Pants', 'arm-short-pants', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.</span>\r\n', 135000, 89, '0.00', '2011-03-15', '74armpant.jpg', 1, 0),
(78, 14, 'Embargo Republic', 'embargo-republic', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 75000, 86, '0.00', '2011-03-15', '45embargo.jpg', 1, 0),
(77, 18, 'Adidas UCF', 'adidas-ucf', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 65000, 78, '0.00', '2011-03-15', '77adidasucf.jpg', 1, 0),
(76, 16, 'BW Sporty', 'bw-sporty', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 187000, 79, '0.00', '2011-03-15', '61bws.jpg', 1, 0),
(75, 18, 'Dark Brown', 'dark-brown', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 75000, 60, '0.00', '2011-03-15', '5drakbrown.jpg', 1, 0),
(74, 14, 'CQ Brown', 'cq-brown', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 67000, 80, '0.00', '2011-03-15', '80cqbrown.jpg', 1, 0),
(73, 17, 'Blue Adem', 'blue-adem', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 245000, 80, '0.00', '2011-03-15', '33blueadem.jpg', 1, 0),
(72, 18, 'Adams Scott', 'adams-scott', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 70000, 97, '0.00', '2011-03-15', '33adamscoot.jpg', 1, 0),
(71, 16, 'Casual Jacket', 'casual-jacket', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 376000, 87, '0.00', '2011-03-15', '49cassual.jpg', 1, 0),
(70, 15, 'Ladies Short Pants', 'ladies-short-pants', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 80000, 98, '0.00', '2011-03-15', '27ladiesshortpants.jpg', 1, 0),
(84, 16, 'Green Sport', 'green-sport', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 245000, 89, '0.00', '2011-03-15', '27greensport.jpg', 1, 20),
(69, 17, 'Pink Adem', 'pink-adem', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 156000, 69, '0.00', '2011-03-15', '10pinkadem.jpg', 2, 0),
(85, 14, 'CQ Yellow', 'cq-yellow', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 67000, 56, '0.00', '2011-03-15', '39cqyellow.jpg', 1, 0),
(66, 17, 'Red Ferrari ', 'red-ferrari-', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 370000, 79, '0.00', '2011-03-15', '97ferrari.jpg', 2, 0),
(65, 16, 'Intermilan ', 'intermilan-', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 250000, 90, '0.00', '2011-03-15', '61intermilan.jpg', 1, 0),
(86, 15, 'Purple Boxer', 'purple-boxer', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 85000, 50, '1.00', '2011-03-15', '71boxer.jpg', 1, 10),
(64, 18, 'Hacker Hat', 'hacker-hat', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 40000, 87, '0.00', '2011-03-15', '88hacker.jpg', 1, 0),
(87, 14, 'Pink Lifter', 'pink-lifter', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\nIsi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh.\r\nIsi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan\r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di \r\nsini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. \r\n</span>\r\n', 78000, 80, '1.00', '2011-03-15', '20pinklifter.jpg', 1, 10),
(88, 17, 'Vodafone', 'vodafone', '<span class="center_content2">Isi keterangan produk di sini.&nbsp; Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh. Isi keterangan \r\nproduk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini.\r\nTeks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini \r\nhanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah \r\ncontoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi \r\nketerangan produk di sini. Teks ini hanyalah contoh.<br />\r\n<br />\r\n</span>\r\n', 376000, 78, '1.00', '2011-03-15', '66vodafone.jpg', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE IF NOT EXISTS `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL AUTO_INCREMENT,
  `info` varchar(700) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_sekilas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`, `aktif`) VALUES
(7, 'Web ini adalah salah satu demo toko online yang saya buat. Bila anda berminat order atau memiliki web ini, kontak saya di 021. 32972759.Dan sebagai demo/contoh lainnya silahkan lihat di <strong>Link Terkait</strong>.\r\n', '2011-08-22', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `shop_pengiriman`
--

CREATE TABLE IF NOT EXISTS `shop_pengiriman` (
  `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `shop_pengiriman`
--

INSERT INTO `shop_pengiriman` (`id_perusahaan`, `nama_perusahaan`, `gambar`) VALUES
(6, 'JNE', ''),
(5, 'TIKI', ''),
(7, 'POS EKSPRESS', '');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('110.137.247.0', '2011-08-22', 23, '1313988661'),
('119.63.196.26', '2011-08-22', 1, '1313985041'),
('119.63.196.19', '2011-08-22', 1, '1313985042'),
('180.248.134.12', '2011-08-22', 1, '1313986066'),
('110.138.79.178', '2011-08-22', 1, '1313987128'),
('66.249.71.216', '2011-08-22', 15, '1313998145'),
('110.137.229.202', '2011-08-22', 24, '1313998989'),
('125.163.142.171', '2011-08-22', 1, '1313991338'),
('112.78.133.173', '2011-08-22', 1, '1313992677'),
('203.130.251.162', '2011-08-22', 3, '1313999659'),
('127.0.0.1', '2011-08-22', 15, '1314031516'),
('127.0.0.1', '2011-08-23', 8, '1314033867'),
('127.0.0.1', '2011-08-27', 21, '1314464328'),
('127.0.0.1', '2011-08-28', 25, '1314465759'),
('127.0.0.1', '2011-08-30', 1, '1314667494'),
('222.124.198.172', '2011-08-30', 12, '1314721906'),
('222.124.216.165', '2011-08-30', 14, '1314715880'),
('125.160.41.156', '2011-08-30', 8, '1314718738'),
('119.63.196.16', '2011-08-31', 1, '1314726633'),
('66.249.71.229', '2011-08-31', 2, '1314742603'),
('114.79.23.232', '2011-08-31', 2, '1314737460'),
('66.249.71.216', '2011-08-31', 11, '1314801343'),
('114.79.0.204', '2011-08-31', 9, '1314759881'),
('125.164.252.196', '2011-08-31', 2, '1314758450'),
('110.232.82.19', '2011-08-31', 2, '1314767658'),
('222.124.198.172', '2011-08-31', 4, '1314795534'),
('114.79.3.16', '2011-08-31', 5, '1314798794'),
('110.138.66.153', '2011-08-31', 2, '1314801918'),
('114.79.51.177', '2011-08-31', 4, '1314805952'),
('66.249.71.229', '2011-09-01', 6, '1314846918'),
('66.249.71.216', '2011-09-01', 2, '1314821195'),
('119.63.196.47', '2011-09-01', 1, '1314824215'),
('67.195.110.178', '2011-09-01', 21, '1314878719'),
('125.167.104.57', '2011-09-01', 3, '1314871967'),
('222.124.198.172', '2011-09-01', 21, '1314893108'),
('223.255.229.5', '2011-09-01', 4, '1314874455'),
('114.79.20.163', '2011-09-02', 5, '1314906945'),
('110.138.49.119', '2011-09-02', 4, '1314898913'),
('119.63.196.26', '2011-09-02', 1, '1314901202'),
('67.195.110.178', '2011-09-02', 2, '1314943939'),
('222.124.198.172', '2011-09-02', 25, '1314977779'),
('66.249.71.229', '2011-09-02', 3, '1314913529'),
('120.166.45.18', '2011-09-02', 2, '1314921028'),
('125.167.104.57', '2011-09-02', 4, '1314929622'),
('223.255.229.18', '2011-09-02', 7, '1314930714'),
('119.63.196.24', '2011-09-02', 1, '1314930010'),
('114.79.6.49', '2011-09-02', 2, '1314931217'),
('66.249.71.216', '2011-09-02', 2, '1314931031'),
('118.96.201.64', '2011-09-02', 222, '1314935523'),
('119.63.196.85', '2011-09-02', 1, '1314937976'),
('119.63.196.106', '2011-09-02', 1, '1314946072'),
('174.129.237.157', '2011-09-02', 1, '1314952082'),
('180.76.5.21', '2011-09-02', 1, '1314954084'),
('120.166.50.55', '2011-09-02', 1, '1314956705'),
('180.76.5.146', '2011-09-02', 1, '1314962059'),
('120.166.97.32', '2011-09-02', 11, '1314972179'),
('110.138.69.103', '2011-09-02', 2, '1314975610'),
('202.152.194.129', '2011-09-02', 15, '1314978456'),
('110.138.65.182', '2011-09-02', 1, '1314979823'),
('114.79.2.45', '2011-09-02', 1, '1314981891'),
('180.76.5.111', '2011-09-03', 1, '1314982864'),
('202.152.194.129', '2011-09-03', 5, '1314987347'),
('222.124.198.172', '2011-09-03', 39, '1315067867'),
('118.96.156.185', '2011-09-03', 7, '1314986295'),
('120.166.102.154', '2011-09-03', 1, '1314987650'),
('202.152.194.131', '2011-09-03', 2, '1314989387'),
('180.76.5.148', '2011-09-03', 1, '1314998864'),
('180.76.5.50', '2011-09-03', 1, '1315013317'),
('66.249.67.216', '2011-09-03', 4, '1315049952'),
('114.79.2.146', '2011-09-03', 11, '1315017838'),
('202.152.194.203', '2011-09-03', 2, '1315022539'),
('180.76.5.66', '2011-09-03', 1, '1315024047'),
('114.79.6.234', '2011-09-03', 1, '1315025269'),
('180.76.5.94', '2011-09-03', 1, '1315033707'),
('180.76.5.137', '2011-09-03', 1, '1315042939'),
('125.165.86.158', '2011-09-03', 3, '1315048320'),
('125.163.86.131', '2011-09-03', 4, '1315050321'),
('125.161.144.117', '2011-09-03', 3, '1315054343'),
('66.249.72.69', '2011-09-03', 3, '1315063056'),
('180.76.5.60', '2011-09-03', 1, '1315059899'),
('202.152.196.133', '2011-09-03', 1, '1315060191'),
('202.152.196.132', '2011-09-03', 7, '1315060546'),
('110.138.64.210', '2011-09-03', 1, '1315061743'),
('180.76.5.58', '2011-09-03', 1, '1315068140'),
('125.160.33.120', '2011-09-04', 2, '1315075584'),
('180.76.5.99', '2011-09-04', 1, '1315083295'),
('222.124.198.172', '2011-09-04', 30, '1315151718'),
('110.138.69.44', '2011-09-04', 2, '1315101689'),
('64.141.101.197', '2011-09-04', 1, '1315102667'),
('182.7.29.235', '2011-09-04', 2, '1315105339'),
('110.138.94.198', '2011-09-04', 2, '1315107801'),
('180.76.5.157', '2011-09-04', 1, '1315109077'),
('114.79.2.60', '2011-09-04', 12, '1315112487'),
('66.249.72.69', '2011-09-04', 7, '1315140852'),
('66.249.72.73', '2011-09-04', 1, '1315113779'),
('207.46.204.167', '2011-09-04', 1, '1315115534'),
('110.138.66.44', '2011-09-04', 2, '1315119340'),
('202.152.202.226', '2011-09-04', 2, '1315119742'),
('125.165.8.41', '2011-09-04', 1, '1315121121'),
('120.166.44.139', '2011-09-04', 1, '1315121643'),
('114.79.60.159', '2011-09-04', 5, '1315123222'),
('114.79.50.33', '2011-09-04', 2, '1315126525'),
('114.79.4.108', '2011-09-04', 1, '1315127093'),
('114.79.51.4', '2011-09-04', 2, '1315128829'),
('114.79.50.142', '2011-09-04', 10, '1315133331'),
('222.124.156.242', '2011-09-04', 1, '1315142772'),
('119.63.196.116', '2011-09-05', 1, '1315162159'),
('119.63.196.118', '2011-09-05', 1, '1315166960'),
('119.63.196.78', '2011-09-05', 1, '1315166961'),
('119.63.196.110', '2011-09-05', 1, '1315171845'),
('119.63.196.52', '2011-09-05', 1, '1315171847'),
('119.63.196.26', '2011-09-05', 1, '1315176882'),
('222.124.38.221', '2011-09-05', 8, '1315182955'),
('202.148.26.83', '2011-09-05', 5, '1315192500'),
('119.63.196.24', '2011-09-05', 1, '1315187361'),
('114.79.18.166', '2011-09-05', 3, '1315188686'),
('180.246.38.51', '2011-09-05', 3, '1315190554'),
('119.63.196.21', '2011-09-05', 1, '1315192130'),
('125.165.138.27', '2011-09-05', 2, '1315193023'),
('114.79.55.15', '2011-09-05', 4, '1315196208'),
('182.4.55.76', '2011-09-05', 16, '1315198134'),
('222.124.198.172', '2011-09-05', 23, '1315241056'),
('118.97.15.194', '2011-09-05', 4, '1315197237'),
('118.96.173.51', '2011-09-05', 3, '1315197908'),
('222.124.75.129', '2011-09-05', 2, '1315198258'),
('180.76.5.90', '2011-09-05', 1, '1315198661'),
('112.78.133.158', '2011-09-05', 1, '1315199085'),
('118.137.18.116', '2011-09-05', 1, '1315200674'),
('125.166.231.243', '2011-09-05', 5, '1315201803'),
('119.63.196.117', '2011-09-05', 1, '1315201965'),
('118.98.170.202', '2011-09-05', 1, '1315202701'),
('114.79.4.228', '2011-09-05', 7, '1315203846'),
('209.191.87.217', '2011-09-05', 3, '1315203557'),
('125.166.199.170', '2011-09-05', 3, '1315204462'),
('223.255.229.2', '2011-09-05', 1, '1315204892'),
('119.63.196.120', '2011-09-05', 1, '1315207044'),
('180.242.115.219', '2011-09-05', 1, '1315207504'),
('223.255.226.135', '2011-09-05', 3, '1315209025'),
('182.2.93.238', '2011-09-05', 14, '1315213115'),
('119.63.196.46', '2011-09-05', 1, '1315211819'),
('202.152.243.156', '2011-09-05', 7, '1315213386'),
('117.103.174.122', '2011-09-05', 1, '1315213941'),
('180.245.137.81', '2011-09-05', 5, '1315214556'),
('203.78.121.5', '2011-09-05', 1, '1315214967'),
('182.7.23.231', '2011-09-05', 1, '1315215307'),
('114.79.50.39', '2011-09-05', 5, '1315215761'),
('202.152.243.2', '2011-09-05', 2, '1315216686'),
('118.96.248.77', '2011-09-05', 7, '1315219554'),
('119.63.196.75', '2011-09-05', 1, '1315217163'),
('119.63.196.22', '2011-09-05', 1, '1315217164'),
('120.166.68.32', '2011-09-05', 2, '1315217316'),
('120.166.34.134', '2011-09-05', 3, '1315218081'),
('66.249.72.73', '2011-09-05', 7, '1315240525'),
('119.63.196.76', '2011-09-05', 1, '1315221637'),
('119.63.196.83', '2011-09-05', 1, '1315227944'),
('202.148.28.82', '2011-09-05', 2, '1315229509'),
('110.136.178.94', '2011-09-05', 6, '1315233212'),
('125.166.215.179', '2011-09-05', 3, '1315232452'),
('119.63.196.105', '2011-09-05', 1, '1315232904'),
('223.255.226.130', '2011-09-05', 1, '1315234705'),
('119.63.196.17', '2011-09-05', 1, '1315237857'),
('118.96.143.4', '2011-09-05', 1, '1315240343'),
('66.249.72.73', '2011-09-06', 18, '1315269902'),
('119.63.196.24', '2011-09-06', 1, '1315242594'),
('115.124.92.129', '2011-09-06', 1, '1315242661'),
('118.96.143.4', '2011-09-06', 4, '1315243695'),
('119.63.196.55', '2011-09-06', 1, '1315247872'),
('119.63.196.12', '2011-09-06', 1, '1315247874'),
('119.63.196.106', '2011-09-06', 1, '1315252487'),
('119.63.196.16', '2011-09-06', 2, '1315277307'),
('119.63.196.20', '2011-09-06', 1, '1315257530'),
('119.63.196.82', '2011-09-06', 1, '1315262285'),
('202.152.194.115', '2011-09-06', 4, '1315267828'),
('119.63.196.80', '2011-09-06', 1, '1315271681'),
('206.53.148.17', '2011-09-06', 1, '1315274735'),
('114.56.227.188', '2011-09-06', 10, '1315275258'),
('110.139.235.114', '2011-09-06', 9, '1315276043'),
('222.124.198.172', '2011-09-06', 30, '1315287306'),
('119.63.196.81', '2011-09-06', 1, '1315277309'),
('110.138.76.140', '2011-09-06', 2, '1315281239'),
('203.130.251.162', '2011-09-06', 1, '1315283540'),
('203.160.128.8', '2011-09-06', 1, '1315283804'),
('118.96.9.123', '2011-09-06', 2, '1315285269'),
('180.76.5.147', '2011-09-06', 1, '1315283925'),
('180.246.183.242', '2011-09-06', 1, '1315284012'),
('202.148.26.83', '2011-09-06', 6, '1315285470'),
('127.0.0.1', '2011-09-06', 3, '1315328371'),
('127.0.0.1', '2011-09-07', 1, '1315328420'),
('127.0.0.1', '2011-09-08', 82, '1315501153'),
('127.0.0.1', '2011-09-09', 77, '1315565973'),
('127.0.0.1', '2011-09-10', 62, '1315673702'),
('127.0.0.1', '2011-09-11', 44, '1315755723'),
('127.0.0.1', '2011-09-12', 5, '1315837617'),
('127.0.0.1', '2011-09-13', 3, '1315930094'),
('127.0.0.1', '2011-09-19', 3, '1316446542'),
('127.0.0.1', '2011-09-20', 7, '1316531254'),
('127.0.0.1', '2011-09-21', 2, '1316621703'),
('127.0.0.1', '2011-09-26', 19, '1317053185'),
('127.0.0.1', '2011-09-28', 1, '1317222726'),
('127.0.0.1', '2011-09-29', 17, '1317303331'),
('127.0.0.1', '2011-10-06', 322, '1317918689'),
('127.0.0.1', '2011-10-07', 9, '1317962576'),
('127.0.0.1', '2011-10-08', 32, '1318070839'),
('127.0.0.1', '2011-10-09', 3, '1318175940'),
('127.0.0.1', '2011-10-10', 11, '1318254886'),
('127.0.0.1', '2011-10-11', 76, '1318352163'),
('127.0.0.1', '2011-10-12', 14, '1318416700'),
('127.0.0.1', '2011-10-13', 62, '1318508737'),
('127.0.0.1', '2011-10-16', 5, '1318783639'),
('127.0.0.1', '2011-10-17', 4, '1318858940'),
('127.0.0.1', '2011-10-18', 59, '1318918418'),
('127.0.0.1', '2011-10-21', 1, '1319205555'),
('127.0.0.1', '2011-10-22', 40, '1319296512'),
('127.0.0.1', '2011-10-23', 26, '1319386443'),
('127.0.0.1', '2011-10-26', 1, '1319565758');

-- --------------------------------------------------------

--
-- Table structure for table `subitem`
--

CREATE TABLE IF NOT EXISTS `subitem` (
  `id_item` int(5) NOT NULL AUTO_INCREMENT,
  `nama_item` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_item` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_sub` int(5) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `subitem`
--

INSERT INTO `subitem` (`id_item`, `nama_item`, `link_item`, `id_sub`) VALUES
(30, 'GELANG', 'gelang.html', 28),
(29, 'KALUNG', 'kalung.html', 28);

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE IF NOT EXISTS `subkategori` (
  `id_subkategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_subkategori` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_subkategori` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_kategori` int(5) NOT NULL,
  PRIMARY KEY (`id_subkategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `nama_subkategori`, `link_subkategori`, `id_kategori`) VALUES
(5, 'Anak-anak', '', 14),
(6, 'Kanak', '', 14),
(7, 'dewasa', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id_sub` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`) VALUES
(26, 'KOLEKSI BAJU', 'kategori-17-koleksi-baju.html', 12),
(25, 'KOLEKSI BAJU', 'kategori-17-koleksi-baju.html', 0),
(23, 'CELANA GAUL', 'kategori-15-celana-gaul.html', 12),
(24, 'RAGAM TOPI', 'kategori-18-ragam-topi.html', 12),
(20, 'LIHAT KERANJANG', 'keranjang-belanja.html', 13),
(21, 'SELESAI BELANJA', 'selesai-belanja.html', 13),
(27, 'JAKET GAYA', 'kategori-16-jaket-gaya.html', 12),
(28, 'ANEKA KAOS', 'kategori-14-aneka-kaos.html', 12),
(29, 'DUNIA FASHION', 'kategoriblog-4-dunia-fashion.html', 18),
(30, 'TIPS & TRIK', 'kategoriblog-2-tips--trik.html', 18),
(31, 'KABAR-KABARI', 'kategoriblog-3-kabarkabari.html', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `tag_seo`, `count`) VALUES
(35, 'Dunia Fashion', 'dunia-fashion', 3),
(36, 'Kabar-Kabari', 'kabarkabari', 0),
(37, 'Tips & Trik', 'tips--trik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`) VALUES
(7, 'Griyagaya Hijau', 'Rizal Faizal', 'templates/hijau', 'N'),
(8, 'Griyagaya Merah', 'Rizal Faizal', 'templates/merah', 'N'),
(9, 'GriyaGaya Ungu', 'Rizal Faizal', 'templates/fancy', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testimoni` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_testimoni`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(1, 'Arshanty', 'shanty@gmail.com', 'cara belanja yang nyaman...dan koleksi2nya berkualitas...', '2008-02-10'),
(2, 'Dea', 'dea@yahoo.com', 'keren2 nih... sukses terus and makin maju ya...', '2009-02-25'),
(3, 'Jonathan', 'wirya@yahoo.com', 'saya senang belanja disini...costumer servicenya memuaskan!!', '2009-11-14'),
(15, 'Armand', 'armando@yahoo.com', 'senang berbelanja di sini....', '2011-05-29'),
(14, 'Vera', 'verawaty@yahoo.com', 'terima kasih...barangnya telah sampai dengan cepat dan selamat...', '2011-05-29'),
(20, 'agnes', 'agnesriyadi@yahoo.com', 'keren brow...', '2011-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('admin', 'feacdbb56a20dfbab94ed05dd16aa8b2', 'Rizal Faizal', '', '', 'admin', 'N', 'fop5ntsp87h1d4j0sjf7j45fv1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
