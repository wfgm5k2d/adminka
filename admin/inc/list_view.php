<?php
session_start();
$url = explode('/', $_SERVER['PHP_SELF']);

if (empty($_GET['id'])) {
    ?>
    <div class="divleft" id="list">
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
                    <input type="text" name="name" placeholder="Имя ленты" class="ajax_addblock-name input" autofocus>
                </p>
                <input type="submit" value="Сохранить" class="ajax_addblock-save save">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>

        <div class="delblock">
            <h1> Удалить ленту </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить ленту </h1>
            <p class="after">Обновить изображение подленты:
            <div class="seeImage">
                <div class="delete-image"></div>
                <form action="/admin/conf/loaderImage.php" method="post" enctype="multipart/form-data" id="uploadImages"
                      class="loadToImage">
                    <label for="addImages" class="bigdownloadbutton">Добавьте изображение
                        <div class="imagepodstava"></div>
                    </label>
                    <input type="file" id="addImages" multiple="" class="upload-image">
                    <input type="hidden" name="id" value="" class="form-edit-img">
                    <input type="hidden" name="name-image" value="list">
                    <div class="clear"></div>
                    <div>
                        <button type="submit" class="add_question" name="editImage">
                            Загрузить изображение
                            <!--                            <div class="information">-->
                            <!--                                <span class="information--red">Загрузка изображений требует перезагрузки страницы.</span>-->
                            <!--                                Прежде чем загрузить изображение обновите название ленты и нажмите <span-->
                            <!--                                        class="information--green">Сохранить</span>, чтобы избежать потери данных.-->
                            <!--                            </div>-->
                        </button>
                    </div>
                </form>
                <div class="seeImage-image">
                    <ul id="uploadImagesList">
                        <li class="item template">
                            <span class="img-wrap">
                                <img src="image.jpg" alt="" class="img-wrap__image">
                            </span>
                            <span class="delete-link"></span>
                        </li>
                    </ul>
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
                           class="ajax_editblock-name input" autofocus>
                </p>
                <p class="after-textarea">Краткое описание ленты: <br>
                    <textarea type="text" name="descript" id="description_editor"
                              placeholder="Краткое описание ленты" class="ajax_editblock-descript-plus"></textarea>
                </p>
                <p class="after-textarea">Полное описание ленты: <br>
                    <textarea type="text" name="content" id="content_editor" placeholder="Полное описание ленты"
                              class="ajax_editblock-content-plus"></textarea>
                </p>
                <input type="submit" value="Сохранить" class="ajax_editblock-save save">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>
    </div>
    <?
} else {
    ?>
    <div class="divleft" id="list">
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
                    <input type="text" name="name" placeholder="Имя подленты" class="ajax_addblock-name input"
                           autofocus>
                </p>
                <input type="hidden" name="parent" value="1" class="ajax_addblock-parent input">
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
                <div class="delete-image"></div>
                <form action="/admin/conf/loaderImage.php" method="post" enctype="multipart/form-data" id="uploadImages"
                      class="loadToImage">
                    <label for="addImages" class="bigdownloadbutton">Добавьте изображение
                        <div class="imagepodstava"></div>
                    </label>
                    <input type="file" id="addImages" multiple="" class="upload-image">
                    <input type="hidden" name="id" value="" class="form-edit-img">
                    <input type="hidden" name="name-image">
                    <div class="clear"></div>
                    <div>
                        <button type="submit" class="add_question" name="editImage">
                            Загрузить изображение
                            <!--                            <div class="information">-->
                            <!--                                <span class="information--red">Загрузка изображений требует перезагрузки страницы.</span>-->
                            <!--                                Прежде чем загрузить изображение обновите название ленты и нажмите <span-->
                            <!--                                        class="information--green">Сохранить</span>, чтобы избежать потери данных.-->
                            <!--                            </div>-->
                        </button>
                    </div>
                </form>
                <div class="seeImage-image">
                    <ul id="uploadImagesList">
                        <li class="item template">
                            <span class="img-wrap">
                                <img src="image.jpg" alt="" class="img-wrap__image">
                            </span>
                            <span class="delete-link"></span>
                        </li>
                    </ul>
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
                           class="ajax_editblock-name-plus input" autofocus>
                </p>
                <p class="after-textarea">Краткое описание подленты: <br>
                    <textarea type="text" name="descript" id="description_editor"
                              placeholder="Краткое описание подленты" class="ajax_editblock-descript-plus"></textarea>
                </p>
                <p class="after-textarea">Полное описание подленты: <br>
                    <textarea type="text" name="content" id="content_editor" placeholder="Полное описание подленты"
                              class="ajax_editblock-content-plus"></textarea>
                </p>
                <input type="hidden" name="parent" value="1" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_editblock-save-plus save">
                <input type="submit" value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>
    </div>
    <?
}
?>
<div class="clear"></div>