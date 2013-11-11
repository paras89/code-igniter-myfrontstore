

$(".search-form").submit(function(){
    var isFormValid = true;
    $(".signup-form .required input:text").each(function(){
        if ($.trim($(this).val()).length == 0){
            $(".error").show();
            isFormValid = false;
        } else {
            $(".error").hide();
        }
    });
    return isFormValid;
});

