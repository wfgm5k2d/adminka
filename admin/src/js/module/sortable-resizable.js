import $ from 'jquery';

$(document).ready(function () {
    $('.loadcontent').sortable();
    $('.loadcontentplus').sortable();
    $('.divleft').resizable({minHeight: 289, minWidth: 289});
    $('.divleft').draggable();
});