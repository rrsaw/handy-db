/* variables */
var hostname = window.location.host;

function closeModal(data) {
  $(".button-modal-close").click(function() {
    $(".modal" + data).fadeOut();
  });
}

function clearImageInput() {
  var val = $(".image-item").find("input").val("");
  $(".image-item").css("background-color", "#E7E7E7");
  $(".image-item").find("i").css("color", "#9B9B9B");
  $(".image-item").find("i").addClass("fa-plus");
  console.log(val);
}

$(".image-item,.personal-image-add").on("click", function(e) {
  e.stopPropagation();
  $(this).find("input")[0].click();
  $(this).find("input").change(function() {
    $(this).siblings("i").removeClass("fa-plus");
    $(this).parent("div").css("background-color", "#c3ef93");
    $(this).siblings("i").css("color", "#7ED321");
    $(this).siblings("i").addClass("fa-check");
  });
});

$(".option").find("label").on("click", function() {
  $(this).find("input").prop('checked', true);
  if ($(this).find("input").prop('checked', true)) {
    $(".option").find("label").removeClass("checkedCategory");
    $(this).addClass("checkedCategory");
  }

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
    clearImageInput();
    $(".modal-title>h3").text("Add item");
    $(".option").find("label").removeClass("checkedCategory");
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

$(".refuse-loan").click(function() {
  if (confirm("Are you sure to refuse this loan?")) {
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
      clearImageInput();
      $(".modal-title>h3").text("Edit item");
      $(".option").find("label").removeClass("checkedCategory");
      $(".name-input").find("input").val(data[0].name);
      $(".price-add").find("input").val(data[0].price);
      $(".period-add").find('input[name="startDate"]').val(data[0].start_date);
      $(".period-add").find('input[name="endDate"]').val(data[0].end_date);
      $("textarea[name='description']").val(data[0].description);
      $("input:radio[value=" + data[0].id_category + "]").prop('checked', true);
      $("input:radio[value=" + data[0].id_category + "]").parent("label").addClass("checkedCategory");
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
      $("body").prepend('<div class="modalRent"><div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4"><div class="modal-body request-loan"><form role="form" method="POST" action="/request-loan"><div class="modal-title"><h3>Period</h3></div><input type="hidden" name="_token" value="' + csrfToken + '"><input type="hidden" name="item" value="' + id + '"><div class="period-add"><input type="date" name="startDate" min="' + $startDate + '" max="' + $endDate + '" value="' + $startDate + '" required><span>to</span><input type="date" name="endDate" min="' + $startDate + '" max="' + $endDate + '" value="' + $endDate + '" required><div class="col-lg-6"><button class="blueButton rent_button" type="submit">Rent</button></div><div class="col-lg-6"><button class="button-modal-close button-outline" type="button">Close</button></div></div></form></div></div></div>');
      $(".images-add").hide();
    },
    complete: function() {
      $(".modalRent").fadeIn();
      var data = "Rent";
      closeModal(data);

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
      $("body").prepend('<div class="modalReview"><div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3"><div class="modal-body modal-review"><form role="form" method="POST" action="/create-review"><div class="modal-title"><h3>How was your experience?</h3></div><input type="hidden" name="_token" value="' + csrfToken + '"><input type="hidden" name="loan" value="' + id + '"><p>Write a review to explain your experience:</p><div class="rating-loan"><span>Rate</span>' + stars + '</div><textarea name="review"></textarea><button class="blueButton" type="submit">Send</button><button class="button-modal-close button-outline" type="button">Close</button></form></div></div></div>');
    },
    complete: function() {
      $(".modalReview").fadeIn();
      var data = "Review";
      closeModal(data);
    }
  });

});
