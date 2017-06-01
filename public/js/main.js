$(".personal-image a").click(function() {
  $('.add-personal-image').trigger("click");
});

$(".visibility-password").click(function() {
  if ($(".visibility-password i").hasClass("fa-eye")) {
    $('#password').prop('type', 'text');
    $(".visibility-password i").removeClass("fa-eye");
    $(".visibility-password i").addClass("fa-eye-slash");
  } else {
    $('#password').prop('type', 'password');
    $(".visibility-password i").removeClass("fa-eye-slash");
    $(".visibility-password i").addClass("fa-eye");
  }
});

$(".btn-add-item").click(function() {
  $(".modal").fadeIn();
});

$(".modal-close").click(function() {
  $(".modal").fadeOut();
});
$(".btn-search").click(function() {
  if ($("main").hasClass("open-search")) {
    $(".searchbar").find("input").css('top', '-80px');
    $("main").removeClass("open-search");
  } else {
    $(".searchbar").find("input").css('top', '0');
    $("main").addClass("open-search");
  }
});

$(".delete-item").click(function() {
  if (confirm("Are you sure to delete this item?")) {
    return true;
  }
  return false;
});

function getImage(id_image) {
  var nameImage;
  var hostname = window.location.host;
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: '/api/v1/images/' + id_image,
    success: function(data) {
      if ($('.view-image').is(':empty')) {
        $('.view-image').append('<div class="view-image"><img src="http://' + hostname + '/images/items/' + data[0].name + '"></div>');
      }
    }
  });
}

$(".edit-item").click(function() {
  var id = $(this).attr("data-attr");
  var id_image = $(this).attr("data-image");
  var url = '/api/v1/items/' + id;
  var item = $.ajax({
    type: 'GET',
    dataType: 'json',
    url: '/api/v1/items/' + id,
    success: function(data) {
      var image = getImage(id_image);
      $(".modal-title>h3").text("Edit item");
      $(".name-input").find("input").val(data[0].name);
      $(".price-add").find("input").val(data[0].price);
      $(".period-add").find('input[name="startDate"]').val(data[0].start_date);
      $(".period-add").find('input[name="endDate"]').val(data[0].end_date);
      $("textarea[name='description']").val(data[0].description);
      $("input:radio[value=" + data[0].id_category + "]").prop('checked', true);
    },
    complete: function() {
      $(".modal").fadeIn();

    }
  });

});
