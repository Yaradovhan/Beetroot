<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
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

<?php
$host = $_SERVER['HTTP_HOST'];
$request = $_SERVER['REQUEST_URI'];
$actionEdit = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$host" . "/project1/admin/edit.php";
?>

<div id="wrapper">

    <!-- Main -->
    <div id="main">

        <!--Two-->
        <section>
            <div class="container">
                <h3>A Few Accomplishments</h3>
                <?php foreach ($allData as $item) : ?>
                    <form class="message" action="<?php echo $actionEdit; ?>" method="post">
                        <input type="hidden" name="task[id]" value="<?php echo $item['task']['id'] ?>">
                        <div class="features">
                            <article>
                                <a class="image"><img src="<?= ConfigApp::imgPath() . $item['task']['img'] ?>"
                                                      alt="<?php echo $item['task']['img'] ?>"></a>
                                <div class="inner">
                                    <h5>Автор: <?php echo $item['user']['name'] ?> |
                                        Дата: <?= $item['task']['date'] ?></h5>
                                    <h5>Email: <?php echo $item['user']['email'] ?></h5>
                                    <div class="container">
                                        <div class="row uniform">
                                            <div class="6u"><textarea name="task[text]"
                                                                      required
                                                                      id="message"
                                                                      rows="4"><?php echo nl2br(htmlspecialchars($item['task']['text'])); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="select-wrapper">
                                        <select name="task[done]">
                                            <option value="1"<?php if ($item['task']['done'] == '1') {
                                                echo ' selected="selected"';
                                            } ?>>done
                                            </option>
                                            <option value="0"<?php if ($item['task']['done'] == '0') {
                                                echo ' selected="selected"';
                                            } ?>>not done
                                            </option>
                                        </select>
                                    </div>
                                    <button class="button fit small">Edit Task</button>
                                </div>
                            </article>
                        </div>
                    </form>
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
                        $pagLink .= "<a class='button special small'  href='index.php?page=" . $i . "'>" . $i . "</a> ";
                    };
                    echo $pagLink . "</div>";
                    ?>
                </li>
            </ul>
        </div>
    </div>
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