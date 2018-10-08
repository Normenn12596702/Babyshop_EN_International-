$( window ).on( "load", function() {
    initializeGrid();
});

$( window ).resize(function() {
    initializeGrid();
});

function initializeGrid() {
    $('.cfourgrid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });
}