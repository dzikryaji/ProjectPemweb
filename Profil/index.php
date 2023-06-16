<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      text-align: center;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #45a049;
    }

    .success-msg {
      margin-top: 20px;
      padding: 10px;
      background-color: #d4edda;
      color: #155724;
      border-radius: 5px;
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
  function saveAccount($name, $email, $phone, $address, $password, $provinsi)
  {
    $conn = connect();

    $sql = "UPDATE accounts SET name='$name', email='$email', phone='$phone', address='$address', password='$password', provinsi='$provinsi' LIMIT 1";
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
    $provinsi = $_POST['provinsi'];

    $result = saveAccount($name, $email, $phone, $address, $password, $provinsi);

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
    <h1>Edit Profile</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <label for="name">Nama:</label>
      <input type="text" id="name" name="name" value="<?php echo $account['name']; ?>" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $account['email']; ?>" required>

      <label for="phone">Nomor Telepon:</label>
      <input type="tel" id="phone" name="phone" value="<?php echo $account['phone']; ?>" required>

      <label for="address">Alamat:</label>
      <input type="text" id="address" name="address" value="<?php echo $account['address']; ?>" required>

      <label for="password">Password:</label>
      <input type="text" id="password" name="password" value="<?php echo $account['password']; ?>" required>

      <label for="provinsi">Provinsi:</label>
      <input type="text" id="provinsi" name="provinsi" value="<?php echo $account['provinsi']; ?>" required>

      <hr><button type="submit" class="btn">Simpan </button>
      
      <a href="profilVani.php" class="btn">Lihat Profil</a>
      

      
    </form>
  </div>
</body>
</html>

