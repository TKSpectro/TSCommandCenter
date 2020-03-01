<?
if (!User::getInstance()->isLoggedIn())
{
    header('Location: ' . APP_URL . '?c=pages&a=login');
    die();
}
?>
<h1>Minecraft Server Console</h1>
Server command to execute:
<form method='POST'>
    <input type='text' name='minecraftCommand'/>
    <input type='submit'/>
</form>

<h1>Server Log</h1>
<form method="post">
    <input type="submit" name="minecraftRefresh" value="Refresh Log"/>
</form>