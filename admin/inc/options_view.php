<?php include('header.php');?>
    <div class="divleft">
        <h1> Настройки </h1>

        <div class="loadcontent"></div>
        <div class="clear"></div>
    </div>

    <div class="divright">
        <div class="editblock">
            <h1> Изменить настройки сайта </h1>
            <div class="ajax_editblock">
            	<input type="hidden" name="id" class="ajax_editblock-id">
        		<p class="after">Заголовок сайта: 
        			<input type="text" name="title" value="" class="ajax_editblock-title input" placeholder="Название для title">
        		</p>
                <p class="after">Название сайта: 
                    <input type="text" name="site_name" value="" class="ajax_editblock-site_name input" placeholder="example.com">
                </p>
                <p class="after-textarea">Описание сайта: <br>
                    <textarea type="text" name="description" placeholder="Ваше описание сайта (не более 65 символов)" class="ajax_editblock-description"></textarea>
                </p>
                <p class="after-textarea">Общий заголовок страниц: <br>
                    <textarea type="text" name="og_title" placeholder="Общий заголовок всех страниц (не более 65 символов)" class="ajax_editblock-og_title"></textarea>
                </p>
                <p class="after-textarea">Краткое описание страниц: 
                    <textarea type="text" name="og_description" placeholder="Краткое описание всех страниц (не более 65 символов)" value="" class="ajax_editblock-og_description"></textarea>
                </p>
                <p class="after-textarea">Ключевые слова для сайта: 
                    <textarea type="text" name="keywords" placeholder="Слова для поисковиков (не более 10)" value="" class="ajax_editblock-keywords"></textarea>
                </p>
                <p class="after">Пароль: 
                    <input type="text" name="pass" placeholder="Пароль" value="" class="ajax_editblock-pass input">
                </p>
                </p>
                    <input type="submit" name="edit" value="Сохранить" class="ajax_editblock-save input">
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <script type="text/javascript" src="../conf/options.js"></script>
<?php include('footer.php');?>