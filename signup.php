<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
       <div class="wrapper">
                <h2 class="logo-txt">STC</h2>
                <form action="api/ac_signup.php" method="post" id="frm_signup">
                    <div class="mb-3">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="exmple@exmple.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Plase Enter your firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Plase Enter your lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Plase Enter your password" required>
                    </div>
                        <p class="text-center">มีบัญชีอยู่แล้วใช่ไหม?<a href="login.php" class="text-decoration-none">เข้าสู่ระบบเลย</a></p>
                    <div class="my-2">
                        <button type="submit" class="btn-outline-success">LOGIN</button>
                    </div>
                </form>
       </div>
    </div>
    <script src="js/function.js"></script>
    <script>
            document.getElementById('frm_signup').addEventListener('submit', (e) => {
            if(formSubmit(e)) {
                window.location.replace('login.php');
            }else{
                console.log('error function not working');
            }
        })
       
    </script>
</body>
</html>