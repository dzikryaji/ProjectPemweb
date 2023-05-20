<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<h1>Home</h1>
    
    <p>Hello <?= $data['user']['name'] ?></p>
    
    <p><a href="<?= BASEURL?>/index.php?c=Home&m=logout">Log out</a></p>
</body>
</html>