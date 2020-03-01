<?
if (!User::getInstance()->isLoggedIn())
{
    header('Location: ' . APP_URL . '?c=pages&a=login');
    die();
}
?>
Server command to execute:
<form method='POST'>
    <input type='text' name='csgoCommand'/>
    <button class="btn btn-primary btn-small" type="submit">Absenden</button>
</form>