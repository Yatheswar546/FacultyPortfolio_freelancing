////////////// NAVBAR ////////////////
document.addEventListener('DOMContentLoaded', function() {
    let menu_icon = document.querySelector('.top-bar .menu_icon');
    let links = document.querySelector('.side-bar .links');

    menu_icon.addEventListener('click', function() {
        document.querySelector('.side-bar').classList.toggle('show');
    });
});


///////////// ADMIN PANEL CREATE PAGE FORM /////////////// 
ClassicEditor.create(document.querySelector("#body"),{
    toolbar: [
        "heading",
        "|",
        "bold",
        "italic",
        "bulletedList",
        "numberedList",
        "blockQuote"
    ],
    heading:{
        options: [
            { model: "paragraph", title: "Paragraph", class:"ck-heading_paragraph"},
            {
                model : "heading1",
                view : "h1",
                title : "Heading 1",
                class : "ck-heading_heading1"
            },
            {
                model : "heading2",
                view : "h2",
                title : "Heading 2",
                class : "ck-heading_heading2"
            }
        ]
    }
}).catch(error => {
    console.log(error);
});