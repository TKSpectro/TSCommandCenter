<?
$ftpConnection = ftp_connect('serverts.zapto.org', 21, 90);
if(ftp_login($ftpConnection, 'Server', 'TSCockila14') && ftp_chdir($ftpConnection,'/')) {

    //$contents = ftp_mlsd($ftpConnection, ".");
    $contents = ftp_rawlist($ftpConnection, '/');
    //$contents = ftp_raw($ftpConnection, 'mlsd');

    var_dump($contents);
} else {
    echo 'Es gab einen Fehler beim Anmelden über FTP.';
}