<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" conteneur="width=device-width">
<meta name="viewport" conteneur="initial-scale=1.0">
<style type="text/css">
body {
    width: 100%;
    background-color: #e6e6e6;
    background-color:#FFFFFF;
    margin:0;
    padding:0;
    font-family:Arial, Helvetica, sans-serif;
}
a {
    color: #ff6600;
    text-decoration:none;
    border: 0px solid transparent;
}
a:link, a:focus { 
    color: #ff6600;
    text-decoration:none;
    border: 0px solid transparent;
}
hr {
    border:1px solid #918678;
}
.padding {
    padding:10px!important;
}
.center {
    text-align:center!important;
}
.none {
    display:none!important;
}
.contenu {
    color:#555555;
    font-size:14px;
    font-weight:bold;
    text-align:justify;
}  
</style>
</head>
<body>    
    
<br />
<br />
<table class="conteneur" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
    

    <tr>
        <td class="contenu">   
        Bonjour, <br />
        Vous avez demandé à récupérer vos identifiants perdus.<br />
        Par mesure de sécurité, le mot de passe est crypté en base de donnée.<br />
        Un mot de passe alétatoire vous a été attribué.<br /><br />
        <u>Identifiant</u> : <b><font face='arial' color='#71b00c' size='3'><?php echo $e->username; ?></font></b> ou <b><font face='arial' color='#71b00c' size='3'><?php echo $e->email; ?></font></b><br />
        <u>Nouveau mot de passe</u> : <b><font face='arial' color='#71b00c' size='3'><?php echo $nouveau_mot_de_passe; ?></font></b><br />
        <br />
        Pour l'instant, il n'est pas possible de le changer sur ce site
        <!--Pensez à le changer dans votre espace membre dès que cette fonctionnalité sera disponible</a>--><br />

        </td>
    </tr>

</table>


</body>
</html>
