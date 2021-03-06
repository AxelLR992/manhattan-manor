$("#carousel-testimonials").owlCarousel({
  autoplay: true,
  autoplayTimeout: 4000,
  dots: false,
  loop: true,
  margin: 5,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
  },
});

$("#carousel-clients").owlCarousel({
  autoplay: true,
  autoplayTimeout: 4000,
  dots: false,
  loop: true,
  margin: 32,
  nav: false,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 4,
    },
    1000: {
      items: 6,
    },
  },
});

$("#carousel-vendors").owlCarousel({
  autoplay: true,
  autoplayTimeout: 4000,
  dots: false,
  loop: true,
  margin: 32,
  nav: false,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 4,
    },
    1000: {
      items: 6,
    },
  },
});

$("#carousel-news").owlCarousel({
  loop: false,
  margin: 10,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 3,
    },
  },
});

$(".carousel-venue").owlCarousel({
  loop: false,
  margin: 0,
  dots: false,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
  },
});

$(".carousel-venue-container").click(function (e) {
  var owl = $(this).find(".carousel-venue");

  owl.trigger("next.owl.carousel", [500]);

  if (owl.attr("data-second-slide") == "true") {
    owl.trigger("prev.owl.carousel", [500]);
    owl.attr("data-second-slide", "false");
  } else {
    owl.trigger("next.owl.carousel", [500]);
    owl.attr("data-second-slide", "true");
  }
});

// Match item heights
$("#carousel-news").magicHeight({
  itemClass: ".news-body",
  resize: true,
  load: true,
});

// Add animations
var controller = new ScrollMagic.Controller({ vertical: true });

$("#nav-logo").each(function () {
  var tween = TweenMax.to(this, 1.0, {
    opacity: 1,
    ease: Power2.easeOut,
  });

  var scene1 = new ScrollMagic.Scene({
    triggerElement: "#services",
    offset: 0,
    reverse: true,
  })
    .setTween(tween)
    .addTo(controller);
});

// Single item fade in and slide up...

$(".single-tween-item").each(function () {
  var tween = TweenMax.from(
    this,
    1.0,
    {
      y: 40,
      autoAlpha: 0,
      delay: 0,
      ease: Power2.easeOut,
    },
    0.1
  );

  var scene1 = new ScrollMagic.Scene({
    triggerElement: this,
    offset: 0,
    reverse: true,
  })
    .setTween(tween)
    .addTo(controller);
});

$(".content-tween").each(function () {
  var contentTweenTL = new TimelineMax({
    repeat: 0,
  });

  var contentTween = contentTweenTL
    .from(
      $(this).find(".content-tween-left"),
      0.6,
      {
        x: -40,
        autoAlpha: 0,
        delay: 0,
        ease: Power2.easeOut,
      },
      0.1
    )
    .from(
      $(this).find(".content-tween-right"),
      0.6,
      {
        y: 40,
        autoAlpha: 0,
        delay: 0,
        ease: Power2.easeOut,
      },
      0.1
    );

  var scene3 = new ScrollMagic.Scene({
    triggerElement: this,
    offset: -100,
    reverse: true,
    duration: $(window).height() / 2,
  })
    .setTween(contentTween)
    .addTo(controller);
  //.addIndicators()
});

// Fade in and slide up, cascade through out elements

$(".stagger-tween").each(function () {
  var stagger = TweenMax.staggerFrom(
    $(this).find(".stagger-tween-item"),
    1,
    {
      y: 40,
      autoAlpha: 0,
      delay: 0,
      ease: Power2.easeOut,
    },
    0.3
  );

  var scene2 = new ScrollMagic.Scene({
    triggerElement: this,
    offset: -100,
    reverse: false,
  })
    .setTween(stagger)
    .addTo(controller);
  // .addIndicators()
});

// var tweenAbout = new TimelineMax()
//     .add([
//         TweenMax.fromTo("#parallax-text-about", 1, {top: 50}, {top: -50, ease: Linear.easeNone})
//     ]);

// var sceneAbout = new ScrollMagic.Scene({triggerElement: "#parallax-trigger-about", duration: $(window).height()})
//     .setTween(tweenAbout)
//     .addTo(controller);

// var tweenNews = new TimelineMax()
//     .add([
//         TweenMax.fromTo("#parallax-text-news", 1, {top: 50}, {top: -50, ease: Linear.easeNone})
//     ]);

// var sceneNews = new ScrollMagic.Scene({triggerElement: "#parallax-trigger-news", duration: $(window).height()})
//     .setTween(tweenNews)
//     .addTo(controller);

