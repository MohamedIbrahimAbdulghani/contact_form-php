    
    var userErrors = true,
        emailError = true,
        phoneError = true,
        messageError = true;

    $(function() {

        $(".username").blur(function() {
            if($(this).val().length < 3) {  // Show Error

                $(this).css("border", "1px solid red");

                $(this).parent().find(".custom-alert").fadeIn(300);

                $(this).parent().find(".istraxs").fadeIn(300);

                userErrors = true;

            } else {  // No Error

                $(this).css("border", "1px solid green");

                $(this).parent().find(".custom-alert").fadeOut(300);

                $(this).parent().find(".istraxs").fadeOut(300);

                userErrors = false;
            }
        })
    });

    $(function() {
        $(".email").blur(function() {
            if($(this).val().length == "") {

                $(this).css("border", "1px solid red");

                $(this).parent().find(".custom-alert").fadeIn(300);

                $(this).parent().find(".istraxs").fadeIn(300);

                emailError = true;

            } else {

                $(this).css("border", "1px solid green");

                $(this).parent().find(".custom-alert").fadeOut(300);

                $(this).parent().find(".istraxs").fadeOut(300);

                emailError = false;
            }
        })
    });

    $(function() {
        $(".phone").blur(function() {
            if($(this).val().length > 11 || $(this).val().length < 11) {

                $(this).css("border", "1px solid red");

                $(this).parent().find(".custom-alert").fadeIn(300);

                $(this).parent().find(".istraxs").fadeIn(300);

                phoneError = true;

            } else {

                $(this).css("border", "1px solid green");

                $(this).parent().find(".custom-alert").fadeOut(300);

                $(this).parent().find(".istraxs").fadeOut(300);

                phoneError = false;
            }
        })
    });

    $(function() {
        $(".message").blur(function() {
            if($(this).val().length < 10) {

                $(this).css("border", "1px solid red");

                $(this).parent().find(".custom-alert").fadeIn(300);

                $(this).parent().find(".istraxs").fadeIn(300);

                messageError = true;

            } else {

                $(this).css("border", "1px solid green");

                $(this).parent().find(".custom-alert").fadeOut(300);

                $(this).parent().find(".istraxs").fadeOut(300);

                messageError = false;
            }
        });

        
        // Submit Form Validation
        $(".contact-form").submit(function(e) {

            if(userErrors === true || emailError === true || phoneError === true || messageError === true) {
                e.preventDefault();
                $(".username, .email, .phone, .message").blur();
            } else {

            }
        });

    });