<?php
include('header.php');
require('../conf/reviews.php');
?>
    <div class="divleft">
        <h1> Отзывы </h1>
        <div class="loadcontent"></div>
        <div class="clear"></div>
        <div class="new">Добавить новый отзыв</div>
    </div>
        
     <div class="divright">
        <div class="viewblock">
            <h1> Отзыв </h1>
            <div class="ajax_addblock">
                <?php
                    if($REVIEWS)
                    {
                        foreach($REVIEWS as $element)
                        {
                            if($element['name'] != '')
                            echo '
                                <p class="after">Имя:
                                    <input type="text" class="show-name input" disabled>
                                </p>';
                            else echo '';
                            if($element['email'] != '')
                            echo '
                                <p class="after">E-mail:
                                    <input type="text" class="show-email input" disabled>
                                </p>';
                            else echo '';
                            if($element['message'] != '')
                            echo '
                            	<p class="after-textarea">Отзыв: <br>
				                    <textarea type="text" name="reviews" class="show-message" disabled></textarea>
				                </p>';
                            else echo '';
                            if($element['date'] != '')
                            echo '
                            	<p class="after">От:
				                    <input class="show-date input" disabled>
				                </p>';
                            else echo '';
                            if($element > 11)
                                break;
                        }
                    }
                ?>
                <p class="after-textarea">Ваш ответ: <br>
                    <textarea type="text" name="reviews" id="description_editor" class="show-answer"></textarea>
                </p>
                <p class="after" style="display: flex; align-items: center">Активировать:
					<label class="switch">
						<input type="checkbox" checked="checked">
						<span class="slider round"></span>
					</label>
                </p>
				<div class="clear"></div>
                <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_editblock-cancel cancel">
            </div>
        </div>
        <div class="addblock">
            <h1> Добавить отзыв </h1>
            <div class="ajax_addblock">
                <p class="after">Имя:
                    <input type="text" class="show-add-name input" placeholder="Обязательно для заполнения!">
                </p>
                <p class="after">E-mail:
                    <input type="text" class="show-add-email input" placeholder="Обязательно для заполнения!">
                </p>
            	<p class="after-textarea">Отзыв: <br>
                    <textarea type="text" name="reviews" class="show-add-message" placeholder="Обязательно для заполнения!"></textarea>
                </p>
            	<p class="after">Дата отзыва:
                    <input type="date" class="show-add-date input" placeholder="Обязательно для заполнения!">
                </p>
            	<p class="after-textarea">Ваш ответ: <br>
                    <textarea type="text" name="reviews" id="description_editor" class="show-add-answer"></textarea>
                </p>
                <input type="submit" name="edit" value="Сохранить" class="ajax_addblock-save save">
                <input type="submit" name="cancel" value="Отменить" class="ajax_addblock-cancel cancel">
            </div>
        </div>

        <div class="delblock">
            <h1> Удалить отзыв </h1>
            <div id="delete-block">
                <input type="hidden" name="id" class="deleteblock-id">
                <input type="submit" name="delete" value="Подтвердить удаление" class="deleteblock-btn input">
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <script type="text/javascript" src="../conf/reviews.js"></script>
<?php include('footer.php');?>