// var tweenVenues = new TimelineMax()
//     .add([
//         TweenMax.fromTo("#parallax-text-venues", 1, {top: 50}, {top: -50, ease: Linear.easeNone})
//     ]);

// var sceneVenues = new ScrollMagic.Scene({triggerElement: "#parallax-trigger-venues", duration: $(window).height()})
//     .setTween(tweenVenues)
//     .addTo(controller);

// var tweenClients = new TimelineMax()
//     .add([
//         TweenMax.fromTo("#parallax-text-clients", 1, {top: 50}, {top: -50, ease: Linear.easeNone})
//     ]);

// var sceneVenues = new ScrollMagic.Scene({triggerElement: "#parallax-trigger-clients", duration: $(window).height()})
//     .setTween(tweenClients)
//     .addTo(controller);

// var tweenGallery = new TimelineMax()
//     .add([
//         TweenMax.fromTo("#parallax-text-gallery", 1, {top: 50}, {top: -50, ease: Linear.easeNone})
//     ]);

// var sceneGallery = new ScrollMagic.Scene({triggerElement: "#parallax-trigger-gallery", duration: $(window).height()})
//     .setTween(tweenGallery)
//     .addTo(controller);

// var tweenTestimonials = new TimelineMax()
//     .add([
//         TweenMax.fromTo("#parallax-text-testimonials", 1, {top: 50}, {top: -50, ease: Linear.easeNone})
//     ]);

// var sceneTestimonials = new ScrollMagic.Scene({triggerElement: "#parallax-trigger-testimonials", duration: $(window).height()})
//     .setTween(tweenTestimonials)
//     .addTo(controller);

$(".reveal-container").click(function (e) {
  var timeline = new TimelineMax();
  var container = $(this);
  var subcontainer = container.find(".reveal-subcontainer");
  var content = subcontainer.find(".reveal-content");

  if (subcontainer.attr("data-expanded") == "true") {
    // Hide
    timeline.to(subcontainer, 1.0, {
      opacity: 0.0,
      ease: "Power1.easeOut",
    });

    subcontainer.attr("data-expanded", "false");
  } else {
    // Show
    timeline.to(subcontainer, 1.0, {
      opacity: 1.0,
      ease: "Power1.easeOut",
    });

    subcontainer.attr("data-expanded", "true");
  }
});

// $('.reveal-container').click( function (e) {
//   var timeline = new TimelineMax();
//   var container = $(this);
//   var subcontainer = container.find('.reveal-subcontainer');
//   var content = subcontainer.find('.reveal-content')

//   if (container.attr('data-expanded') == 'true') {
//     // Hide
//     timeline
//     .to(content, 1.25, {
//       opacity : 0.00,
//       height : '0px',
//       ease: 'Power0.easeOut'
//     })
//     .to(subcontainer, 1.50, {
//       top: '65%',
//       backgroundColor: 'rgba(21,21,21,0.00)',
//       ease: 'Sine.easeOut'
//     }, 0,25);

//     container.attr('data-expanded', 'false');

//   } else {
//     // Show
//     timeline
//     .to(subcontainer, 1.50, {
//       top: 0,
//       backgroundColor: 'rgba(20,20,20,0.90)',
//       ease: 'Sine.easeOut'
//     })
//     .to(content, 1.25, {
//       opacity : 1.00,
//       height : '100%',
//       ease: 'Power0.easeOut'
//     }, 0.25);

//     container.attr('data-expanded', 'true');
//   }
// });

// Pop-ups

$(".popup-gallery").magnificPopup({
  delegate: "a",
  type: "image",
  tLoading: "Loading image #%curr%...",
  mainClass: "mfp-img-mobile",
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
  },
  image: {
    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    titleSrc: function (item) {
      return item.el.attr("title");
    },
  },
});

