<?php
session_start();
include('../../class/func_start.php');

$url = explode('/', $_SERVER['PHP_SELF']);

if (in_array('catalog_view.php', $url) && empty($_GET['id'])) {
    $_SESSION['id'] = '';
    ?>
    <div class="divleft" id="catalog">
        <h1> Каталог </h1>
        <div class="loadcontent"></div>
        <div class="clear"></div>
        <div class="new">Добавить новый каталог</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить каталог </h1>
            <div class="ajax_addblock">
                <p class="after">Введите название каталога:
                    <input type="text" name="name" placeholder="Имя каталога" class="ajax_addblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить каталог </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить каталог </h1>
            <div class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id">
                <p class="after">Новое имя каталога:
                    <input type="text" name="name" placeholder="Новое имя каталога" value=""
                           class="ajax_editblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>


        <div class="addblockplus">
            <h1> Добавить подкаталог </h1>
            <div class="ajax_addblockplus">
                <p class="after">Введите название подкаталога:
                    <input type="text" name="name" placeholder="Имя подкаталога" class="ajax_addblock-name-plus input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save-plus save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblockplus">
            <h1> Изменить подкаталог </h1>
            <div class="ajax_editblockplus">
                <input type="hidden" name="id" class="ajax_editblock-id-plus">
                <p class="after">Новое имя подкаталога:
                    <input type="text" name="name" placeholder="Новое имя подкаталога" value=""
                           class="ajax_editblock-name-plus input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save-plus save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>
    </div>
    <?
} else {
    $_SESSION['id'] = $_GET['id'];
    ?>
    <div class="divleft">
        <h1> Подкаталог </h1>
        <div class="loadcontentplus"></div>
        <div class="clear"></div>
        <div class="new">Добавить новый подкаталог</div>
    </div>
    <div class="divright">
        <div class="addblock">
            <h1> Добавить подкаталог </h1>
            <div class="ajax_addblock">
                <p class="after">Введите название подкаталога:
                    <input type="text" name="name" placeholder="Имя подкаталога" class="ajax_addblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="hidden" name="parent" value="" class="ajax_addblock-parent input">
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить подкаталог </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить подкаталог </h1>
            <div class="ajax_editblock">
                <input type="hidden" name="id" class="ajax_editblock-id">
                <p class="after">Новое имя подкаталога:
                    <input type="text" name="name" placeholder="Новое имя подкаталога" value=""
                           class="ajax_editblock-name input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>


        <div class="addblockplus">
            <h1> Добавить подкаталог </h1>
            <div class="ajax_addblockplus">
                <p class="after">Введите название подкаталога:
                    <input type="text" name="name" placeholder="Имя подкаталога" class="ajax_addblock-name-plus input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save-plus save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <div class="editblockplus">
            <h1> Изменить подкаталог </h1>
            <div class="ajax_editblockplus">
                <input type="hidden" name="id" class="ajax_editblock-id-plus">
                <p class="after">Новое имя подкаталога:
                    <input type="text" name="name" placeholder="Новое имя подкаталога" value=""
                           class="ajax_editblock-name-plus input">
                </p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save-plus save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>
    </div>
    <?
}
?>
<div class="clear"></div>