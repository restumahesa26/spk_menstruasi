<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artikel::create([
            'judul' => 'Pentingnya Menjaga Kesehatan Reproduksi Saat Mentruasi',
            'gambar' => 'Gambar 1.jpg',
            'konten' => '<p><strong>Pentingnya Menjaga Kesehatan Reproduksi Saat Mentruasi</strong></p>

            <p>Kesehatan reproduksi adalah kondisi sehat secara psikis,sosial, dan fisik, yang berhubungan dengan fungsi, proses, dan sistem reproduksi, baik pada pria maupun wanita untuk bisa bertanggung jawab dalam memelihara dan menjaga organ reproduksi. Khususnya bagi yang mengalami masa menstruasi, tentu penting sekali menjaga kesehatan reproduksi saat menstruasi. Mengingat saat menstruasi, organ intim rentan sekali terpapar oleh bakteri.</p>

            <p>Apa Itu Menstruasi?<br />
            Menstruasi adalah tanda pubertas yang terjadi pada wanita. Proses menstruasi merupakan proses peluruhan lapisan bagian dalam pada dinding rahim wanita (endometrium) yang mengandung banyak pembuluh darah dan umumnya berlangsung selama 5-7 hari setiap bulannya. Biasanya siklus menstruasi berlangsung hingga usia 50 tahun. Adapun masa pasca berhenti menstruasi dinamakan sebagai menopause.</p>

            <p>Pada beberapa wanita, ada yang merasakan nyeri haid atau kram, yang juga disebut sebagai dismenore.Untuk menekan rasa sakit, cukup dilakukan kompres hangat, olahraga teratur, dan istirahat yang cukup. Apabila nyeri haid yang dirasakan sampai mengganggu aktivitas sehari-hari, bisa diberikan obat anti peradangan yang bersifat non steroid atau berkonsultasi langsung dengan tenaga kesehatan.</p>

            <p>Saat menstruasi, minumlah 1 tablet penambah darah (tablet Fe) selama menstruasi setiap hari dan sekali seminggu ketika tidak menstruasi. Hal ini bertujuan untuk mencegah timbulnya anemia akibat kurangnya zat besi (Fe).</p>

            <p>Sementara itu, tingkat kalium yang rendah dalam tubuh dapat mengakibatkan siklus haid tidak teratur, timbulnya gangguan menstruasi yang sangat menyakitkan, baik menjelang siklus maupun selama siklus menstruasi. Oleh karena itu, dianjurkan untuk mengonsumsi sejumlah makanan yang tinggi kalium, seperti ubi jalar,pisang, salmon, kismis, kacang, dan yoghurt. Proses makanan yang dikukus atau dipanggang juga bisa menambah asupan kalium dalam tubuh.</p>

            <p>Selain itu, kebersihan organ intim saat menstruasi juga penting dilakukan dengan:</p>

            <p>Mengganti pembalut sebanyak 3-5 kali dalam sehari.<br />
            Membersihkan organ intim terlebih dulu sebelum mengganti pembalut.<br />
            Cuci tangan sampai bersih usai membuang pembalut serta sebelum mengganti pembalut.<br />
            Rutin mengganti celana dalam untuk menghindari resiko tidak nyaman di area kewanitaan. Pastikan memakai celana dalam yang terbuat dari bahan yang menyerap keringat.</p>'
        ]);

        Artikel::create([
            'judul' => 'Siklus Menstruasi Wanita (Women Cycle)',
            'gambar' => 'Gambar 2.jpg',
            'konten' => '<p>Siklus menstruasi wanita (women cycle) terbagi menjadi beberapa fase, yaitu fase menstruasi, fase folikuler, fase ovulasi, dan fase luteal. Siklus menstruasi wanita (women cycle) dipengaruhi oleh beberapa hormon penting dalam tubuh.</p>

            <p>Siklus Menstruasi Wanita</p>

            <p>Menstruasi adalah hal umum yang dialami oleh semua wanita. Menstruasi merupakan siklus normal bulanan pada wanita yang ditandai dengan keluarnya darah dari vagina. Selama siklus menstruasi wanita (women cycle), tubuh sedang mempersiapkan kehamilan saat terjadi pembuahan. Jika selama siklus ini tidak terjadi pembuahan, maka lapisan dinding rahim akan mengalami peluruhan dan keluar bersama dengan darah dari vagina.</p>

            <p>Umumnya, siklus menstruasi normal pada wanita rata-rata terjadi setiap 28 hari. Namun, setiap wanita dapat memiliki siklus menstruasi yang berbeda-beda. Kebanyakan, wanita akan mengalami menstruasi pertama mereka antara usia 12-14 tahun. Tetapi, beberapa orang bisa mengalami menstruasi lebih awal atau lebih lambat dari itu. Tidak dapat diketahui pasti kapan menstruasi terjadi, namun Anda akan merasakan gejala menstruasi beberapa hari sebelum terjadi.</p>

            <p>Wanita akan berhenti mengalami menstruasi saat memasuki masa menopause. Masa menopause wanita biasanya antara usia 45-55 tahun. Jika hingga usia 16 tahun Anda tidak mengalami menstruasi. Ada baiknya mengunjungi dokter untuk berkonsultasi tentang kondisi Anda untuk mencari tahu apakah terdapat masalah pada sistem reproduksi Anda.</p>'
        ]);
    }
}