$(".skylight-gallery").magnificPopup({
  type: "image",
  items: [
    {
      src: "/img/skylight-gallery/49165192908_9a4ab18966_k.jpg",
      title_alt:
        "View of Empty Skylight room with seven chandeliers, mahogany floors, steel beams, skylight studded 20 foot ceiling.",
    },
    {
      src: "/img/skylight-gallery/49225452751_a1a6a47d1a_b.jpg",
      title_alt:
        "Close up of flower arrangement with Skylight Room set up for a dinner behind.",
    },
    {
      src: "/img/skylight-gallery/49115629823_f73446bf03_b.jpg",
      title_alt:
        "The Skylight set up for a fashion show with spectators watching a model walking down the runway.",
    },
    {
      src: "/img/skylight-gallery/49165180023_1203c97983_k.jpg",
      title_alt:
        "Close up mirror and light fixture with image of the Skylight Room.",
    },
    {
      src: "/img/skylight-gallery/49116040812_d33407f528_k.jpg",
      title_alt:
        "The Skylight room set for a promotional event with red and blue uplighting.",
    },
    {
      src: "/img/skylight-gallery/47620037512_d66892476f_b.jpg",
      title_alt:
        "Detail of bookshelf at the Skylight Room with flowers and candles and the lounge furniture in the center of the room.",
    },
    {
      src: "/img/skylight-gallery/33795469008_3486e3bd1d_b.jpg",
      title_alt:
        "Detail of head table overlooking seventh avenue at and event in the Skylight Room.",
    },
    {
      src: "/img/skylight-gallery/49576229538_020a9d0012_b.jpg",
      title_alt: "Guests dancing at a wedding at the Skylight Room.",
    },
    {
      src: "/img/skylight-gallery/49576230003_63fe1af7c0_b.jpg",
      title_alt:
        "Skylight Room set for dinner with light from Times Square filling the room.",
    },
    {
      src: "/img/skylight-gallery/49115257973_c070798091_k.jpg",
      title_alt:
        "View of  the band performing and guests dancing in the Skylight Room.",
    },
    {
      src: "/img/skylight-gallery/49225799782_259fad90d0_k.jpg",
      title_alt: "Close up of a tables set for dinner in the Skylight Room.",
    },
    {
      src: "/img/mc-gallery/49581169342_018cbd3931_o.jpg",
      title_alt: "Guest dressed in flapper style in the Skylight Room.",
    },
    {
      src: "/img/skylight-gallery/49165661291_1cabf46ded_k.jpg",
      title_alt:
        "View of empty Skylight Room with its mahogany floors, brick walls, grey ceiling, antique chandeliers, and French windows on two sides of the room.",
    },
  ],
  callbacks: {
    markupParse: function (template, values, item) {
      // Triggers each time when content of popup changes
      //console.log('Template:', template);
      //console.log('Values:', values);
      //console.log('Item:', item);

      item.img[0].alt = values.title_alt;
    },
  },
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
  },
});

$(".skylight-video").magnificPopup({
  items: [
    {
      src: "https://www.youtube.com/watch?v=fjTtugasjmU",
      type: "iframe",
    },
  ],
  gallery: {
    enabled: false,
    navigateByImgClick: true,
    preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
  },
});

$(".mc-gallery").magnificPopup({
  type: "image",
  items: [
    {
      src: "/img/mc-gallery/51308098074_33d60638fd_k.jpg",
      title_alt:
        "View of Empty Manhattan Club with details of lighting, wooden panneling, and French windows.",
    },
    {
      src: "/img/mc-gallery/49115619268_dc1b2c8149_b.jpg",
      title_alt: "Conference with panel of 5 speakers at head table.",
    },
    {
      src: "/img/mc-gallery/51307584448_62399296c9_k.jpg",
      title_alt:
        "View of the empty Manhattan Club with parquet wood and French windows.",
    },
    {
      src: "/img/mc-gallery/49115344198_6e703149fd_k.jpg",
      title_alt: "Product launch at the Manhattan Club with lounge furniture.",
    },
    {
      src: "/img/mc-gallery/51306649902_2e30362da1_k.jpg",
      title_alt:
        "Manhattan Club set for conference with head table, pull down screen, blackout shades and coffee station.",
    },
    {
      src: "/img/mc-gallery/49116121996_3b423f4c74_b.jpg",
      title_alt:
        "Close up of beautiful lace wedding cake with a conference being held in the background in the Manhattan Club.",
    },
    {
      src: "/img/mc-gallery/51306648432_9212a5e4cb_k.jpg",
      title_alt: "View of empty Manhattan Manor from the south side.",
    },
    {
      src: "/img/mc-gallery/49576231408_64d95d95c2_o.jpg",
      title_alt:
        "View of Taco station at The Manhattan Club with chef preparing and ready to serve.",
    },
    {
      src: "/img/mc-gallery/49116164507_a00c75fd7b_o.jpg",
      title_alt:
        "Circus performers ??? Man on stilts and two dancers - at the Manhattan Club.",
    },
    {
      src: "/img/mc-gallery/51307389871_6da3859d90_k.jpg",
      title_alt:
        "View of the Manhattan Club including the large bar in the center and the entrance.",
    },
    {
      src: "/img/mc-gallery/51309768579_eeaab473e0_o.jpg",
      title_alt:
        "Guests serving themselves at a food station during a reception at the Manhattan Club.",
    },
    {
      src: "/img/mc-gallery/51310059780_0681475510_o.jpg",
      title_alt: "Meditteranean Station at the Manhattan Club.",
    },
    {
      src: "/img/mc-gallery/51307379361_b112394adc_k.jpg",
      title_alt:
        "View of the South East Corner of the Manhattan Club, details of overhead lighting and windows.",
    },
    /*
        {
          src: '/img/mc-gallery/49115619213_eef7304e6a_b.jpg'
        },
        */
  ],
  callbacks: {
    markupParse: function (template, values, item) {
      // Triggers each time when content of popup changes
      //console.log('Template:', template);
      //console.log('Values:', values);
      //console.log('Item:', item);

      item.img[0].alt = values.title_alt;
    },
  },
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
  },
});

