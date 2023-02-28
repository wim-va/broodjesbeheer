<?php
?>
<!-- <nav class="head-nav">
    <div class="head-nav__links--links">
        <a class="head-nav__link" href="/">Home</a>
        <a class="head-nav__link" href="broodje.php">Broodjes</a>
        <a class="head-nav__link" href="bestelling.php">Bestelling</a>
        <a class="head-nav__link" href="cursist.php">Administratie</a>
        <?=
        isset($_SESSION["cursistId"]) ?
            '<a class="head-nav__link" href="loguit.php">Log uit</a>' :
            '<a class="head-nav__link" href="index.php">Log in</a><a class="head-nav__link" href="registratie.php">Registreer</a>';
        ?>
    </div>
    <div class="head-nav__links--rechts">
        <a class="head-nav__link" href="users.php">Portfolio extra - User Data</a>
    </div>
</nav> -->
<!-- new header set up -->
<header>
    <nav class="header-nav">
        <div class="header-nav--links">
            <!-- inloggen niet nodig -->
            <a class="header-nav__link header-nav--links__link" href="index.php">Home</a>
            <a class="header-nav__link header-nav--links__link" href="broodje.php">Broodjes</a>
            <a class="header-nav__link header-nav--links__link" href="bestelling.php">Bestelling</a>
            <!-- mits ingelogged -->
            <?php
            if (isset($_SESSION["cursistId"])) {
                echo '<a class="header-nav__link header-nav--links__link" href="cursist.php">Administratie</a><a class="header-nav__link header-nav--links__link" href="loguit.php">Log uit</a>';
            } else {
                echo '<a class="header-nav__link header-nav--links__link" href="registratie.php">Registratie</a><a class="header-nav__link header-nav--links__link" href="index.php">Log in</a>';
            } ?>
        </div>
        <div class="header-nav--rechts">
            <a class="header-nav__link header-nav--rechts__link" href="users.php">Portfolio extra - User Data</a>
        </div>
    </nav>
</header>