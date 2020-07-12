<?php
require_once 'packages.php';
global $login;
?>
<div id="login_register" class="login_register">
    <ul>
    <?php if ($login->isLogged()) { ?>
        <li id="l"><font color="#FFFFFF">HI <?php echo $login->user->getName(); ?></font></li>
        <li id="r"><a href="" >My Account</a>
            <ul>
                <li style="width:72px"><a href="profile.php">Profile</a></li>
                <li><a href="subscriptions.php">Subscription</a></li>
                <li style="width:72px"><a href="logout.php">Log out</a></li>
            </ul>
        </li>
    <?php } else { ?>
        <li id="l"><a href="login.php">Login</a></li>
        <li id="r"><a href="register.php">Register</a></li>
    <?php } ?>
    </ul>
</div>