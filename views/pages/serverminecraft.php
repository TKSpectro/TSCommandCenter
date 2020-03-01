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
    <input type="submit" name="minecraftRefresh" value="Refresh Log"/>
</form>