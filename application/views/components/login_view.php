<div class="container d-flex align-items-center mt-5 p-0 mb-5 shadow" style="width: 100%; border-radius: 10px; overflow: hidden;">
    <div class="" style="width: 50%;">
        <img src="https://i.pinimg.com/564x/b0/64/43/b0644316bf9d51dc1bbf9465fdb8397e.jpg" alt="" style="width: 100%;">
    </div>
    <div class="ps-5 pe-5 mb-5" style="width: 50%;">
        <form action="<?php echo site_url('Login/loginauth') ;?>" method="post">
            <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                <h1 class="h1Login">MYSHOP</h1>
                <p class="mb-0 mt-3">Please enter username and password.</p>
                <div class="input-group pt-4 ps-5 pe-5" style="width: 80%;">
                    <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 20px 0px 0px 20px;">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                </div>
                <div class="input-group pt-3 ps-5 pe-5" style="width: 80%;">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-dark btn-sm mt-4 mb-5" style="border-radius: 5px;"><i class="bi bi-arrow-right-circle me-2"></i>Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>