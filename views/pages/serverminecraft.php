<?
if (!User::getInstance()->isLoggedIn())
{
    header('Location: ' . APP_URL . '?c=pages&a=login');
    die();
}
if (isset($_GET['serverID']))
    echo 'ServerID: ' . $_GET['serverID'];
?>
<br>
Server command to execute:
<form method='POST'>
    <input type='text' name='minecraftCommand'/>
    <button class="btn btn-primary btn-small" type="submit">Absenden</button>
</form>

<h4>Server Log</h4>
<form method="post">
    <button class="btn btn-primary btn-small" name="minecraftRefresh" type="submit">Aktualisieren</button>
</form>
<div style="width:800px;height:800px;line-height:3em;overflow:scroll;padding:5px;font-size: 14px;">
    <?
    if (isset($_POST['mcLog']))
        echo $_POST['mcLog'];
    ?>
</div>