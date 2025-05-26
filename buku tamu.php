<!DOCTYPE html>
<html>
    <head>
        <title>Buku Tamu</title>
    </head>
    <body>
        <h2>Buku Tamu</h2>
        <form method="post">
            Nama: <input type="text" name="nama" required><br><br>
            Pesan: <br>
            <textarea name="pesan" rows="5" cols="30 required></textarea><br><br>
            <input type="submit value="kirim">
            <button type="submit">Kirim</button>
        </form>

        <?php
        $file = "bukutamu.txt";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama =htmlspecialchars($_POST["nama"]);
            $nama =htmlspecialchars($_POST["pesan"]);

             $data = "Nama: $nama\npesan: $pesan\n---\n";

             if (file_put_contents($file, $data, FILE_APPEND)) {
             //simpan ke file
             echo "<p>pesan berhasil di kirim!</p>";
            } else {
                echo "<p style='color:red;'>Gagal menyimpan pesan. periksa izin file.</p>";
            }
        }
        //Tampilan isi buku tamu
        if (file_exists($file)) {
            echo "<h3>Daftar Pesan:</h3>";
            echo "<pre>" . file_get_contents($file) . "</pre>";
            echo "<p>belum ada pesan masuk. </p>";
           
        } else {
        }
        ?>
        
    </form>
    </body>
    </html>
    