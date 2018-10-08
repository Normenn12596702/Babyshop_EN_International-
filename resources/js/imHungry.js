(function () {
    /* Remove tooltip on click */
    $(document).on("click",'#controlsList .control-basket #basket-tooltip', function() {
        $('#controlsList .control-basket #basket-tooltip').addClass("cfourFadeOut");
        setTimeout(function(){
            $('#controlsList .control-basket #basket-tooltip').remove();
        }, 1000);
    });
    /* Remove tooltip after time */
    window.setTimeout(function(){
        $('#controlsList .control-basket #basket-tooltip').addClass("cfourFadeOut");
        setTimeout(function(){
            $('#controlsList .control-basket #basket-tooltip').remove();
        }, 1000);
    }, 5000);
})();