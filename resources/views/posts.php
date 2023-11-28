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
    </head>
    <body>
        <header>
            <h1>Posts</h1>
        </header>
        <main>
            <section>
                <?php foreach($posts as $post): ?>
                <article class="post">
                    <h2 class="post__title"><?php echo $post['post_title']; ?></h2>
                    <p class="post__content"><?php echo $post['post_content']; ?></p>
                </article>
                <?php endforeach; ?>
            </section>
        </main>
        <footer>
        </footer>
    </body>
</html>