<div class="content">
    <div style="text-align: center; margin: 1.5rem 0;">
        <h2 class="text-header">แก้ไขข้อมูลส่วนตัว</h2>
    </div>
    <div class="box-profile">
            <form action="../api/ac_profile.php?ac=edit_profile" method="post" id="frm_profile">
                    <div class="mb-3">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" value="<?= $fet_user->email; ?>" class="form-control" placeholder="exmple@exmple.com" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" value="<?= $fet_user->fname; ?>" class="form-control" placeholder="Plase Enter your firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" name="lname" id="lname" value="<?= $fet_user->lname; ?>" class="form-control" placeholder="Plase Enter your lastname" required>
                    </div>
                    <div class="text-end">
                    <a href="index.php?p=change_password" class="text-decoration-none">Forgot Password?</a>

                    </div>
                    <div class="mt-2">
                        <button type="submit" style="text-transform: uppercase;" class="btn-outline-success">Continue</button>
                    </div>
                </form>
    </div>
</div>
<script>
    document.getElementById('frm_profile').addEventListener('submit',(e) => {
        formSubmit(e);
    });
</script>