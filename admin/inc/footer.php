<?require 'window.php';?>
</div><!--content-->
<footer class="footer">
    Персональная разработка "ArtComunity" <?= date('Y'); ?>
</footer>
</div><!--wrapper-->
<script type="text/javascript">
    $(document).ready(function () {
        $('.loadcontent').sortable();
        $('.loadcontentplus').sortable();
        $('.divleft').resizable({minHeight: 289, minWidth: 289});
        $('.divleft').draggable();
    });
</script>
<script src="/admin/conf/window.js"></script>
</body>
</html>