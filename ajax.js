$(document).ready(function() {
    $("#feedbackForm").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize(); 
        $.post("insertPost.php", formData, function(response) {
            if (response === "success") {
                $("#feedbackMessage").html("<p class='success'>Wiadomość została wysłana.</p>");
                $("#feedbackForm")[0].reset();
            } else {
                $("#feedbackMessage").html("<p class='error'>Wystąpił błąd podczas wysyłania wiadomości.</p>");
            }
        });
    });
});