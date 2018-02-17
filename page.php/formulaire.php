
<?php

$bdd = new PDO ('mysql:host=localhost;dbname=formulaire', 'root', 'Jimanjel7');

if(isset($_POST['forminscription']))
{
    echo "ok";
    if(!empty($_POST['viking name'])AND !empty($_POST['email'])AND !empty($_POST['password'])AND !empty($_POST['password2'])AND!empty($_POST['message'])AND !empty($_POST['birth']))
    {
      $nom =htmlspecialchars($_POST['nom']);
      $prenom =htmlspecialchars($_POST['prenom']);
      $viking name =htmlspecialchars($_POST['viking name']);
      $email =htmlspecialchars($_POST['email']);
      $password = sha1($_POST['password']);
      
      $nomlenght = strlen($nom);
      if($nomlenght <=255)
      {

      }
      else
      {
          $erreur = "votre nom ne doit pas faire plus de 255 caractères";
      }
    }
    else
    {
        $erreur ="Tous les champs doivent être complétés!";
    }
}
?>

<html>

<head>
        <title>VIKINGS</title>
        <link rel="shortcut icon" href="symbole.png" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="styleformulaire.css" />
</head>

<body>
    <table>
        <form action="" method="post">
            
            <tr>
                    <td>
                        <label for="viking name">nom viking :</label>
                    </td>
                    <td>
                        <input type="text" name="viking name" id="viking name" />
                    </td>
                </tr>
            <tr>
                <td>
                    <label for="email">Email :</label>
                </td>
                <td>
                    <input type="email" name="email" id="email" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Mot de passe :</label>
                </td>
                <td>
                    <input type="password"name="password" id="password" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Confirmation du mot de passe :</label>
                </td>
                <td>
                    <input type="password"name="password2" id="password" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="message">Description :</label>
                </td>
                <td>
                    <textarea id="message" name="message"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="datedenaissance">Date de naissance :</label>
                </td>
                <td>
                    <input type="date" name="birth" id="datedenaissance" :>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit"value="sd"  name="forminscription" id="envoyer" />
                </td>
            </tr>
        </form>
        <?php
        if (isset($erreur))
        {
            echo '<font color="red">'.$erreur."</font>";
        }

        ?>
    </table>
    <?php echo date('d/m/Y h:i:s');?>
</body>

</html>