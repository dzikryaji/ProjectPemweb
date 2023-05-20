<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
</head>
<body>
    
    <h1>Sign Up</h1>
    
    <form action="<?= BASEURL ?>/index.php?c=Home&m=signingup" method="post" id="signup">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <div>
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        
        <button>Sign up</button>
    </form>
    
</body>
</html>