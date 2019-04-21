"use strict"

$(window).on("load", function() {
    $('.btn-forget').on('click',function(e){
        e.preventDefault();
       $('.form-items','.form-content').addClass('hide-it');
       $('.form-sent','.form-content').addClass('show-it');
    })
});