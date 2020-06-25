<?php include('header.php');?>
    <div class="divleft">
        <h1> Товары </h1>

        <div class="loadcontent"></div>
        <div class="clear"></div>
        <div class="new">Добавить новый товар</div>
    </div>
    
    <div class="divright">
        <div class="addblock">
            <h1> Добавить товар </h1>
            <div class="ajax_addblock">
                <div class="tabsmenu">
                    <div class="tabsmenu__tabs tabs1">Описание</div>
                    <div class="tabsmenu__tabs tabs2">Дополнительно</div>
                </div>
                <div class="tabs-1">
                    <p class="after">Введите название товара:
                        <input type="text" name="name" placeholder="Название товара" class="ajax_addblock-name input">
                    </p>
                    <span class="url">
                        URL сменится автоматически
                    </span>
                    <p class="after-textarea">Краткое описание товара:
                        <textarea type="text" name="descript" placeholder="Краткое описание товара" class="ajax_addblock-descript"></textarea>
                    </p>
                    <p class="after-textarea">Полное описание товара:
                        <textarea type="text" name="content" placeholder="Полное описание товара" class="ajax_addblock-content"></textarea>
                    </p>
                </div>

                <div class="tabs-2">
                    <p class="after">Цена товара:
                        <input type="text" name="price" placeholder="Цена товара" class="ajax_addblock-price input">
                    </p>
                    <p class="after">Старая цена товара:
                        <input type="text" name="oldprice" placeholder="Старая цена товара" class="ajax_addblock-oldprice input">
                    </p>
                    <p class="after">Артикул товара:
                        <input type="text" name="art" placeholder="Артикул товара" class="ajax_addblock-art input">
                    </p>
                    <p class="after">Размер товара: 
                        <input type="text" name="size" placeholder="Размер" class="ajax_addblock-size input">
                    </p>
                    <p class="after">Цвет товара: 
                        <input type="text" name="color" placeholder="Цвет" class="ajax_addblock-color input">
                    </p>
                    <p class="after">Номер каталога к добавлению:
                        <input type="text" name="parent" placeholder="ID каталога" class="ajax_addblock-parent input">
                        <p>Выбрать из:
                            <select>
                            <?php
                                include('../conf/catalog.php');

                                if($CATALOG)
                                {
                                    foreach($CATALOG as $element)
                                    {
                                        echo '<option>'.$element['name'].' №'.$element['id'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </p>
                    </p>
                </div>
                    <input type="submit" name="send" value="Сохранить" class="ajax_addblock-save input">
                    <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить товар </h1>
            <div id="delete-block">
        		<input type="hidden" name="id" class="deleteblock-id">
        		<input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>

        <div class="editblock">
            <h1> Изменить товар </h1>
            <div class="ajax_editblock">
            	<input type="hidden" name="id" class="ajax_editblock-id">
        		<p class="after">Новое имя товара: 
        			<input type="text" name="name" placeholder="Новое имя товара" value="" class="ajax_editblock-name input">
        		</p>
                <span class="url">
                    URL сменится автоматически
                </span>
                <p class="after-textarea">Краткое описание товара: <br>
                    <textarea type="text" name="descript" placeholder="Краткое описание товара" class="ajax_editblock-descript"></textarea>
                </p>
                <p class="after-textarea">Полное описание товара: <br>
                    <textarea type="text" name="content" placeholder="Полное описание товара" class="ajax_editblock-content"></textarea>
                </p>
                <p class="after">Цена товара: 
                    <input type="text" name="price" placeholder="Цена" value="" class="ajax_editblock-price input">
                </p>
                <p class="after">Старая цена товара: 
                    <input type="text" name="oldprice" placeholder="Старая цена" value="" class="ajax_editblock-oldprice input">
                </p>
                <p class="after">Артикул товара: 
                    <input type="text" name="art" placeholder="Артикул" value="" class="ajax_editblock-art input">
                </p>
                <p class="after">Размер товара: 
                    <input type="text" name="size" placeholder="Размер" value="" class="ajax_editblock-size input">
                </p>
                <p class="after">Цвет товара: 
                    <input type="text" name="color" placeholder="Цвет" value="" class="ajax_editblock-color input">
                </p>
                <p class="after">Привязан к:
                    <input type="text" name="parent" placeholder="Привязан к ..." class="ajax_editblock-parent input">
                    <p class="after">Выбрать из:
                        <select>
                        <?php
                            include('../conf/catalog.php');

                            if($CATALOG)
                            {
                                foreach($CATALOG as $element)
                                {
                                    echo '<option>'.$element['name'].' №'.$element['id'].'</option>';
                                }
                            }
                        ?>
                        </select>
                    </p>
                </p>
                    <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save input">
                    <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel input">
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <script type="text/javascript" src="../conf/item.js"></script>
<?php include('footer.php');?>