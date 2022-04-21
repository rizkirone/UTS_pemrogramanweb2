<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Simpan Data</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Wilayah : </td>
		<td><select name="wilayah" id="">
                        <option value="Jakarta">DKI Jakarta</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Banten">Banten</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                    </select></td>      
            </tr>
            <tr>
                <td>Jumlah Positif : </td>
                <td><input type="text" name="positif"></td>
            </tr>
            <tr>
                <td>Jumlah Dirawat : </td>
                <td><input type="text" name="rawat"></td>
            </tr>
            <tr>
                <td>Jumlah Sembuh : </td>
                <td><input type="text" name="sembuh"></td>
            </tr>
            <tr>
                <td>Jumlah Meninggal : </td>
                <td><input type="text" name="die"></td>
            </tr>
            <tr>
                <td>Nama Operator : </td>
                <td><input type="text" name="operator"></td>
            </tr>
            <tr>
                <td>NIM Mahasiswa : </td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td><button type="submit" name="OK">Simpan</button></td>
            </tr>
    </form>

    <?php
    if (isset($_POST['OK'])) {
        if (empty($_POST['wilayah'])) {
            print "Lengkapi form";
        } else {
            //Mendapatkan value dari data diatas
            $wil = $_POST['wilayah'];
            $pos = $_POST['positif'];
            $rawat = $_POST['rawat'];
            $sembuh = $_POST['sembuh'];
            $die = $_POST['die'];
            $op = $_POST['operator'];
            $nim = $_POST['nim'];

            //membuat waktu
            $tanggal = date('d-m-Y  h:i:s a');

            //membuat dan membuka file uts.txt
            $buka = fopen("uts.txt", 'a');
            echo "<script>window.location='uts.txt'</script>";

            //menulis data yang telah dimasukkan
            fwrite($buka, "Data Pemantaun Covid19 Wilayah ${wil} ");
            fwrite($buka, "Per ${tanggal} ");
            fwrite($buka, "${op} / ${nim} ");
            fwrite($buka, "| Positif   : ${pos}| ");
        fwrite($buka, " | Dirawat   : ${rawat} |");
        fwrite($buka, " | Sembuh    :${sembuh} |");
        fwrite($buka, " | Meninggal : ${die} |");
        fwrite($buka, "");
	

            //menutup file 
            fclose($buka);

            //memunculkan kata
            print "data berhasil disimpan";
        }
    } ?>
</body>

</html>
