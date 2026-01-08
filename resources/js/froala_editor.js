import 'froala-editor/css/froala_editor.pkgd.min.css';
import 'froala-editor/css/plugins/colors.min.css';
import 'froala-editor/css/plugins/image.min.css';
import 'froala-editor/css/plugins/video.min.css';
import 'froala-editor/css/plugins/table.min.css';
import 'froala-editor/css/plugins/line_breaker.min.css';
import 'froala-editor/css/plugins/draggable.min.css';
import 'froala-editor/js/plugins/colors.min.js';
import 'froala-editor/js/plugins/video.min.js';
import 'froala-editor/js/plugins/image.min.js';
import 'froala-editor/js/plugins/table.min.js';
import 'froala-editor/js/plugins/draggable.min.js';
import 'froala-editor/js/plugins/line_breaker.min.js';
import 'froala-editor/js/plugins/align.min.js';
import 'froala-editor/js/plugins/line_height.min.js';
import 'froala-editor/js/plugins/lists.min.js';
import 'froala-editor/js/plugins/paragraph_format.min.js';
import 'froala-editor/js/plugins/quote.min.js';
import 'froala-editor/js/plugins/paragraph_style.min.js';
import 'froala-editor/js/plugins/font_size.min.js';
import 'froala-editor/js/froala_editor.pkgd.min.js';
import 'froala-editor/js/plugins/font_family.min.js';
import FroalaEditor from "froala-editor";

var editor = new FroalaEditor("#froala-editor", {
    language: "fr",
    videoInsertButtons: ["videoByURL"],
    events: {
        "image.beforeUpload": function(files) {
            var editor = this;
            if (files.length) {
                // Create a File Reader.
                var reader = new FileReader();
                // Set the reader to insert images when they are loaded.
                reader.onload = function(e) {
                    var result = e.target.result;
                    editor.image.insert(result, null, null, editor.image.get());
                };
                // Read image as base64.
                reader.readAsDataURL(files[0]);
            }
            editor.popups.hideAll();
            // Stop default upload chain.
            return false;
        }
    }
});
