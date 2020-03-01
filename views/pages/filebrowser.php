<?
try {
    $ftpConnection = ftp_connect('serverts.zapto.org', 21, 3);
    $loggedIn = ftp_login($ftpConnection, 'root', 'TSCockila14');

    if($ftpConnection != null && $loggedIn && ftp_chdir($ftpConnection,'/')) {
        $contents = ftp_mlsd($ftpConnection, "./webserver");

        /*foreach($contents as $file) {
            $name = $file['name'];
            $type = $file['type'];
            $modified = $file['modify'];

            echo $name.'<br />';
        }*/

    } else {
        echo 'Es gab einen Fehler beim Anmelden über FTP.';
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<div class="browser_path">
    <i class="fas fa-home"></i> /
</div>
<div class="browser_content">
    <table>
        <tr>
            <th id="col_icon"></th>
            <th id="col_name">Dateiname</th>
            <th id="col_modified">Geändert am</th>
        </tr>

        <?php
            if($contents) {
                foreach($contents as $file) {
                    $name = $file['name'];
                    $type = $file['type'];
                    $modified = $file['modify'];
        
                    echo '
                        <tr>
                            <td class="col_icon">'.($type === 'dir' ? '<i class="far fa-folder"></i>' : '<i class="far fa-file-alt"></i>').'</td>
                            <td>'.$name.'</td>
                            <td></td>
                        </tr>
                    ';
                }
            }

        ?>
    </table>
</div>