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
    <input type='submit'/>
</form>