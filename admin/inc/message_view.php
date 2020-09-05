<div class="divleft" id="message">
    <h1> Уведомления </h1>
    <div class="loadcontent"></div>
    <div class="clear"></div>
</div>

<div class="divright">
    <div class="addblock">
        <h1> Новое уведомление! </h1>
        <div class="ajax_addblock">
            <?php
            if (ACMessage::getMessage()) {
                foreach (ACMessage::getMessage() as $element) {
                    if ($element['message'] != '')
                        echo '
                                <p class="after-textarea">Сообщение:
                                    <textarea class="show-message" disabled></textarea>
                                </p>';
                    else echo '';
                    if ($element['theme'] != '')
                        echo '
                                <p class="after">Тема обращения:
                                    <input class="show-theme input" disabled>
                                </p>';
                    else echo '';
                    if ($element['name'] != '')
                        echo '
                                <p class="after">Имя:
                                    <input class="show-name input" disabled>
                                </p>';
                    else echo '';
                    if ($element['lastname'] != '')
                        echo '
                                <p class="after">Фамилия:
                                    <input class="show-lastname input" disabled>
                                </p>';
                    else echo '';
                    if ($element['email'] != '')
                        echo '
                                <p class="after">E-mail:
                                    <input class="show-email input" disabled>
                                </p>';
                    else echo '';
                    if ($element['phone'] != '')
                        echo '
                                <p class="after">Телефон:
                                    <input class="show-phone input" disabled>
                                </p>';
                    else echo '';
                    if ($element['adress'] != '')
                        echo '
                                <p class="after">Адрес:
                                    <input class="show-adress input" disabled>
                                </p>';
                    else echo '';
                    if ($element['color'] != '')
                        echo '
                                <p class="after">Цвет:
                                    <input class="show-color input" disabled>
                                </p>';
                    else echo '';
                    if ($element['size'] != '')
                        echo '
                                <p class="after">Размер:
                                    <input class="show-size input" disabled>
                                </p>';
                    else echo '';
                    if ($element['type'] != '')
                        echo '
                                <p class="after">Тип:
                                    <input class="show-type input" disabled>
                                </p>';
                    else echo '';
                    if ($element['material'] != '')
                        echo '
                                <p class="after">Материал:
                                    <input class="show-material input" disabled>
                                </p>';
                    else echo '';
                    if ($element > 11)
                        break;
                }
            }
            ?>
        </div>
    </div>

    <div class="delblock">
        <h1> Удалить сообщение </h1>
        <div id="delete-block">
            <input type="hidden" name="id" class="deleteblock-id">
            <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
        </div>
    </div>
</div>
<div class="clear"></div>