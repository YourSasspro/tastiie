<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tastiie</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/style.css" />

    @stack('styles')
  </head>
  <body>
    

    {{-- Header --}}
    @include('web.default.layouts.partials.navbar')

    {{-- Content --}}

    @yield('content')
    <!-- End sign up modal section -->

    <script>
      // Add smooth scroll animation when buttons are clicked
      document.querySelectorAll(".cta-button").forEach((button) => {
        button.addEventListener("click", function () {
          console.log("Button clicked:", this.textContent);
          // Add your button action here
          alert("Merci pour votre intérêt! Nous vous contacterons bientôt.");
        });
      });

      // Add entrance animation on scroll
      const observerOptions = {
        threshold: 0.2,
        rootMargin: "0px 0px -50px 0px",
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
          }
        });
      }, observerOptions);

      // Apply animation to feature items
      document.querySelectorAll(".feature-item").forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateY(30px)";
        item.style.transition = `all 0.6s ease ${index * 0.2}s`;
        observer.observe(item);
      });
    </script>

    <!-- Script for Menu and Menu Sidebar -->
    <script>
      // Sample data for each food item
      const foodData = {
        1: {
          name: "Flan aux champignons",
          image:
            "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400",
          description: "Flan aux champignons",
          ingredients:
            "Shiitake, champignon de Paris, échalote, carotte, brocoli, oeuf, crème fraîche",
          allergens: "Non",
          preparation: "Chauffer 2 minutes au microonde",
          weight: "100g",
          expiry: "30 novembre",
        },
        2: {
          name: "Salade verte",
          image:
            "https://images.unsplash.com/photo-1505253758473-96b7015fcd40?w=400",
          description: "Salade fraîche du jardin",
          ingredients: "Laitue, tomates, concombre, vinaigrette",
          allergens: "Moutarde",
          preparation: "Servir frais",
          weight: "150g",
          expiry: "28 novembre",
        },
        3: {
          name: "Soupe du jour",
          image:
            "https://images.unsplash.com/photo-1574484284002-952d92456975?w=400",
          description: "Soupe maison du jour",
          ingredients: "Légumes variés, bouillon, épices",
          allergens: "Céleri",
          preparation: "Réchauffer 3 minutes",
          weight: "250g",
          expiry: "29 novembre",
        },
        4: {
          name: "Légumes grillés",
          image:
            "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400",
          description: "Assortiment de légumes grillés",
          ingredients: "Courgette, aubergine, poivron, huile d'olive",
          allergens: "Non",
          preparation: "Réchauffer 2 minutes",
          weight: "200g",
          expiry: "1 décembre",
        },
      };

      // Elements
      const sidebar = document.getElementById("sidebar");
      const sidebarOverlay = document.getElementById("sidebarOverlay");
      const sidebarClose = document.getElementById("sidebarClose");
      const foodCards = document.querySelectorAll(".food-card");
      const filterBtn = document.getElementById("filterBtn");
      const filterDropdown = document.getElementById("filterDropdown");
      const filterOptions = document.querySelectorAll(".filter-option");

      // Open sidebar
      foodCards.forEach((card) => {
        card.addEventListener("click", function (e) {
          // Don't open sidebar if add button is clicked
          if (
            e.target.classList.contains("add-btn") ||
            e.target.closest(".add-btn")
          ) {
            return;
          }

          const foodId = this.dataset.id;
          const data = foodData[foodId];

          // Update sidebar content
          document.getElementById("sidebarImage").src = data.image;
          document.getElementById("sidebarTitle").textContent = data.name;
          document.querySelectorAll(".detail-text")[0].textContent =
            data.description;
          document.querySelectorAll(".detail-text")[1].textContent =
            data.ingredients;
          document.querySelectorAll(".detail-text")[2].textContent =
            data.allergens;
          document.querySelectorAll(".detail-text")[3].textContent =
            data.preparation;
          document.querySelectorAll(".detail-text")[4].textContent =
            data.weight;
          document.querySelectorAll(".detail-text")[6].textContent =
            data.expiry;

          // Open sidebar
          sidebar.classList.add("active");
          sidebarOverlay.classList.add("active");
          document.body.style.overflow = "hidden";
        });
      });

      // Close sidebar
      function closeSidebar() {
        sidebar.classList.remove("active");
        sidebarOverlay.classList.remove("active");
        document.body.style.overflow = "";
      }

      sidebarClose.addEventListener("click", closeSidebar);
      sidebarOverlay.addEventListener("click", closeSidebar);

      // Add button functionality
      document.querySelectorAll(".add-btn").forEach((btn) => {
        btn.addEventListener("click", function (e) {
          e.stopPropagation();
          console.log("Added to cart");
          this.textContent = "✓";
          setTimeout(() => {
            this.textContent = "+";
          }, 1000);
        });
      });

      // Filter dropdown toggle
      filterBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        filterDropdown.classList.toggle("active");
      });

      // Close dropdown when clicking outside
      document.addEventListener("click", function () {
        filterDropdown.classList.remove("active");
      });

      // Filter functionality
      filterOptions.forEach((option) => {
        option.addEventListener("click", function () {
          const filter = this.dataset.filter;

          // Remove active class from all options
          filterOptions.forEach((opt) => opt.classList.remove("active"));

          // Add active class to clicked option
          this.classList.add("active");

          foodCards.forEach((card) => {
            if (filter === "all" || card.dataset.category === filter) {
              card.style.display = "block";
            } else {
              card.style.display = "none";
            }
          });

          filterDropdown.classList.remove("active");
        });
      });

      // Set default active filter
      document.querySelector('[data-filter="all"]').classList.add("active");

      // Add to cart button in sidebar
      document
        .querySelector(".add-to-cart-btn")
        .addEventListener("click", function () {
          alert("Ajouté au panier!");
          closeSidebar();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      // Set default date to tomorrow
      const dateInput = document.getElementById("deliveryDate");
      const dateInputMobile = document.getElementById("deliveryDateMobile");
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);

      // Format date as YYYY-MM-DD for input fields
      const formattedDate = tomorrow.toISOString().split("T")[0];

      if (dateInput) dateInput.value = formattedDate;
      if (dateInputMobile) dateInputMobile.value = formattedDate;

      // Set default time
      const timeInput = document.getElementById("deliveryTime");
      const timeInputMobile = document.getElementById("deliveryTimeMobile");
      if (timeInput) timeInput.value = "12:00";
      if (timeInputMobile) timeInputMobile.value = "12:00";

      // Sync mobile and desktop inputs
      if (dateInput && dateInputMobile) {
        dateInput.addEventListener("change", function () {
          dateInputMobile.value = this.value;
        });
        dateInputMobile.addEventListener("change", function () {
          dateInput.value = this.value;
        });
      }

      if (timeInput && timeInputMobile) {
        timeInput.addEventListener("change", function () {
          timeInputMobile.value = this.value;
        });
        timeInputMobile.addEventListener("change", function () {
          timeInput.value = this.value;
        });
      }

      // Language switch functionality
      const langSwitch = document.getElementById("langSwitch");
      const mobileLangSwitch = document.getElementById("mobileLangSwitch");
      let currentLang = "fr";

      function handleLanguageSwitch(checked) {
        if (checked) {
          currentLang = "en";
          console.log("Language changed to English");
        } else {
          currentLang = "fr";
          console.log("Language changed to French");
        }
      }

      if (langSwitch) {
        langSwitch.addEventListener("change", function () {
          handleLanguageSwitch(this.checked);
          if (mobileLangSwitch) mobileLangSwitch.checked = this.checked;
        });
      }

      if (mobileLangSwitch) {
        mobileLangSwitch.addEventListener("change", function () {
          handleLanguageSwitch(this.checked);
          if (langSwitch) langSwitch.checked = this.checked;
        });
      }

      // User button click
      document.getElementById("userBtn").addEventListener("click", function () {
        console.log("User button clicked");
      });

      // Cart button click (mobile)
      const cartBtn = document.getElementById("cartBtn");
      if (cartBtn) {
        cartBtn.addEventListener("click", function () {
          console.log("Cart button clicked");
        });
      }

      // Date validation for both desktop and mobile
      function validateDate(input) {
        const selectedDate = new Date(input.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
          alert("Please select a future date");
          input.value = formattedDate;
        }
      }

      if (dateInput) {
        dateInput.addEventListener("change", function () {
          validateDate(this);
        });
      }

      if (dateInputMobile) {
        dateInputMobile.addEventListener("change", function () {
          validateDate(this);
        });
      }

      // Header scroll effect
      window.addEventListener("scroll", function () {
        const header = document.querySelector(".main-header");
        if (window.scrollY > 50) {
          header.classList.add("scrolled");
        } else {
          header.classList.remove("scrolled");
        }
      });

      // Mobile menu functionality - FIXED
      document.addEventListener("DOMContentLoaded", function () {
        const mobileMenuBtn = document.getElementById("mobileMenuBtn");
        const mobileMenuPanel = document.getElementById("mobileMenuPanel");
        const mobileMenuOverlay = document.getElementById("mobileMenuOverlay");

        if (mobileMenuBtn && mobileMenuPanel && mobileMenuOverlay) {
          console.log("Mobile menu elements found");

          mobileMenuBtn.addEventListener("click", function () {
            console.log("Menu button clicked");
            this.classList.toggle("active");
            mobileMenuPanel.classList.toggle("active");
            mobileMenuOverlay.classList.toggle("active");
            document.body.style.overflow = mobileMenuPanel.classList.contains(
              "active"
            )
              ? "hidden"
              : "";
          });

          mobileMenuOverlay.addEventListener("click", function () {
            console.log("Overlay clicked");
            mobileMenuBtn.classList.remove("active");
            mobileMenuPanel.classList.remove("active");
            this.classList.remove("active");
            document.body.style.overflow = "";
          });

          // Close menu when clicking on a link
          const mobileNavLinks = document.querySelectorAll(
            ".mobile-nav-link, .mobile-traiteur-link"
          );
          mobileNavLinks.forEach((link) => {
            link.addEventListener("click", function () {
              mobileMenuBtn.classList.remove("active");
              mobileMenuPanel.classList.remove("active");
              mobileMenuOverlay.classList.remove("active");
              document.body.style.overflow = "";
            });
          });
        } else {
          console.log("Mobile menu elements not found:", {
            mobileMenuBtn: !!mobileMenuBtn,
            mobileMenuPanel: !!mobileMenuPanel,
            mobileMenuOverlay: !!mobileMenuOverlay,
          });
        }
      });

      // Password visibility toggle function
      function togglePasswordVisibility(icon) {
        const passwordInput = icon.previousElementSibling;
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          icon.classList.remove("fa-eye");
          icon.classList.add("fa-eye-slash");
        } else {
          passwordInput.type = "password";
          icon.classList.remove("fa-eye-slash");
          icon.classList.add("fa-eye");
        }
      }

      // Add animation to elements on page load
      document.addEventListener("DOMContentLoaded", function () {
        const headerElements = document.querySelectorAll(
          ".logo-section, .input-wrapper, .traiteur-link, .icon-btn, .language-switch"
        );

        headerElements.forEach((element, index) => {
          element.style.opacity = "0";
          element.style.transform = "translateY(-10px)";

          setTimeout(() => {
            element.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            element.style.opacity = "1";
            element.style.transform = "translateY(0)";
          }, 100 + index * 50);
        });
      });
    </script>
    @stack('scripts')
  </body>
</html>
