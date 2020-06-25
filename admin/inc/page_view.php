<?php include('header.php'); ?>
<?php
session_start();

$url = explode('/', $_SERVER['REQUEST_URI']);

if (in_array('page_view', $url) && empty($_GET['id'])) {
    $_SESSION['id'] = '';
    ?>
    <div class="divleft">
        <h1> Страница </h1>
        <div class="loadcontent"></div>
        <div class="clear"></div>
        <div class="new">Добавить новую страницу</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить страницу </h1>
            <div class="ajax_addblock">
                <p class="after">Введите название страницы:
                    <input type="text" name="name" placeholder="Имя страницы" class="ajax_addblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <p class="after-textarea">Краткое описание страницы:
                    <textarea type="text" name="descript" id="description_editor" placeholder="Краткое описание страницы"
                              class="ajax_addblock-descript"></textarea>
                </p>
                <p class="after-textarea">Полное описание страницы:
                    <textarea type="text" name="content" id="content_editor" placeholder="Полное описание страницы"
                              class="ajax_addblock-content"></textarea>
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_addblock-cancel cancel">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить страницу </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить страницу </h1>
            <div class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id">
                <p class="after">Новое имя страницы:
                    <input type="text" name="name" placeholder="Новое имя страницы" value=""
                           class="ajax_editblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <p class="after-textarea">Краткое описание страницы:
                    <textarea type="text" name="descript" id="description_editor-editpage" placeholder="Краткое описание страницы"
                              class="ajax_editblock-descript"></textarea>
                </p>
                <p class="after-textarea">Полное описание страницы:
                    <textarea type="text" name="content" id="content_editor-editpage" placeholder="Полное описание страницы"
                              class="ajax_editblock-content"></textarea>
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>
    </div>
    <?
} else {
    $_SESSION['id'] = $_GET['id'];
    ?>
    <div class="divleft">
        <h1> Подстраница </h1>
        <div class="loadcontentplus"></div>
        <div class="clear"></div>
        <div class="new">Добавить новую подстраницу</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить подстраницу </h1>
            <div class="ajax_addblock">
                <p class="after">Введите название страницы:
                    <input type="text" name="name" placeholder="Имя страницы" class="ajax_addblock-name-plus input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <p class="after-textarea">Краткое описание страницы:
                    <textarea type="text" name="descript" id="description_editor" placeholder="Краткое описание страницы"
                              class="ajax_addblock-descript-plus"></textarea>
                </p>
                <p class="after-textarea">Полное описание страницы:
                    <textarea type="text" name="content" id="content_editor" placeholder="Полное описание страницы"
                              class="ajax_addblock-content-plus"></textarea>
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent-plus input">
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save-plus save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить страницу </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblockplus">
            <h1> Изменить подстраницу </h1>
            <div class="ajax_editblockplus">
                <input type="hidden" name="id" class="ajax_editblock-id-plus">
                <p class="after">Новое имя подстраницы:
                    <input type="text" name="name" placeholder="Новое имя подстраницы" value=""
                           class="ajax_editblock-name-plus input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <p class="after-textarea">Краткое описание подстраницы: <br>
                    <textarea type="text" name="descript" id="description_editor-editpage" placeholder="Краткое описание подстраницы"
                              class="ajax_editblock-descript-plus"></textarea>
                </p>
                <p class="after-textarea">Полное описание подстраницы: <br>
                    <textarea type="text" name="content" id="content_editor-editpage" placeholder="Полное описание подстраницы"
                              class="ajax_editblock-content-plus"></textarea>
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save-plus save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>
    </div>
    <?
}
?>
    <div class="clear"></div>
    <script type="text/javascript" src="../conf/page.js"></script>
<?php include('footer.php'); ?>