<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Profil Project Pemweb</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

    </style>
</head>
<body>
    
<?php
  // Fungsi untuk menghubungkan ke basis data MySQL
  function connect()
  {
    $host = 'localhost';
    $username = 'root';
    $database = 'accounts';

    $conn = new mysqli($host, $username, '', $database);
    if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
  }

  // Fungsi untuk mendapatkan data akun dari basis data
  function getAccount()
  {
    $conn = connect();

    $sql = 'SELECT * FROM accounts LIMIT 1';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $account = $result->fetch_assoc();
    } else {
      $account = array();
    }

    $conn->close();

    return $account;
  }

  // Fungsi untuk menyimpan data akun ke basis data
  function saveAccount($name, $email, $phone, $address, $password)
  {
    $conn = connect();

    $sql = "UPDATE accounts SET name='$name', email='$email', phone='$phone', address='$address', password='$password' LIMIT 1";
    $result = $conn->query($sql);

    $conn->close();

    return $result;
  }

  // Menghandle pengiriman form
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $result = saveAccount($name, $email, $phone, $address, $password);

    if ($result) {
      echo '<div class="success-msg">Data account berhasil diperbarui.</div>';
    } else {
      echo 'Gagal menyimpan data account.';
    }
  }

  // Mendapatkan data akun
  $account = getAccount();
  ?>

<div class="container">
<div class="main-body">

<nav aria-label="breadcrumb" class="main-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">< Back</a></li>
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
<li class="breadcrumb-item active" aria-current="page">User Profile</li>
</ol>
</nav>

<div class="row gutters-sm">
<div class="col-md-4 mb-3">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">
<img src="https://cdn.icon-icons.com/icons2/2643/PNG/512/female_woman_person_people_avatar_icon_159366.png" alt="Admin" class="rounded-circle" width="150">
<div class="mt-3">
<span><?php echo $account['name']; ?></span>
<p class="text-secondary mb-1">Vegetarian</p>
<span><?php echo $account['address']; ?></span>
<p><span><?php echo $account['provinsi']; ?></span></p>
<button class="btn btn-primary">Follow</button>
<button class="btn btn-outline-primary">Message</button>
</div>
</div>
</div>
</div>
<div class="card mt-3">
<ul class="list-group list-group-flush">
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<img src="https://blue.kumparan.com/image/upload/v1634025439/01ggbphqep9hcjr829g4r5e6et.png" width="100" height="35" alt="ShopeePay" >    
<span class="text-secondary">+994123456789</span>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
<span class="text-secondary">@VaniAz</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
<span class="text-secondary">VaniAzralina</span>
</li>
</ul>
<button><a href="index.php" class="btn">Edit Akun</a></button>
</div>
</div>

<div class="col-md-8">



<div class="card mb-3">
<div class="card-body">
<div class="row">
<div class="col-sm-3">
</div>
</div>
</div>
<div class="container">
    <h1>My Account</h1>

    <div class="info">
      <label>Nama:</label>
      <span><?php echo $account['name']; ?></span>
    </div>

    <div class="info">
      <label>Email:</label>
      <span><?php echo $account['email']; ?></span>
    </div>

    <div class="info">
      <label>Nomor Telepon:</label>
      <span><?php echo $account['phone']; ?></span>
    </div>

    <div class="info">
      <label>Alamat:</label>
      <p><span><?php echo $account['address']; ?></span></p>
    </div>
  </div>
<hr> 
<div class="row">
<div class="col-sm-12">

<div class="col-sm-50 mb-25">
<div class="card h-100">
<div class="card-body">

<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Favorite Food</i></h6>
<small>Chia Seeds</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Green Apple</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 85%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Tomato</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Limo</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Carrot</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>

</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>





<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>