<?php
include 'koneksi.php';
//edit
$data_edit = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun ='".$_GET['id_akun']."'");
$hasil = mysqli_fetch_array($data_edit);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <!-- Favicon-->
        <link rel="icon" type="../image/x-icon" href="../assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <section class="page-section portfolio bg-primary" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">USER</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
      <div class="row justify-content-center">
<form class="row justify-content-center" action="" method="post" enctype="multipart/form-data">
  <table border="0" class="">
  <tr>
    <td>Nama akun</td>
    <td>:</td>
    <td>
<input type="text" name="nama_akun" value="<?php echo $hasil['nama_akun']; ?>" class="form-control">
    </td>
  </tr>
  <tr>
    <td>Username</td>
    <td>:</td>
    <td>
<input type="text" name="username" value="<?php echo $hasil['username']; ?>" class="form-control">
    </td>
  </tr>

    <tr>
      <td>email</td>
      <td>:</td>
      <td>
<input type="text" name="email" value="<?php echo $hasil['email']; ?>" class="form-control">
      </td>
    </tr>
    <tr>
    <td>Password</td>
    <td>:</td>
    <td>
<input type="password" name="password" value="<?php echo $hasil['password']; ?>" class="form-control">
    </td>
  </tr>

</table>
<input type="submit" name="edit" value="save" class="btn btn-light btn-xl">
</form>
<?php
if (isset($_POST['edit'])){
  $update = mysqli_query($koneksi, "UPDATE akun SET nama_akun ='".$_POST['nama_akun']."', username ='".$_POST['username']."', email ='".$_POST['email']."', password ='".$_POST['password']."'
  WHERE id_akun ='".$_GET['id_akun']."'");
if ($update) {
  // code...
  echo '<script>window.location="info-user.php"</script>';
}else {
  echo 'gagal edit';
}}

 ?>
                    </div>
            </div>
        </section>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Admin Laptop Care 2022</small></div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
