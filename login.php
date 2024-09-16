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
                <form action="api/ac_login.php" method="post" id="frm_login">
                    <div class="mb-3">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="exmple@exmple.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                        <p class="text-center">ยังไม่มีบัญชีใช่ไหม<a href="signup.php" class="text-decoration-none">สมัครสมาชิกเลย</a></p>
                    <div class="my-2">
                        <button type="submit" class="btn-outline-success">LOGIN</button>
                    </div>
                </form>
       </div>
    </div>
    <script src="js/function.js"></script>
    <script>
        document.getElementById('frm_login').addEventListener('submit', (e) => {
            formSubmit(e)
        })
    </script>
</body>
</html>