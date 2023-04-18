<style>
    .list_friends a {
        color: black;
        text-decoration: none;
    }
</style>

<section>
    <div class="list_friends">
        <?php $var = '';
        foreach ($data["listgroups"] as $key) { ?>
            <?php if ($key['user_id'] != $_SESSION['user']['id']) { ?>
                <?php if ($var != $key['user_id']) { ?>
                    <a href="http://localhost/chatv2/message?grid=<?= $key['group_id'] ?>">
                        <div class="friend">
                            <?php if ($key['avatar'] != '') { ?>
                                <img class="rounded-circle" src="public/image/<?= $key['avatar'] ?>" alt="">
                                
                            <?php } else { ?>
                                <img class="rounded-circle" src="public/image/<?= $key['u_avatar'] ?>" alt="">
                                
                            <?php } ?>
                            <?php if ($key['name'] != '') { ?>
                                <div class="">
                                    <h5 class="name"><?= $key['name'] ?></h5>
                                    <p class="chat">hell0</p>
                                </div>
                            <?php } else { ?>
                                <div class="">
                                    <h5 class="name"><?= $key['u_name'] ?></h5>
                                    <p class="chat">hell0</p>
                                </div>
                            <?php } ?>
                        </div>
                    </a>
        <?php  }
            }
            $var = $key['user_id'];
        } ?>
    </div>
</section>
</div>
</div>
<script>

</script>