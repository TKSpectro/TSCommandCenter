<?
if (!User::getInstance()->isLoggedIn())
{
    header('Location: ' . APP_URL . '?c=pages&a=login');
    die();
}
?>
<h1> Server Console </h1>
Server command to execute:
<form method='POST'>
    <input type='text' name='csgoCommand'/>
    <input type='submit'/>
</form>