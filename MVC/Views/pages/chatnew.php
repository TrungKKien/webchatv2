<div class="wraper2  ">
    <header>
        <div class="boder2  bg-dark">
            <img class="rounded-circle" src="public/image/<?= $data['friend']['avatar']?>" alt="">
            <?= $data['friend']['name']?>

        </div>
    </header>
    <section>
        bat đầu cuộc trò chuyện
    </section>
    <footer>

        <div class="chat">
            <div class="input-group mb-3 ">
                <form style="display: flex; width: 100%" action="http://localhost/chatv2/message/chat?id=<?= $data['friend']['id']?>" method="post" enctype="multipart/form-data">

                    <input type="text" name="chat" class="form-control">
                    <input style="width: 40px;" name="image" type="file" class="form-control bi bi-image" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    <button type="submit" class="bg-dark">
                        <span style="color: white" class="input-group-text bg-dark" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                            </svg>
                        </span>

                    </button>
                </form>
            </div>
        </div>
    </footer>
</div>