$(document).ready(function () {
  // Snow toggle
  $(".toggle-snow").on("click", function (event) {
    event.preventDefault();

    try {
      $("body").flurry("destroy");
    } catch (err) {
    } finally {
      $("body").flurry();
    }
  });

  // Custom snow toggle
  $(".toggle-custom-snow").on("click", function (event) {
    event.preventDefault();

    try {
      $("body").flurry("destroy");
    } catch (err) {
    } finally {
      $("body").flurry({
        character: ["❄", "❅", "❆", "*", "⛄", "🥶", "🎄", "🎅"],
        height: 240,
        speed: 1400,
        wind: 200,
        windVariance: 220,
        frequency: 10,
        large: 40,
        small: 4,
      });
    }
  });

  // Confetti toggle
  $(".toggle-confetti").on("click", function (event) {
    event.preventDefault();

    try {
      $("body").flurry("destroy");
    } catch (err) {
    } finally {
      $("body").flurry({
        character: ["~"],
        color: ["#55476A", "#AE3D63", "#DB3853", "#F45C44", "#F8B646"],
        speed: 2000,
        height: 480,
        frequency: 60,
        small: 12,
        large: 50,
        rotation: 90,
        rotationVariance: 20,
        startRotation: 90,
        wind: 10,
        windVariance: 100,
        opacityEasing: "cubic-bezier(1,0,.96,.9)",
      });
    }
  });

  // Custom flake toggle
  $(".toggle-custom-flake").on("click", function (event) {
    event.preventDefault();

    try {
      $("body").flurry("destroy");
    } catch (err) {
    } finally {
      // Load Font Awesome CSS
      $("head").append(
        '<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />'
      );

      // Flurry
      $("body").flurry({
        character: [""],
        height: 640,
        onFlake: function () {
          $(this).html("<i class='fa-regular fa-sun'></i>");
        },
      });
    }
  });
});