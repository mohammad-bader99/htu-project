<div class="container w-50 border border-primary" style="margin-top:8rem;">
    <form action="/save-user" method="POST" enctype="multipart/form-data">
        <div class="input-group my-4">
            <span class="input-group-text">Username</span>
            <input type="text" aria-label="username" class="form-control" name="username" required>
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Display Name</span>
            <input type="text" aria-label="displayname" class="form-control" name="display_name" required>
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Email</span>
            <input type="text" aria-label="email" class="form-control" name="email" required>
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Password</span>
            <input type="text" aria-label="password" class="form-control" name="password" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Permission</label>
            <select class="form-select" id="inputGroupSelect01" name="permission" required>
                <option value="seller">Seller</option>
                <option value="procurement">Procurement</option>
                <option value="accountant">Accountant</option>
            </select>
        </div>
        <div class="input-group my-4">
                <input type="file" name="file" id="file">
        </div>
        <div class="input-group my-4">
            <button class="btn btn-primary m-auto" style="width: -webkit-fill-available;">Create User</button>
        </div>
    </form>
</div>