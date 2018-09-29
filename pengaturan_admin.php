<?php
	require_once("class/session.class.php");	
  require_once("class/home.class.php");

  extract($home->getID());


//Simpan data
if(isset($_POST['btn-simpan']))
{
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    if($username=="")  {
        $error[] = "Nama Pengguna masih kosong !";    
    }

    else if($nama=="") {
        $error[] = "Nama Lengkap masih kosong !";    
    }
    
    else if($email=="") {
        $error[] = "Email masih kosong";    
    }

    else
    {
      if($home->gantiadmin($username,$nama,$email))

      {
          echo '<script>window.location.replace("pengaturan.php?sukses1")</script>';
      }

    }
}




  $judul = "Beranda";
  include("layouts/header.php");

?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Pengaturan</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
<?php
if(isset($error))
{
    foreach($error as $error)
    {
         ?>
            <div class="alert bg-danger" role="alert">
                <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>  &nbsp; <?php echo $error; ?><a href="#" class="pull-right" data-dismiss="alert"><span class="glyphicon glyphicon-remove"></span></a>
            </div>
         <?php   
    }
}
?>
      <div class="col-lg-12">
        <h1 class="page-header">Pengaturan Aplikasi</h1>
      </div>
    </div><!--/.row-->

   <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Data Administrator Aplikasi <a href="pengaturan.php" class="btn btn-default btn-sm">Kembali</a></div>
          <div class="panel-body">
                        <form role="form" method="post">                            
                            <div class="col-md-8 form-group">
                                <label>Nama Pengguna</label>
                                <input type="input" class="form-control" name="username" onkeypress="return blockSpecialChar(event)" maxlength="64" value="<?=((isset($_POST['btn-simpan']))?$username:$username)?>">
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Nama Lengkap</label>
                                <input type="input" class="form-control" name="nama" maxlength="64" value="<?=((isset($_POST['btn-simpan']))?$nama:$nama)?>">
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Email</label>
                                <input type="input" class="form-control" name="email" onkeypress="return blockSpecialChar(event)" maxlength="64" value="<?=((isset($_POST['btn-simpan']))?$email:$email)?>">
                            </div>
                            <div class="col-md-8 form-group">
                            <button type="submit" class="btn btn-primary" name="btn-simpan">Simpan</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>

          </div>
        </div>
      </div>
    </div><!--/.row-->               

      </div><!--/.col-->
    </div><!--/.row-->
  </div>  <!--/.main-->


<?php 
    include("layouts/footer.php");
?>