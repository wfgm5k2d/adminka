$(document).ready(function () {
    $('#description_editor, #description_editor-editpage').trumbowyg({
        lang: 'ru',
        btnsDef: {
        // Create a new dropdown
        image: {
            dropdown: ['insertImage', 'upload'],
            ico: 'insertImage'
        }
    },
    // Redefine the button pane
    btns: [
        ['viewHTML'],
        ['preformatted'],
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['fullscreen'],
        ['historyUndo','historyRedo'],
    ],
    });

    $('#content_editor, #content_editor-editpage').trumbowyg({
        lang: 'ru',
        btnsDef: {
        // Create a new dropdown
        image: {
            dropdown: ['insertImage', 'upload'],
            ico: 'insertImage'
        }
    },
    // Redefine the button pane
    btns: [
        ['viewHTML'],
        ['preformatted'],
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['image'], // Our fresh created dropdown
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['fullscreen'],
        ['historyUndo','historyRedo'],
        ['removeformat'],
        ['table'],
        ['foreColor', 'backColor'],
        ['fontfamily'],
        ['fontsize'],
        ['insertAudio'],
        ['lineheight'],
        ['noembed'],
    ],
    plugins: {
        // Add imagur parameters to upload plugin for demo purposes
        upload: {
            serverPath: 'https://api.imgur.com/3/image',
            fileFieldName: 'image',
            headers: {
                'Authorization': 'Client-ID 28aaa2e823b03b1'
            },
            urlPropertyName: 'data.link',
            fontsize: {
	            sizeList: [
	                '12px',
	                '14px',
	                '16px'
	            ]
        	},
        	resizimg: {
	            minSize: 16,
	            step: 4,
        	}
        }
    }
    });
});