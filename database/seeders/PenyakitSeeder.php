<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penyakit::create([
            'kode' => 'P1',
            'nama' => 'Polyp',
            'pengobatan' => '<p><strong>Segera konsultasi dengan dokter apakah diperlukan operasi pengangkatan polip.</strong></p>',
            'pengobatan' => '<p><strong>Polip rahim adalah&nbsp;polip yang tumbuh dan menempel pada dinding dalam rahim dan bisa meluas hingga ke rongga rahim. Polip uteri/rahim biasanya bersifat jinak (bukan kanker), tetapi beberapa dari polip ini dapat menjadi ganas (kanker). Tidak ada cara untuk melakukan pencegahan terjadinya polip endometrium. Namun, bagi wanita yang sudah pernah berhubungan seksual, sangat dianjurkan untuk melakukan pengecekan ginekologi secara rutin.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P2',
            'nama' => 'Adenomyosis',
            'pengobatan' => '<p><strong>Segera konsultasi dengan dokter apakah diperlukan: pemberian obat pereda nyeri oleh dokter, terapi hormon ataupun pemeriksaan lebih lanjut.</strong></p>',
            'pengobatan' => '<p><strong>Adenomiosis adalah kondisi yang terjadi ketika lapisan permukaan rongga rahim atau endometrium tumbuh di dalam dinding otot rahim. Dalam kondisi normal, seharusnya jaringan endometrium hanya melapisi permukaan rongga rahim dapat dilakukan pencegahan dengan menerapkan pola makan sehat, bergizi lengkap, dan seimbang, menjaga berat badan agar ideal, menjalani pemeriksaan kesehatan dan kandungan secara rutin.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P3',
            'nama' => 'Leimyoma',
            'pengobatan' => '<p><strong>Pemberian anti-nyeri berupa parasetamol atau pemeriksaan lebih lanjut yang akan dilakukan oleh dokter spesialis <em>obgyn</em> seperti <em>Ultrasonografi, Histeroskopi</em>. <em>Magnetic Resonance Imaging</em> atau MRI.</strong></p>',
            'pengobatan' => '<p><strong>Leiomyoma, atau mioma uteri adalah&nbsp;kondisi medis berupa tumbuhnya jaringan tidak normal atau tumor di bagian dalam maupun luar rahim dapat dilakukan pencegahan dengan melakukan olahraga dan aktivitas fisik secara rutin dan teratur, menggunakan alat kontrasepsi hormonal di bawah pengawasan dokter, menghindari kebiasaan merokok dan minum minuman beralkohol, menjaga berat badan tetap ideal, menjalani pola hidup sehat</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P4',
            'nama' => 'Malignancy and hiperlasia',
            'pengobatan' => '<p><strong>Hiperplasia endometrium atau disebut juga lesi pra-kanker endometrium merupakan pertumbuhan abnormal berlebihan dari kelenjar endometrium dimana rasio kelenjar stroma lebih besar dibanding endometrium. Pertumbuhan kelenjar tersebut bervariasi dari ukuran maupun bentuk dan dapat berupa hiperplasia atipik yang berkembang menjadi atau timbul bersamaan dengan malignancy/keganasan endometrium</strong></p>',
            'pengobatan' => '<p><strong>Hiperplasia endometrium atau disebut juga lesi pra-kanker endometrium merupakan pertumbuhan abnormal berlebihan dari kelenjar endometrium dimana rasio kelenjar stroma lebih besar dibanding endometrium. Pertumbuhan kelenjar tersebut bervariasi dari ukuran maupun bentuk dan dapat berupa hiperplasia atipik yang berkembang menjadi atau timbul bersamaan dengan malignancy/keganasan endometrium dapat dilakukan pencegahan dengan&nbsp;apabila setelah mengalami menopause mengonsumsi estrogen maka perlu juga mengonsumsi progestin atau progesterone, jika menstruasi tidak teratur, penggunaan pil KB direkomendasikan dan sudah melakukan konsultasi dengan dokter. menurunkan berat badan agar tidak obesitas dan terhindar dari Malignancy and Hiperlasia</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P5',
            'nama' => 'Coagulopathy',
            'pengobatan' => '<p><strong>Konsultasi dengan dokter apabila diperlukan pemberian terapi</strong></p>',
            'pengobatan' => '<p><strong>Coagulopathy atau koagulopati merupakan gangguan pada proses pembekuan darah, sehingga darah tersebut sulit berhenti yang terjadi ketika kemampuan darah untuk menggumpal (membentuk gumpalan/trombus) mengalami gangguan. Coagulopathy menyebabkan kecenderungan untuk terjadinya pendarahan yang berlebihan ataupun berkepanjangan dapat dilakukan pencegahan dengan menjaga tubuh tetap terhidrasi dengan minum air putih yang cukup, hindari mengonsumsi aspirin karena bisa memperparah perdarahan, makan-makanan sehat yang kaya akan zat besi dan berolahragalah secara rutin.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P6',
            'nama' => 'Ovulatory Disfunction',
            'pengobatan' => '<p><strong>Pemeriksaan serial tes darah untuk mengecek kadar hormone dan USG yang dilakukan oleh dokter kandungan.</strong></p>',
            'pengobatan' => '<p><strong>Ovulatory disfunction (disfungsi ovulasi) merupakan kondisi ketika terjadi ovulasi (pematangan dan pengeluaran sel telur) yang tidak normal, tidak teratur atau tidak ada sama sekali dan kondisi ini terjadi sebelum usia 40 tahun.dapat dilakukan pencegahan dengan memperbaiki gaya hidup dengan istirahat cukup dan makan makanan sehat dan bergizi.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P7',
            'nama' => 'Endometrial',
            'pengobatan' => '<p><strong>Melakukan pemeriksaan ke dokter kandungan untuk melakukan pengobatan endometrial adalah dengan pemberian obat untuk meredakan nyeri, seperti terapi hormon untuk menghambat pertumbuhan jaringan ataupun operasi untuk mengatasi endometrial yang tidak membaik dengan metode pengobatan lain.</strong></p>',
            'pengobatan' => '<p><strong>Endometriosis adalah&nbsp;gangguan kesehatan yang terjadi karena adanya pertumbuhan jaringan tidak normal dari endometrium pada bagian luar dinding rahim. Pertumbuhan jaringan endometrium yang tidak normal ini dapat terjadi pada ovarium, vagina, saluran kemih, hingga usus dapat dilakukan dengan pencegahan berolahraga secara rutin, menjaga berat badan tetap ideal, mengurangi konsumsi minuman berkafein atau beralkohol.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P8',
            'nama' => 'Amonorea',
            'pengobatan' => '<p><strong>Konsultasi dengan dokter spesialis genetik, pada wanita yang mengalami kondisi tidak haid yang diakibatkan karena faktor keturunan, konsultasi dengan dokter kandungan apabila diperlukan operasi, terapi hormon atau keduanya ataupun pemberian obat.</strong></p>',
            'pengobatan' => '<p><strong>Amenorea adalah suatu&nbsp;keadaan atau kondisi dimana pada seorang wanita tidak mengalami menstruasi pada masa menstruasi sebagaimana mestinya&nbsp;atau secara sederhana disebut dengan tidak haid pada suatu periode atau masa menstruasi.dapat dilakukan pencegahan dengan melakukan perubahan pola hidup sehat, cukup beristirahat, hindari stres yang berkepanjangan, serta catat dan perhatikan siklus menstruasi dengan seksama.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P9',
            'nama' => 'Dismenorea',
            'pengobatan' => '<p><strong>Pemberian obat anti-nyeri golongan OAINS (obat anti inflamasi non-steroid). Contohnya, diklofenak, ibuprofen, ketoprofen, asam mefenamat, dan lain-lain, apabila sakit berlanjut lakukan konsultasi dengan dokter apabila diperlukan terapi hormonal, misalnya dengan kontrasepsi hormonal (contoh, pil KB)</strong></p>',
            'pengobatan' => '<p><strong>Dismenore atau nyeri haid merupakan salah satu keluhan yang dapat dialami wanita saat menstruasi. Dismenore adalah nyeri perut bawah saat menstruasi yang biasanya didampingi oleh gejala lainnya seperti berkeringat, sakit kepala, diare, dan muntah dapat dilakukan pencegahan dengan cara perlu berolahraga secara teratur untuk mengurangi nyeri menstruas dan untuk membantu mencegah keram perut.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P10',
            'nama' => 'Menorrahagia',
            'pengobatan' => '<p>Melakukan konsultasi dengan dokter apabila diperlukan pemberian obat-obatan oleh dokter kandungan ataupun operasi.</p>',
            'pengobatan' => '<p>Menorrhagia atau perdarahan uterus berat bila perdarahan menstruasinya lebih dari 80ml. Metrorrhagia adalah perdarahan diantara periode menstruasi. Menorrhagia adalah istilah medis untuk haid dengan pendarahan yang lebih dari normal atau lebih panjang dari normal.. Menorrhagia dapat disebabkan oleh beragam kondisi sehingga sulit dicegah. Cara terbaik yang dapat dilakukan adalah menjalani pemeriksaan ke dokter secara rutin jika terdapat faktor yang meningkatkan risiko terkena menorrhagia</p>'
        ]);

        Penyakit::create([
            'kode' => 'P11',
            'nama' => 'Oligonomorea',
            'pengobatan' => '<p><strong>Berkonsultasi ke dokter segera jika mengalami gangguan siklus menstruasi dikarenakan pengobatan oligomenorea tergantung pada penyebab yang mendasarinya dan kondisi kesehatan pasien secara keseluruhan. Jika oligomenorea terjadi akibat pola hidup tidak sehat, dokter akan menganjurkan pasien untuk melakukan perubahan pola hidup yang lebij baik, selain menjalani pola hidup sehat, seorang yang terdiagnosa memiliki penyakit Oligonomorea akan dianjurkan untuk menjalani terapi hormon. Terapi hormon bertujuan untuk mengatur siklus menstruasi pasien agar lebih teratur.</strong></p>',
            'pengobatan' => '<p><strong>Oligomenorea merupakan kelainan siklus menstruasi yang siklusnya lebih panjang yaitu lebih dari 35 hari dan perdarahannya biasanya sedikit. Kelainan ini biasanya terjadi karena adanya kelainan hormonal, gangguan gizi, dan gangguan kejiwaan seperti stress dapat dilakukan pencegahan dengan membatasi makanan tinggi gula untuk menurunkan dan mencegah peningkatan kadar gula darah, menjaga berat badan ideal dengan mengonsumsi makanan yang sehat dan bergizi seimbang, serta rutin berolahraga.</strong></p>'
        ]);

        Penyakit::create([
            'kode' => 'P12',
            'nama' => 'Premenstrual Dysphoric Disorder',
            'pengobatan' => '<p><strong>Pemberian obat Pemberian obat pereda nyeri, seperti ibuprofen dan naproxen seperti kram perut, nyeri otot, dan pembengkakan payudara dan melakukan konsultasi dengan dokter kandungan apabila diperlukan pemberian Pil KB, untuk menghentikan proses ovulasi agar kadar hormon tidak naik-turun kandungan apabila diperlukan pemberian Pil KB, untuk menghentikan proses ovulasi agar kadar hormon tidak naik-turun</strong></p>',
            'pengobatan' => '<p><strong>Premenstrual Dysphoric Disorder (PMDD) gangguan disforik pramenstruasi adalah gangguan mood yang disebabkan oleh hormon yang dapat terjadi berulang. Sama seperti PMS, PMDD terjadi selama masa pramenstruasi dan umumnya berlangsung hingga saat menstruasi dimulai. PMDD tidak seumum PMS, kondisi ini hanya menyerang kurang lebih 5-10% wanita usia reproduksi. Pada wanita yang mengalami PMDD, gejalanya akan lebih parah dari PMSdapat dilakukan pencegahan dengan beristirahat dan tidur yang cukup, mengelola stres dan melakukan teknik relaksasi, berolahraga rutin, terutama olahraga peregangan seperti yoga.</strong></p>'
        ]);
    }
}
