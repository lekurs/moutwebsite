<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
</head>
<body>
<!-- HEADER -->
<table width="540" cellpadding="0" cellspacing="0" border="0" align="center">
    <tr>
        <td><img src="http://moutwebagency.net/mout/logo-mout-factures.png" alt="Mout" style="width: 540px; height: auto;"></td>
    </tr>
    <tr>
        <td height="30" style="height: 30px; font-size: 30px; line-height: 30px;">&nbsp;</td>
    </tr>
</table>
<!-- /HEADER -->
<table width="540" cellspacing="0" cellpadding="0" border="0" align="center">
    <tr>
        <td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px ;line-height: 24px;">Bonjour {{ $name }} {{ $lastname }},</td>
    </tr>
    <tr>
        <td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px ;line-height: 24px;">Vous avez reçu une réponse au sujet <b>{{ $subject }}</b></td>
    </tr>
    <tr>
        <td style="height: 24px; line-height: 24px; font-size: 24px;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px ;line-height: 24px; font-weight: bold">Voici le dernier message :</td>
    </tr>
    <tr>
        <td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px ;line-height: 24px;">{!! $lastMessage !!}</td>
    </tr>
    <tr>
        <td style="height: 24px; line-height: 24px; font-size: 24px;">&nbsp;</td>
    </tr>
    <tr>
        <td><a href="https://moutwebagency.com/admin/recettes/{{ $slug }})" style="">Voir le message</a></td>
    </tr>
</table>

</body>
</html>
