<?php
include 'koneksi.php';
$id_mhs = $_GET['id_mhs'];
$mahasiswa = mysqli_query($koneksi, "select * from mahasiswa where id_mhs='$id_mhs'");
$row = mysqli_fetch_array($mahasiswa);

// membuat data jurusan menjadi dinamis dalam bentuk array
$jurusan = array('TEKNIK INFORMATIKA', 'TEKNIK ELEKTRO','TEKNIK KIMIA');

// membuat function untuk set aktif radio button
function active_radio_button($value,$input){
    
// apabila value dari radio sama dengan yang di input
    $result = $value==$input?'checked':'';
    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Membuat Form Inputan Data</title>
</head>
<body>
    <form method="post" action="update.php">
        <input type="hidden" value= "<?php echo $row['id_mhs'];?>" name="id_mhs">
        <table>
            <tr><td>NIM</td><td><input type="text" value="<?php echo $row['nim'];?>" name="nim"></td></tr>
            <tr><td>NAMA</td><td><input type="text" value="<?php echo $row['nama'];?>" name="nama"></td></tr>
            <tr><td>JENIS KELAMIN</td><td>
                <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin'])?>>Laki laki
                <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin'])?>>Perempuan
            </td></tr>
            <tr><td>JURUSAN</td><td>
                <select name="jurusan">
                <?php
                foreach ($jurusan as $j){
                    echo "<option value='$j' ";
                    echo $row['jurusan']==$j ? 'selected="selected"':'';
                    echo ">$j</option>";
                }
                ?>
                </select>
            </td></tr>
            <tr><td colspans"2"><button type="submit" volue="simpan">SIMPAN PERUBAHAN</button>
                <a href="index.php">KEMBALI</a></tr>
        </table>
    </form>
</body>
</html>