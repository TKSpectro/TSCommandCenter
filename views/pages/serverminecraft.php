<?
if (!User::getInstance()->isLoggedIn())
{
    header('Location: ' . APP_URL . '?c=pages&a=login');
    die();
}
?>
Server command to execute:
<form method='POST'>
    <input type='text' name='minecraftCommand'/>
    <button class="btn btn-primary btn-small" type="submit">Absenden</button>
</form>

<h4>Server Log</h4>
<form method="post">
    <button class="btn btn-primary btn-small" name="minecraftRefresh" type="submit">Aktualisieren</button>
</form>