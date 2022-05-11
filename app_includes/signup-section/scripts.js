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
        '<h1 class="text-center text-white">Thank you, we will contact you soon!</h1>';
      button.remove();
    })
    .fail(function (data) {
      alert("An error has ocurred!");
      button.innerHTML("Send request");
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
        '<h1 class="text-center text-white">Thank you, we will contact you soon!</h1>';
      button.remove();
    })
    .fail(function (data) {
      alert("An error has ocurred!");
      button.innerHTML("Send request");
      console.log(data);
    });
});
