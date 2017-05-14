$(".personal-image a").click(function(){
  $('.add-personal-image').trigger("click");
});

$(".visibility-password").click(function(){
  if($(".visibility-password i").hasClass("fa-eye")){
    $('#password').prop('type', 'text');
    $(".visibility-password i").removeClass("fa-eye");
    $(".visibility-password i").addClass("fa-eye-slash");
  } else{
    $('#password').prop('type', 'password');
    $(".visibility-password i").removeClass("fa-eye-slash");
    $(".visibility-password i").addClass("fa-eye");
  }
});
