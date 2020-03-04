<div class="grid_container">
    <?php
        foreach(Whitelist::get() as $discordID) {
            echo '
            <div class="grid_item whitelist_item" getid="'.$discordID.'" style="width: 350px; height: 130px">
                <div class="grid_item_loading">
                    <div class="grid_item_loading_wrapper">
                        <i class="fas fa-spinner fa-spin fa-2x"></i>
                    </div>
                </div>
                <img class="whitelist_item_picture" style="float: left; margin-right: 1em" width="64px" height="64px" />
                <div class="whitelist_item_description">
                    <h5></h5>
                    <span class="whitelist_item_rank">Administrator</span>
                </div>
            </div>
            ';
        }
    ?>
</div>

<!--<script>
    $(document).ready(function() {

        $('.grid_item').each(function(){
            var container = $(this);
            var discordID = $(this).attr('getid');

            $.ajax({
                async: true,
                type: "GET",
                dataType: "json",
                url: "<?php echo APP_URL; ?>",
                data: "c=api&a=apiGetuser&discordID="+discordID,
                complete: function(data) {
                    if(data.status == 200) {
                        var avatarURL = data.responseJSON.avatar;
                        var displayname = data.responseJSON.username;
                        
                        container.find('.grid_item_loading').first().toggle();
                        container.find('.whitelist_item_description').first().find('h5').first().html(displayname);
                        container.find('img').first().attr('src', avatarURL);
                    }
                }
            });
        });
    });

</script>-->