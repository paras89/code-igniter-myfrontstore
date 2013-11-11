<div class = "search-bar">
    <form action="search" id="search-form" >
        Search: <input type="text" name="search"   maxlength="128" class="required">
        <input type="submit" value="Submit">
    </form>
</div>
<br/>
<div id="error" >Search field cannot be empty. Fill in the search textbox before submit.</div>

<script type="text/javascript">

    $("#search-form").submit(function(event){
        var isFormValid = true;

        $("#search-form .required").each(function(){
            if ($.trim($(this).val()).length == 0){
                document.getElementById("error").style.visibility = "visible";
                isFormValid = false;
            } else {
                document.getElementById("error").style.visibility = "hidden";
            }
        });
        return isFormValid;
    });

 </script>