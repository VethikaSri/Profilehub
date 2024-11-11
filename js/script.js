$(document).ready(function() {
    function submitData(action) {
        var data = {
            username: $('#username').val(),
            password: $('#password').val(),
            action: action
        };

        

        if (action === 'register') {
            data.fname = $('#fname').val();
            data.mname = $('#mname').val();
            data.lname = $('#lname').val();

            var day = $('#birthDate').val();
            var month = $('#birthMonth').val() - 1;
            var year = $('#birthYear').val();

            console.log("Day: ", day);
            console.log("Month: ", month + 1);
            console.log("Year: ", year);

            if(day && month >= 0 && year){
                const birthDate = new Date(year, month, day);
                data.birthDate = birthDate.toISOString().split('T')[0];
            }else{
                console.log ("Please select a valid birth date");
                return;
            }
            

            data.gender = $('#gender').val();
            data.address = $('#address').val();
            data.city = $('#city').val();
            data.pincode = $('#pincode').val();
            data.email = $('#email').val();
            data.mob_no = $('#mob_no').val();
            data.prof = $('#prof').val();
            data.linkedin = $('#linkedin').val();
            data.github = $('#github').val();
            data.website = $('#website').val();
            data.re_pwd = $('#re_pwd').val(); 
        }

        $.ajax({
            url: 'php/function.php',
            type: 'POST',
            data: data,
            success: function(response) {
                alert(response); 
                if (response.includes("successful!")) {
                    if (action === 'register') {
                        window.location.reload(); 
                    } else if (action === 'login') {
                        window.location.href = 'php/profile.php'; 
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus + ": " + errorThrown);
            }
        });
    }

    // Login button
    $('#login-btn').on('click', function() {
        submitData('login');
    });

    // Register button
    $('#register-btn').on('click', function() {
        submitData('register');
    });
});