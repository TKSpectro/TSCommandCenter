<div id="header">
    <ul class="nav_header">
        <li title="Abmelden"><a href="index.php?c=pages&a=logout"><i class="fas fa-power-off"></i></a></li>
        <li title="Benutzereinstellungen"><a href="index.php?c=pages&a=na"><i class="fas fa-user-cog"></i></a></li>
        <li title="Software aktualisieren" style="cursor: pointer"><a id="linkUpdate"><i class="fas fa-sync-alt"></i></a></li>
    </ul>
</div>

<!-- Update procedure -->
<script>
    $('#linkUpdate').on('click', function(){
        var iconElement = $(this).find('i').first();
        iconElement.addClass('fa-spin');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?php echo APP_URL; ?>",
            data: "c=api&a=apiUpdate",
            complete: function(data) {
                if(data.status == 200) {
                    window.location.reload();
                }
            }
        });
    });
</script>