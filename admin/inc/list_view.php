<?php
session_start();
$url = explode('/', $_SERVER['PHP_SELF']);

if (empty($_GET['id'])) {
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
            <form class="ajax_addblock">
                <p class="after">Введите название ленты:
                    <span class="url">
                        URL добавится автоматически
                    </span>
                    <input type="text" name="name" placeholder="Имя ленты" class="ajax_addblock-name input">
                </p>
                <input type="submit" value="Сохранить" class="ajax_addblock-save save">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>

        <div class="delblock">
            <h1> Удалить ленту </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" value="Подтвердить удаление" class="deleteblock-btn input">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить ленту </h1>
            <p class="after">Загрузите изображение ленты:
            <div class="seeImage">
                <form action="/admin/conf/loaderImage.php" class="loadToImage" method="post"
                      enctype="multipart/form-data">
                    <label for="upload" class="bigdownloadbutton">Добавьте изображение
                        <div class="imagepodstava"></div>

                    </label>
                    <input type="hidden" name="titleId" value="" class="form-edit-img">
                    <input type="hidden" name="name-image">
                    <input type="file" class="upload-image" id="upload" name="upload-add">
                    <button type="submit" class="add_question" name="editImage">
                        Загрузить изображение
                        <div class="information">
                            <span class="information--red">Загрузка изображений требует перезагрузки страницы.</span>
                            Прежде чем загрузить изображение обновите название ленты и нажмите <span
                                    class="information--green">Сохранить</span>, чтобы избежать потери данных.
                        </div>
                    </button>
                </form>
                <span class="output"></span>
                <div class="seeImage-image"
                     style="">
                </div>
            </div>
            </p>
            <form class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id">
                <p class="after">Новое имя ленты:
                    <span class="url">
                        URL сменится автоматически
                    </span>
                    <input type="text" name="name" placeholder="Новое имя ленты" value=""
                           class="ajax_editblock-name input">
                </p>
                <input type="submit" value="Сохранить" class="ajax_editblock-save save">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>
    </div>
    <?
} else {
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
            <form class="ajax_addblock">
                <p class="after">Введите название подленты:
                    <span class="url">
                        URL добавится автоматически
                    </span>
                    <input type="text" name="name" placeholder="Имя подленты" class="ajax_addblock-name input">
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" value="Сохранить" class="ajax_addblock-save save">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>

        <div class="delblock">
            <h1> Удалить подленту </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblockplus">
            <h1> Изменить подленту </h1>
            <p class="after">Обновить изображение подленты:
            <div class="seeImage">
                <form action="/admin/conf/loaderImage.php" class="loadToImage" method="post"
                      enctype="multipart/form-data">
                    <label for="upload" class="bigdownloadbutton">Добавьте изображение
                        <div class="imagepodstava"></div>

                    </label>
                    <input type="hidden" name="titleId" value="" class="form-edit-img">
                    <input type="hidden" name="name-image">
                    <input type="file" class="upload-image" id="upload" name="upload-add">
                    <button type="submit" class="add_question" name="editImage">
                        Загрузить изображение
                        <div class="information">
                            <span class="information--red">Загрузка изображений требует перезагрузки страницы.</span>
                            Прежде чем загрузить изображение обновите название ленты и нажмите <span
                                    class="information--green">Сохранить</span>, чтобы избежать потери данных.
                        </div>
                    </button>
                </form>
                <span class="output"></span>
                <div class="seeImage-image"
                     style="">
                </div>
            </div>
            </p>
            <form class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id-plus">
                <p class="after">Новое имя подленты:
                    <span class="url">
                        URL сменится автоматически
                    </span>
                    <input type="text" name="name" placeholder="Новое имя подленты" value=""
                           class="ajax_editblock-name-plus input">
                </p>
                <p class="after-textarea">Краткое описание подленты: <br>
                    <textarea type="text" name="descript" id="description_editor"
                              placeholder="Краткое описание подленты" class="ajax_editblock-descript-plus"></textarea>
                </p>
                <p class="after-textarea">Полное описание подленты: <br>
                    <textarea type="text" name="content" id="content_editor" placeholder="Полное описание подленты"
                              class="ajax_editblock-content-plus"></textarea>
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_editblock-save-plus save">
                <input type="submit" value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>
    </div>
    <?
}
?>
<div class="clear"></div>