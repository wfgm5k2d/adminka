<?php include('header.php');?>
<?php
session_start();
include "/../class/include_class.php";
$url = explode('/', $_SERVER['PHP_SELF']);

if(in_array('list_view.php', $url) && empty($_GET['id']))
{
    $_SESSION['id'] = '';
    ?>
    <div class="divleft">
        <h1> Лента </h1>
        <div class="loadcontent"></div>
        <div class="clear"></div>
        <div class="new">Добавить новую ленту</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить ленту </h1>
            <div class="ajax_addblock">
                <p class="after">Введите название ленты:
                    <input type="text" name="name" placeholder="Имя ленты" class="ajax_addblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <!-- <p class="after">Загрузите изображение ленты:
                    <div class="seeImage">
                        <form action="../conf/loaderImage.php" class="loadToImage" method="post" enctype="multipart/form-data">
                            <label for="upload-add" class="bigdownloadbutton">Загрузить изображение
                                <div class="imagepodstava"></div>
                            </label>
                            <input type="hidden" name="name" placeholder="Новое имя ленты" value="" class="ajax_editblock-name input">
                            <input type="file" class="upload-image" id="upload-add" name="upload-add">
                            <button type="submit" class="add_question" name="addImage">
                                Загрузить изображение
                                <div class="information">
                                    <span class="information--red">Загрузка изображений требует перезагрузки страницы.</span> Прежде чем загрузить изображение введите имя ленты и нажмите <span class="information--green">Сохранить</span>, чтобы избежать потери данных.
                                </div>
                            </button>
                        </form>
                        <div class="seeImage-image" style="background: url('../../../upload/8f87cf36561f2cb749d64738bbbb0912.png');"></div>
                    </div>
                </p> -->
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить ленту </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить ленту </h1>
            <div class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id">
                <p class="after">Новое имя ленты:
                    <input type="text" name="name" placeholder="Новое имя ленты" value="" class="ajax_editblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <p class="after">Загрузите изображение ленты:
                    <div class="seeImage">
                        <form action="../conf/loaderImage.php" class="loadToImage" method="post" enctype="multipart/form-data">
                            <label for="upload" class="bigdownloadbutton">Добавьте изображение
                                <div class="imagepodstava"></div>

                            </label>
                            <input type="hidden" name="titleId" value="" class="form-edit-img">
                            <input type="hidden" name="name">
                            <input type="file" class="upload-image" id="upload" name="upload">
                            <button type="submit" class="add_question" name="editImage">
                                Загрузить изображение
                            </button>
                        </form>
                            <span class="output"></span>
                    </div>
                </p>
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>
    </div>
    <?
}
else
{
    $_SESSION['id'] = $_GET['id'];
    ?>
    <div class="divleft">
        <h1> Лента </h1>
        <div class="loadcontentplus"></div>
        <div class="clear"></div>
        <div class="new">Добавить новую подленту</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить подленту </h1>
            <div class="ajax_addblock">
                <p class="after">Введите название подленты:
                    <input type="text" name="name" placeholder="Имя подленты" class="ajax_addblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить подленту </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>

        <div class="editblockplus">
            <h1> Изменить подленту </h1>
            <div class="ajax_editblockplus">
                <input type="hidden" name="id" class="ajax_editblock-id-plus">
                <p class="after">Новое имя подленты:
                    <input type="text" name="name" placeholder="Новое имя подленты" value="" class="ajax_editblock-name-plus input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <p class="after-textarea">Краткое описание подленты: <br>
                    <textarea type="text" name="descript" id="description_editor" placeholder="Краткое описание подленты" class="ajax_editblock-descript-plus"></textarea>
                </p>
                <p class="after-textarea">Полное описание подленты: <br>
                    <textarea type="text" name="content" id="content_editor" placeholder="Полное описание подленты" class="ajax_editblock-content-plus"></textarea>
                </p>
                <p class="after">Загрузите изображение подленты:
                    <div class="seeImage">
                        <form action="../conf/loaderImage.php" class="loadToImage" method="post" enctype="multipart/form-data">
                            <label for="upload" class="bigdownloadbutton">Добавьте изображение
                                <div class="imagepodstava"></div>
                            </label>
                            <input type="hidden" name="name" placeholder="Новое имя подленты" value="" class="ajax_editblock-name-plus input">
                            <input type="file" class="upload-image" id="upload" name="upload">
                            <button type="submit" class="add_question" name="editImage">
                                Загрузить изображение
                            </button>
                        </form>
                            <span class="output"></span>
                    </div>
                </p>
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save-plus input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>
    </div>
    <?
}
?>
    <div class="clear"></div>
    <script type="text/javascript" src="../conf/list.js" defer></script>
<?php include('footer.php');?>