$(".mc-video").magnificPopup({
  items: [
    {
      src: "https://www.youtube.com/watch?v=As4A2O-4MSQ",
      type: "iframe",
    },
  ],
  gallery: {
    enabled: false,
    navigateByImgClick: true,
    preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
  },
});

// Instagram Feed

var userFeed = new Instafeed({
  get: "user",
  userId: "8987997106",
  clientId: "924f677fa3854436947ab4372ffa688d",
  accessToken: "8987997106.924f677.8555ecbd52584f41b9b22ec1a16dafb9",
  resolution: "standard_resolution",
  template:
    '<div class="col-6 col-md-3"><a href="{{link}}" target="_blank" id="{{id}}"><img class="p-3 img-fluid" src="{{image}}" /></a></div>',
  sortBy: "most-recent",
  limit: 4,
  links: false,
});

//   var userFeed = new Instafeed({
//     get: 'user',
//     userId: '11092196538',
//     clientId: '924f677fa3854436947ab4372ffa688d',
//     accessToken: '8987997106.924f677.8555ecbd52584f41b9b22ec1a16dafb9',
//     resolution: 'standard_resolution',
//     template: '<div class="col-6 col-md-3"><a href="{{link}}" target="_blank" id="{{id}}"><img class="p-3 img-fluid" src="{{image}}" /></a></div>',
//     sortBy: 'most-recent',
//     limit: 4,
//     links: false
//   });

// var userFeed = new Instafeed({
//   get: 'user',
//   userId: '11092196538',
//   clientId: 'ca15d34511c449a1acf44857e2263f95',
//   accessToken: '8987997106.924f677.8555ecbd52584f41b9b22ec1a16dafb9',
//   resolution: 'standard_resolution',
//   template: '<div class="col-6 col-md-3"><a href="{{link}}" target="_blank" id="{{id}}"><img class="p-3 img-fluid" src="{{image}}" /></a></div>',
//   sortBy: 'most-recent',
//   limit: 4,
//   links: false
// });

// userFeed.run();

// Other scripts

$(function () {
  setTimeout(function () {
    $("#exampleModal").modal("show");
  }, 10000);
});

var formSent = false;

// * Request a reservation form logic
var reservationForm = document.getElementById("reservation-form");
reservationForm.addEventListener("submit", function (e) {
  e.preventDefault();
  var inputsContainer = document.getElementById("contact-inputs-container");
  var button = document.getElementById("btn-subscribe");
  button.innerHTML =
    '<i style="letter-spacing : initial; font-size : 150%;" class="fas fa-spinner fa-pulse"></i>';

  var data = {
    firstname: document.getElementById("inputFirstName").value,
    lastname: document.getElementById("inputLastName").value,
    company: document.getElementById("inputCompany").value,
    email: document.getElementById("inputEmail").value,
    phone: document.getElementById("inputPhone").value,
    eventdate: document.getElementById("inputProposedDate").value,
    eventtime: document.getElementById("inputProposedTime").value,
    guests: document.getElementById("inputGuests").value,
    eventtype: document.getElementById("inputEventType").value,
    g_captcha: grecaptcha.getResponse(1),
    notes: document.getElementById("inputMessage").value,
    subscribe: document.getElementById("inputSubscribe").checked ? "on" : "off",
    language: "es",
  };

  $.ajax({
    url: "/sendReservationRequest.php",
    method: "POST",
    beforeSend: function (request) {
      request.setRequestHeader("Content-Type", "application/json");
    },
    data: JSON.stringify(data),
  })
    .done(function (data) {
      inputsContainer.innerHTML =
        '<h1 class="text-center text-white">Gracias, ??Le contactaremos pronto!</h1>';
      button.remove();
    })
    .fail(function (data) {
      alert("Algo ha salido mal. Estamos trabajando para resolverlo.");
      button.innerHTML("Enviar");
      console.log(data);
    });
});

