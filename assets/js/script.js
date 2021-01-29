jQuery(document).ready(function ($) {
  // Initialize the global header
  var globalHeaderInstance = vocabulary.createGlobalHeader();

  var activeClass = "is-active";
  function activateMenu(el) {
    $(el).toggleClass(activeClass);
  }
  if ($(".glide").length > 0) {
    new Glide(".glide").mount();
  }
  if ($(".donate-buttons").length > 0) {
    $(".amount-input").val("");
    var buttons = $(".donate-buttons").find(".donate-amount"),
      submit_button = $(".donate-buttons").find(".donate");
    submit_button.on("click", function (e) {
      e.preventDefault();
      $(".donate-form").submit();
    });
    buttons.on("click", function (e) {
      e.preventDefault();
      var obj = $(this),
        amount = obj.data("amount");
      $(".amount-input").val(amount);
      buttons.removeClass("active");
      obj.addClass("active");
    });
  }
  if ($(".navbar-burger").length > 0) {
    $(".navbar-burger").on("click", function (e) {
      e.preventDefault();
      var els = [
        $(".main-header .navbar"),
        $(".main-header .navbar-menu"),
        $(".main-header .menu"),
        $(".main-header .tabs-panel"),
      ];
      els.map(activateMenu);
    });
  }
});
