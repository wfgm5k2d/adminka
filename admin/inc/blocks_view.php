<?php require('header.php');?>
    <div class="divleft">
        <h1> Блоки </h1>

        <div class="loadcontent"></div>
        <div class="clear"></div>
        <div class="new">Добавить новый блок</div>
    </div>

    <div class="divright">
        <div class="addblock">
            <h1> Добавить блок </h1>
            <form class="ajax_addblock">
                <p class="after">Название блока:
                    <input type="text" name="name" placeholder="Введите название блока" class="ajax_addblock-name input">
                </p>
                <p class="after">Значение блока:
                    <input type="text" name="value" placeholder="Введите значение блока" class="ajax_addblock-value input">
                </p>
                <p class="after">Идентификатор блока:
                    <input type="text" name="ident" placeholder="Введите ident блока" class="ajax_addblock-ident input">
                </p>
                    <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save save">
                    <input type="submit" name="cancel" value="Отменить" class="ajax_addblock-cancel cancel">
            </form>
        </div>

        <div class="delblock">
            <h1> Удалить блок </h1>
            <div id="delete-block">
                    <input type="hidden" name="id" class="deleteblock-id input">
                    <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                    <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>

        <form class="editblock">
            <h1> Изменить блок </h1>
            <div class="ajax_editblock">
                    <input type="hidden" name="id" class="ajax_editblock-id">
                <p class="after">Значение:
                    <input type="text" name="value" placeholder="Новое значение блока" value="" class="ajax_editblock-value input">
                </p>
                    <input type="submit" value="Сохранить" class="ajax_editblock-save save">
                    <input type="submit" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </form>
    </div>
    <div class="clear"></div>
    <script type="text/javascript" src="conf/block.js"></script>
<?php include('footer.php');?>