// * Contact us form logic
var contactForm = document.getElementById("contact-form");
contactForm.addEventListener("submit", function (e) {
  e.preventDefault();
  var inputsContainer = document.getElementById("contact-form-container");
  var button = document.getElementById("contact-us-button");
  button.innerHTML =
    '<i style="letter-spacing : initial; font-size : 150%;" class="fas fa-spinner fa-pulse"></i>';

  var data = {
    name: document.getElementById("contactFullName").value,
    email: document.getElementById("contactEmail").value,
    phone: document.getElementById("contactPhone").value,
    g_captcha: grecaptcha.getResponse(),
    subscribe: document.getElementById("contactSubscribe").checked
      ? "on"
      : "off",
    language: "es",
  };

  $.ajax({
    url: "/sendContactForm.php",
    method: "POST",
    beforeSend: function (request) {
      request.setRequestHeader("Content-Type", "application/json");
    },
    data: JSON.stringify(data),
  })
    .done(function (data) {
      inputsContainer.innerHTML =
        '<h1 class="text-center text-white">Gracias, ??Le contactaremos pronto!</h1>';
      button.remove();
    })
    .fail(function (data) {
      alert("Algo ha salido mal. Estamos trabajando para resolverlo.");
      button.innerHTML("Enviar");
      console.log(data);
    });
});

var modalFormSent = false;

$("#btn-subscribe-modal").click(function () {
  if (modalFormSent) {
    return false;
  }

  if (!isValidForm("modal-form")) {
    $("#modal-form").validate();

    return false;
  }

  modalFormSent = true;

  $("#btn-subscribe-modal").html(
    '<i style="letter-spacing : initial; font-size : 150%;" class="fas fa-spinner fa-pulse"></i>'
  );

  var postData = {
    email: $("#modalInputEmail").val(),
    category: "3",
  };

  $.post("process_subscription.php", postData)
    .done(function (data) {
      $(".form-cell").html(
        '<h2 class="text-white text-center">Gracias, lo contactaremos a la brevedad!</h2>' +
          '<div class="mt-5 text-center">' +
          "  <a href=\"#\" onclick=\"$('#exampleModal').modal('hide'); return false\">Close.</a>" +
          "</div>"
      );
    })
    .fail(function (data) {
      $(".form-cell").html(
        '<h2 class="text-white text-center">An error has occurred!</h2>'
      );

      alert(JSON.stringify(data));
    });

  return false;
});

function isValidForm(formId) {
  var $formControls = $("#" + formId + " :input");

  for (var i = 0; i < $formControls.length; ++i) {
    if (!$formControls[i].validity.valid) {
      return false;
    }
  }

  return true;
}

function showModal(modalId) {
  $("#" + modalId).modal({ show: true });
}

function growDiv() {
  var div = document.getElementById("hidden-rows");

  if (div.clientHeight) {
    div.style.height = 0;
  } else {
    var wrapper = document.querySelector(".measuring-wrapper");

    div.style.height = wrapper.clientHeight + "px";
  }

  var button = document.getElementById("hidden-rows-button");

  button.innerHTML =
    "Show More" == button.innerHTML ? "Show Less" : "Show More";
}

// Handle video
var buttonPlay = document.getElementById("button-play");
var buttonPause = document.getElementById("button-pause");
var backgroundVideo = document.getElementById("background-video");
var bodyEventCounter = 0;

function playSound() {
  buttonPlay.style.display = "none";
  buttonPause.style.display = "flex";
  backgroundVideo.muted = false;
}

function pauseSound() {
  buttonPlay.style.display = "flex";
  buttonPause.style.display = "none";
  backgroundVideo.muted = true;
}

buttonPlay.addEventListener("click", playSound);
buttonPause.addEventListener("click", pauseSound);
// Handle video ends

// Google Ads conversion events

var buyTicketsButton = document.getElementById("ny-eve-buy-tickets-btn");
var contactUsButton = document.getElementById("contact-us-button");
var subscribeButton = document.getElementById("btn-subscribe");

buyTicketsButton.addEventListener("click", function () {
  gtag("event", "conversion", { send_to: "AW-755860601/kmD5CIC42IMDEPmItugC" });
});
contactUsButton.addEventListener("click", function () {
  gtag("event", "conversion", { send_to: "AW-755860601/kmD5CIC42IMDEPmItugC" });
});
subscribeButton.addEventListener("click", function () {
  gtag("event", "conversion", { send_to: "AW-755860601/kmD5CIC42IMDEPmItugC" });
});

// Google Ads conversion events ends
