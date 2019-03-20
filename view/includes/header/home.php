<div class="header bg-dark">
    <a href="#" class="header-brand">Inventaris</a>
    <ul class="header-nav">
        <li class="header-item">
            <a class="header-link" href="?page=logout">
                Logout
            </a>
        </li>
        <li class="header-item">
            <a class="header-link" href="javascript:void(0)" id="dropbtn1">
                Hi, <?=ucfirst($_SESSION['nama']); ?>
            </a>
            <div class="dropmenu" id="account">
                <ul class="drop">
                    <li class="drop-item">
                        <a class="drop-link" href="">Setting</a>
                    </li>
                    <li class="drop-item">
                        <a class="drop-link" href="">Test</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>