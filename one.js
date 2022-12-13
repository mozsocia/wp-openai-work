


$(document).ready(function () {


  $('#form').on('submit', function (event) {
    event.preventDefault();

    var name = $('#name').val();
    var language = $('#language').val();
    var Tone = $('#Tone').val();
    let text1 = "Write amazon product description on the product:";


    if (language != " " && Tone != " ") {
      var abc = text1.concat(" ", name, " ", Tone, " ", language);

    }
    else if (language != "") {
      var abc = text1.concat(" ", name, " ", language);

    }

    else {
      var abc = text1.concat(" ", name);

    }

    $.ajax({

      type: 'POST',

      data: {
        ajax: 1,
        wow: abc
      },

      success: function (response) {


        const img = document.getElementById('itsanimage');
        const itsatext = document.getElementById('itsatext');
        img.style.display = 'none';
        itsatext.style.display = 'none';
        $('#response').text(response);

      },

      error: function (xhr, status, error) {
        alert('Failed to connect with the server. Please try again.');
      }
    });
  });
});





