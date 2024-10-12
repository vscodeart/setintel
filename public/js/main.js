$(function (){

    $(document).on("click",".mobile-menu-close,.close-mobile-menu", function (e){
        e.preventDefault();
         var $mobileMenuContent = $(".mobile-menu-content");
         if($mobileMenuContent.hasClass('hidden')){
             $mobileMenuContent.removeClass('hidden');
         }else{
             $mobileMenuContent.addClass('hidden');
         }
    });

});
