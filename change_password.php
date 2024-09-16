<div class="content">
    <div style="text-align: center; margin: 1.5rem 0;">
        <h2 class="text-header">แก้ไขรหัสผ่าน</h2>
    </div>
    <div class="box-profile">
            <form action="api/ac_profile.php?ac=change_password" method="post" id="frm_changePassword">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input type="text" name="current_password" id="current_password"  class="form-control" placeholder="Please Enter Your Current Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password">New Password</label>
                        <div class="error">
                            <span id="alert_01"></span>
                        </div>
                        <input type="text" name="new_password" id="new_password"  class="form-control" placeholder="Plase Enter Your New Password" required>
                    </div>
                    <div class="mb-3">
                    <div class="error">
                            <span id="alert_02"></span>
                        </div>
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="text" name="confirm_password" id="confirm_password"  class="form-control" placeholder="Plase Confirm Your New Password" required>
                    </div>
                    <div class="mt-2">
                        <button type="submit" style="text-transform: uppercase;" class="btn-outline-success">Continue</button>
                    </div>
                </form>
    </div>
</div>
<script>
    document.getElementById('frm_changePassword').addEventListener('submit',(e) => {
        const new_pass = document.getElementById("new_password").value;
        const confirm_pass = document.getElementById("confirm_password").value;
        if(new_pass !== confirm_pass) {
            e.preventDefault();
            document.getElementById('alert_01').innerHTML = "รหัสผ่านไม่ตรงกัน";
            document.getElementById('alert_02').innerHTML = "รหัสผ่านไม่ตรงกัน";
        }else{
            formSubmit(e);
        }
        });
</script>