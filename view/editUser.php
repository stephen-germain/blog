<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>S'inscrire</h1>

        <p> <a href="index.php?page=home">Retour</a></p>

		<form method="post" action="index.php?page=updateUser">

			<label for="pseudo">Pseudo : </label>
			<input type="text" name="pseudo" value="<?=$user['pseudo'] ?>"/>
			
			<label for="password">Password : </label>
			<input type="text" name="password" value="<?=$user['password'] ?>"/>
			
			<input type="submit"/>
		
		</form>

		
    </body>
</html>