/* variables */
var hostname = window.location.host;

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
  if ($(".name-input").find("input").val() != null) {
    $(".modal-title>h3").text("Add item");
    $(".name-input").find("input").val("");
    $(".price-add").find("input").val("");
    $(".period-add").find('input[name="startDate"]').val("");
    $(".period-add").find('input[name="endDate"]').val("");
    $("textarea[name='description']").val("");
    $("input:radio").prop('checked', false);
    $(".view-image").find("img").remove();
    $(".modal-body").find("input[name='_method']").remove();
    $(".modal-body").find("form").attr("action", "http://" + hostname + "/store-item");
  }

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

  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: '/api/v1/images/' + id_image,
    success: function(data) {
      if ($('.view-image').is(':empty')) {
        $('.view-image').append('<img src="http://' + hostname + '/images/items/' + data[0].name + '">');
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
      $(".modal-body").find("form").attr("action", "http://" + hostname + "/items/" + id).prepend('<input name="_method" type="hidden" value="PUT">');
    },
    complete: function() {
      $(".modal").fadeIn();

    }
  });

});

$(".rentButton").click(function() {
  var id = $(this).attr("data-attr");
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  var item = $.ajax({
    type: 'GET',
    dataType: 'json',
    url: '/api/v1/items/' + id,
    success: function(data) {
      $startDate = data[0].start_date;
      $endDate = data[0].end_date;
      $("body").html('<div class="modal"><div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4"><div class="modal-body request-loan"><form role="form" method="POST" action="/request-loan"><input type="hidden" name="_token" value="' + csrfToken + '"><input type="hidden" name="item" value="' + id + '"><div class="period-add"><h5>Period<h5><input type="date" name="startDate" min="' + $startDate + '" max="' + $endDate + '" value="' + $startDate + '" required><span>to</span><input type="date" name="endDate" min="' + $startDate + '" max="' + $endDate + '" value="' + $endDate + '" required><button class="blueButton" type="submit">Send</button><button class="blueButton button-modal-close" type="button">Close</button></div></form></div></div></div>');
      $(".images-add").hide();
    },
    complete: function() {
      $(".modal").fadeIn();

    }
  });

});

$(".fa-comment-o").click(function() {
  var id = $(this).attr("data-attr");
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  var stars = '<section class="rating"><input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label><input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label><input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label><input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label><input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label></section>';
  var item = $.ajax({
    type: 'GET',
    dataType: 'json',
    url: '/api/v1/loans/' + id,
    success: function(data) {
      $startDate = data[0].start_date[0];
      $endDate = data[0].end_date.date;
      $("body").html('<div class="modal"><div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4"><div class="modal-body modal-review"><form role="form" method="POST" action="/create-review"><input type="hidden" name="_token" value="' + csrfToken + '"><input type="hidden" name="loan" value="' + id + '"><div class="modal-title"><h3>How was your experience?</h3></div><p>Write a review to explain your experience:</p><span>Rate:</span>' + stars + '<textarea name="review"></textarea><button class="blueButton" type="submit">Send</button><button class="blueButton button-modal-close" type="button">Close</button></form></div></div></div>');
    },
    complete: function() {
      $(".modal").fadeIn();

    }
  });

});
