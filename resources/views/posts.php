<!doctype html>
<html>
    <head>
        <title>Posts</title>
        <style>
            .post {
                border:1px solid #000;
                margin:16px;
            }
            .post__title {
                margin:8px;
            }
            .post__content {
                margin:8px;
            }
        </style>
         <style>
            nav ul {
                display: flex;
                list-style:none;
            }
            nav ul li {
                display: inline-block;
                background-color: green;
                padding:8px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Posts</h1>
            <?php include dirname(__FILE__) . '/components/header_menu.php'; ?>
        </header>
        <main>
            <section>
                <?php foreach($posts as $post): ?>
                <article class="post post__<?php echo $post->getId(); ?>">
                    <h2 class="post__title"><?php echo $post->getTitle(); ?></h2>
                    <p class="post__content"><?php echo $post->getContent(); ?></p>
                </article>
                <?php endforeach; ?>
            </section>
        </main>
        <footer>
        </footer>
    </body>
</html>
