<div class="box bg-dark">
    <h2 class="text-white text-center">Login</h2>
    <form method="post">
        <label for="username" class="text-white">Username</label>
        <input type="text" name="username" id="username" class="form-control">
        <label for="password" class="text-white">Password</label>
        <input type="text" name="password" id="password" class="form-control">
        <button class="btn btn-secondary mt-3" name="submit">Login</button>
        <a href="http://<?php echo $_SERVER['SERVER_NAME']."/Inventaris?page=register"; ?>" class="btn btn-secondary mt-3">Register</a>
    </form>
</div>
