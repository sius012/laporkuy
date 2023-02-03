$(document).ready(function(){
    var hidensb = false;
    $(".sidebar-toggle").click(function(){
        var maincontent = $(this).closest(".main-content");
        maincontent.find(".sideb").toggle("slow");

        //change these position
        $(this).css("left","10px");
        if(hidensb == false){
            maincontent.find(".menu-content").removeClass("col-9");
            maincontent.find(".menu-content").addClass("col-11");
            hidensb = true;
        }else{
            maincontent.find(".menu-content").removeClass("col-11");
            maincontent.find(".menu-content").addClass("col-9");
            hidensb = false;
        }
       

    });
});