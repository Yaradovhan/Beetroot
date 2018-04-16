<!DOCTYPE html>
<html lang="en">
<head>
    <title>Read Only by HTML5 UP</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="view/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="view/assets/css/main.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
</head>
<body>

<section id="header">
    <header>
        <span class="image avatar"><img src="img/15.jpg" alt=""/></span>
        <h1 id="logo"><a href="#">Willis Corto</a></h1>
    </header>
    <nav id="nav">
        <ul>
            <li><a href="<?= ConfigApp::getAdmin() ?>">Go to admin</a></li>
            <li><a href="index.php">Default sort >></a></li>
            <li><a href="?sort=email">Sort by email >></a></li>
            <li><a href="?sort=name">Sort by name >></a></li>
            <li><a href="?sort=done">Sort by done >></a></li>
            <li><a href="#addTask">Add new task</a></li>
        </ul>
    </nav>
    <footer>
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
            <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </footer>
</section>

<div id="wrapper">

    <!-- Main -->
    <div id="main">

        <!-- One -->
        <section id="one">
            <div class="container">
                <header class="major">
                    <h2>Read Only</h2>
                    <p>Just an incredibly simple responsive site<br/>
                        template freebie by <a href="http://html5up.net">HTML5 UP</a>.</p>
                </header>
                <p>Faucibus sed lobortis aliquam lorem blandit. Lorem eu nunc metus col. Commodo id in arcu ante lorem
                    ipsum sed accumsan erat praesent faucibus commodo ac mi lacus. Adipiscing mi ac commodo. Vis aliquet
                    tortor ultricies non ante erat nunc integer eu ante ornare amet commetus vestibulum blandit integer
                    in curae ac faucibus integer non. Adipiscing cubilia elementum.</p>
            </div>
        </section>

        <!--Two-->
        <section id="three">
            <div class="container">
                <h3>A Few Accomplishments</h3>
                <p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer non.
                    Adipiscing cubilia elementum integer. Integer eu ante ornare amet commetus.</p>
                <?php foreach ($allTask as $item) : ?>
                    <div class="features">
                        <article>
                            <a class="image"><img src="<?= ConfigApp::imgPath() . $item['task']['img'] ?>"
                                                  alt="<?php echo $item['task']['img'] ?>"></a>
                            <div class="inner">
                                <h5>Автор: <?php echo $item['user']['name'] ?> | Дата: <?= $item['task']['date'] ?></h5>
                                <h5>Email: <?php echo $item['user']['email'] ?></h5>
                                <p>Task: <?= nl2br(htmlspecialchars($item['task']['text'])) ?></p>
                                <p>Done: <?= $item['task']['done'] ?></p>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <div class="container">
            <ul class="actions fit">
                <li>
            <?php
            $limit = 3;
            $conn = new ConnectionMySql();
            $sql = "SELECT COUNT(*) FROM tasks";
            $rs_result = mysqli_query($conn->getConnection(), $sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / $limit);
            $pagLink = "<div class='pagination'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                $pagLink .= "<a class='button special small' href='?page=" . $i . $sort . "'>" . $i . "</a> ";
            };
            echo $pagLink . "</div>";
            ?>
                </li>
            </ul>
        </div>

        <!-- Four -->
        <section id="addTask">
            <div class="container">
                <h3>Add Task</h3>
                <form method="post" action="<?= ConfigApp::actionAddTask() ?>" enctype="multipart/form-data">
                    <div class="row uniform">
                        <div class="6u 12u(xsmall)"><input type="text" name="user[name]" required id="name"
                                                           placeholder="Name"/></div>
                        <div class="6u 12u(xsmall)"><input type="email" name="user[email]" required id="email"
                                                           placeholder="Email"/>
                        </div>
                    </div>
                    <div class="row uniform">
                        <div class="12u"><textarea name="task[text]" required id="message" placeholder="Task text"
                                                   rows="6"></textarea></div>
                    </div>
                    <div class="row uniform">
                        <div class="12u">
                            <ul class="actions">
                                <label for="comments">Image *</label>
                                <li><input name="img" required type="file"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row uniform">
                        <div class="12u">
                            <ul class="actions">
                                <li><input type="submit" class="special" value="Add Task"/></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <section id="footer">
        <div class="container">
            <ul class="copyright">
                <li>&copy; Untitled. All rights reserved.</li>
            </ul>
        </div>
    </section>
</div>
</body>
</html>
