<?php
session_start();
$url = explode('/', $_SERVER['PHP_SELF']);

if (empty($_GET['id'])) {
    ?>
    <div class="divleft" id="menu">
        <h1> Меню </h1>
        <div class="loadcontent"></div>
        <div class="clear"></div>
        <div class="new">Добавить новое меню</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить меню </h1>
            <form class="ajax_addblock">
                <p class="after">Введите название меню:
                    <span class="url">
                        URL сменится автоматически
                    </span>
                    <input type="text" name="name" placeholder="Имя меню" class="ajax_addblock-name input" autofocus>
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" value="Сохранить" class="ajax_addblock-save save">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>

        <div class="delblock">
            <h1> Удалить меню </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить меню </h1>
            <form class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id">
                <p class="after">Новое имя меню:
                    <span class="url">
                        URL сменится автоматически
                    </span>
                    <input type="text" name="name" placeholder="Новое имя меню" value=""
                           class="ajax_editblock-name input" autofocus>
                </p>
                <input type="submit" value="Сохранить" class="ajax_editblock-save save">
                <input value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>
    </div>
    <?
} else {
    ?>
    <div class="divleft" id="menu">
        <h1> Подменю </h1>
        <div class="loadcontentplus"></div>
        <div class="clear"></div>
        <div class="new">Добавить новое подменю</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить подменю </h1>
            <form class="ajax_addblock">
                <p class="after">Введите название подменю:
                    <input type="text" name="name" placeholder="Имя подменю" class="ajax_addblock-name input" autofocus>
                </p>
                <p class="after">URL:
                    <input type="text" name="url" class="ajax_addblock-name input">
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>

        <div class="delblock">
            <h1> Удалить подменю </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить подменю </h1>
            <form class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id-plus">
                <p class="after">Новое имя подменю:
                    <span class="url">
                        URL сменится автоматически
                    </span>
                    <input type="text" name="name" placeholder="Новое имя подменю" value=""
                           class="ajax_editblock-name input" autofocus>
                </p>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </form>
        </div>
    </div>
    <?
}
?>
<div class="clear"></div>