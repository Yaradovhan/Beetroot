<!doctype html>
<html lang="en">
<head>
    <title>Log IN, sir</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="view/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../view/assets/css/main.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
</head>
<body>

<section id="header">
    <nav id="nav">
        <ul>
            <li><a href="../index.php">Main page</a></li>
        </ul>
    </nav>
</section>

<div id="wrapper">
    <div id="main">
        <section id="five">
            <div class="container">
                <section>
                    <?php if (!isset($_SESSION['is_admin'])): ?>
                    <form action="" method="post">
                        <div class="row uniform">
                            <div class="6u 12u(xsmall)">
                                <input type="text" name="name" placeholder="name">
                            </div>
                            <div class="6u 12u(xsmall)">
                                <input type="text" name="pass" placeholder="pass">
                            </div>
                            <div class="12u">
                                <button class="button special fit">Login</button>
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>
                </section>
            </div>
        </section>
    </div>
</div>
</body>
</html>