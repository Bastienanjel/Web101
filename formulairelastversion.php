<!DOCTYPEhtml>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=viking', 'root', 'Jimanjel7');

if(isset($_POST['forminscription']))
{
    $nomviking= htmlspecialchars($_POST['nomviking']);
    $email= htmlspecialchars($_POST['email']);
    $password= sha1($_POST['password']);
    $password2= sha1($_POST['password2']);
    $birth= htmlspecialchars($_POST['birth']);
    if(!empty($_POST['nomviking']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['birth']))
    {
       
       
       $nomvikinglenght = strlen($nomviking);
       if($nomvikinglenght <= 255)
       {
            
            $reqemail=$bdd->prepare("SELECT * FROM  formulaire WHERE email = ?");
            $reqemail-> execute(array($email));
            $emailexist=$reqemail->rowCount();
            if($emailexist==0)
        {
            
             if($password == $password2)
             {
                  $insertmbr = $bdd->prepare("INSERT INTO formulaire(nomviking, email, motdepasse, birth) VALUES(?,?,?,?)");
                  $insertmbr->execute(array($nomviking,$email,$password,$birth));
                  $erreur = "Félicitation! Vous faites désormais partie de la communauté des vikings.";
            }
             else
             {
                 $erreur = "Vos mots de passe ne correspondent pas !";
             }
        }
    
      else
      {
        $erreur = "Vous possédez déjà un compte avec cette adresse mail ! ";
      }
    }
       else
       {
           $erreur= "Votre nom ne doit pas dépasser 255 caractères !";
       }
        
    }
    else
    {
       $erreur  ="Tous les champs doivent être remplis !";
    }
}

?>
<html>


<head>
        <title>VIKINGS</title>
        <link rel="shortcut icon" href="symbole.png" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="styleforme.css"/>
</head>

<body>
<a href="choisitonnom.html"><strong class="chose">choisis ton nom</strong></a>
    <table>
        
        <form action="" method="post">
            
            <tr>
                    <td>
                        <label for="viking name">Nom viking :</label>
                    </td>
                    <td>
                        <input type="text" id="viking name"name="nomviking" value="<?php if (isset($nomviking)) {echo $nomviking; } ?>" />
                    </td>
                </tr>
            <tr>
                <td>
                    <label for="email">Email :</label>
                </td>
                <td>
                    <input type="email" id="email" name="email" value="<?php if (isset($email)) {echo $email; } ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Mot de passe :</label>
                </td>
                <td>
                    <input type="password" id="password" name="password"/>
                </td>
            </tr>
            <td>
                <label for="password2">Confirmation du mot de passe :</label>
            </td>
            <td>
                <input type="password" id="password2" name="password2" />
            </td>
        
            <tr>
                <td>
                    <label for="dateDeNaissance">Date de naissance :</label>
                </td>
                <td>
                    <input type="date" id="dateDeNaissance" name="birth" value="<?php if (isset($birth)) {echo $birth; } ?>" :>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Valider" name="forminscription" id="envoyer" />
                </td>
            </tr>
        </form>
    </table>
    <?php
        if(isset($erreur))
        {
              echo '<font color="red">' .$erreur. "</font>";
        }
        ?>
    
</body>

</html>