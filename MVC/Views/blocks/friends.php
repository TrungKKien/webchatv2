<style>
    .list_friends a {
        color: black;
        text-decoration: none;
    }
</style>

<section>
    <div class="list_friends">
        <?php $var = '';
        foreach ($data["groups"] as $key) { ?>
            <?php
            //  if ($key['user_id'] != $_SESSION['user']['id']) { 
                ?>
                <?php 
                    // if ($var != $_SESSION['user']['id']) { 
                        ?>
                    <a href="http://localhost/chatv2/message?grid=<?= $key['id'] ?>">
                        <div class="friend">
                            <?php if ($key['avatar'] != '') { ?>
                                <img style="width: 60px; height: 60px" class="rounded-circle" src="public/image/<?= $key['avatar'] ?>" alt="">
             
                            <?php } else { ?>
                                <img style="width: 60px; height: 60px" class="rounded-circle" src="public/image/<?= $key['u_avatar'] ?>" alt="">
                                
                            <?php } ?>
                            <?php if ($key['name'] != '') { ?>
                                <div class="">
                                    <h5 class="name"><?= $key['name'] ?></h5>
                                    <p class="chat"><?= $key['MAX(content)']?></p>                          
                                </div>
                            <?php } else { ?>
                                <div class="">
                                    <h5 class="name"><?= $key['u_name'] ?></h5>
                                    <p class="chat"><?= $key['MAX(content)']?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </a>
        <?php  
            
            $var = $key['user_id'];
        } ?>
    </div>
</section>
</div>
</div>
<script>

</script>