$(function ()
{

    if ($("#description").length) {
        editAreaLoader.init({
            id: "description"	// id of the textarea to transform	
            , start_highlight: false
            ,show_line_colors: false
            , font_size: "8"
            , font_family: "verdana, monospace"
            , allow_resize: "both"
            , allow_toggle: false
            , language: "pt"
            , syntax: "php"
            , toolbar: "new_document, save, load, |, charmap, |, search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
            ,syntax_selection_allow: "css,html,js,php,xml,sql"
            , load_callback: "my_load"
            , save_callback: "my_save"
            , plugins: "charmap"
            , charmap_default: "arrows"
            , min_height: 350

        });
    }
    if ($("#model-class").length) {
        editAreaLoader.init({
            id: "model-class"	// id of the textarea to transform	
            , start_highlight: true
            , font_size: "8"
            , font_family: "verdana, monospace"
            , allow_resize: "y"
            , allow_toggle: false
            , language: "pt"
            , syntax: "php"
            , toolbar: "new_document, save, load, |, charmap, |, search, go_to_line, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
            , load_callback: "my_load"
            , save_callback: "my_save"
            , plugins: "charmap"
            , charmap_default: "arrows"
            , min_height: 350
        });
    }
    if ($("#table-class").length) {
        editAreaLoader.init({
            id: "table-class"	// id of the textarea to transform	
            , start_highlight: true
            , font_size: "8"
            , font_family: "verdana, monospace"
            , allow_resize: "y"
            , allow_toggle: false
            , language: "pt"
            , syntax: "php"
            , toolbar: "new_document, save, load, |, charmap, |, search, go_to_line, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
            , load_callback: "my_load"
            , save_callback: "my_save"
            , plugins: "charmap"
            , charmap_default: "arrows"
            , min_height: 350
        });
    }

})