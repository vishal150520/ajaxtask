$(document).ready(function () {
    $(".form").click(function (event) {
      var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
      };
      
      $.ajax({
        type: "POST",
        url: "process.php",
        data: {
          name: $("#name").val(),
          email: $("#email").val(),
          phone: $("#phone").val(),
        },
        dataType: "json",
        encode: true,
      }).done(function (data) {
        
        
        if (!data.success) {
            if (data.errors.name) {
              $("#name-group").addClass("has-error");
              $("#name-group").append(
                '<div class="help-block">' + data.errors.name + "</div>"
              );
            }
    
            if (data.errors.email) {
              $("#email-group").addClass("has-error");
              $("#email-group").append(
                '<div class="help-block">' + data.errors.email + "</div>"
              );
            }
            if (data.errors.phone) {
              $("#superhero-group").addClass("has-error");
              $("#superhero-group").append(
                '<div class="help-block">' + data.errors.phone + "</div>"
              );
            }
          } else {
            $("form").html(
              '<div class="alert alert-success">' + data.message + "</div>"
            );
          }
            
      });
      
  
      event.preventDefault();
    });
    
  });
  $("form").submit(function (event) {
    $(".form-group").removeClass("has-error");
    $(".help-block").remove();

    // ...
  });


  
  