$.fn.extend({
    myMethod: function(){
        console.log( $(this).attr('id') );
    }
});

jQuery("#tstid").myMethod();


$.extend({
    myMethod: function(id){
        console.log( $("#"+id).attr('id') );
    }
});
// error when used as jQuery("#tstid").myMethod();
jQuery.myMethod("all-contacts");
