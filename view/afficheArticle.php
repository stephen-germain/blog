<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="../assets/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
			<div class="post">
				<h3>
					<?= htmlspecialchars($post['title']); ?>
                    le <?= htmlspecialchars($post['date_cont']); ?></br>

                    Auteur : <?= $post['author']; ?>
				</h3>
				
				<p>
					<?= htmlspecialchars($post['content']); ?></br>
                    </br>
				</p>
			</div> 

        <h2>Commentaires:</h2>

            <?php
            var_dump($comment);
            foreach ($comments as $comment) {
            
            ?>
            <div>
                <?= htmlspecialchars($comment['author']);?></br>
                <?= htmlspecialchars($comment['message']);?>
            </div>

            <h3>Ajouter un commentaire:</h3>
                <div>
                    <form action="index.php?page=addComment" method="POST">
                      <p><label for="message">Commentaire</label>
                        <textarea name="message" id="message"></textarea></p>
                        <input type="submit">
                    </form>
                </div>

            <?php
            }
            ?>
		
    </body>
</html>