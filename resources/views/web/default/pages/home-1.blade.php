@extends('web.default.layouts.app')

@push('styles')

@endpush

@section('content')
    <!-- Hero Section with Card -->
    <section class="hero-section">
      <div class="hero-card">
        <h2>Le goût des chefs chez vous</h2>
        <p>
          Vos repas faits maison cuisinés par nos chefs,<br />
          avec des produits de saison,<br />
          livrés en véhicule électrique<br />
          sur Paris
        </p>
        <button class="hero-btn">Passer</button>
      </div>
    </section>

    <!-- Why Section -->
    <section class="why-section">
      <div class="why-container">
        <h2 class="why-title">Pourquoi TASTIIE ?</h2>
        <div class="why-content">
          <p>
            <strong
              >Nous voulons rendre vos événements d'entreprise aussi gourmands
              que responsables.</strong
            >
          </p>
          <p>
            Chez Tastiie, tout est fabriqué avec amour par des artisans
            qualifiés. Nous travaillons avec des chefs aux spécialités variées,
            avec des produits frais et de saison, épicés et variées où quotidien
            par un chef étoilé.
          </p>
          <p>
            Les contenants sont réutilisables ou recyclables selon votre choix
            et les livraisons se font en véhicules électriques par des livreurs
            salariés. Une solution de restauration unique qui crée toutes les
            cases.
          </p>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
      <div class="container">
        <div class="features-grid">
          <!-- Card 1 - Cuisine -->
          <div class="feature-card">
            <div class="feature-icon">
              <!-- Cooking Pot Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                  d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 12 7.4l3.38 4.6L17 10.83 14.92 8H20v6z"
                />
              </svg>
            </div>
            <h3 class="feature-title">Cuisine du monde</h3>
            <p class="feature-description">
              Pour mieux la cuisiner, il est plus prudent d'acheter des tomates
              bien mûres et légèrement parfumées. Tomates cerises, tomates
              italiennes, tomates olivettes ou encore cœur-de-bœuf : à vous de
              choisir en fonction de la recette.
            </p>
          </div>

          <!-- Card 2 - Chefs -->
          <div class="feature-card">
            <div class="feature-icon">
              <!-- Chef Hat Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                  d="M12.5 1.5c-1.77 0-3.33.78-4.42 2-.42-.11-.86-.17-1.3-.17-2.76 0-5 2.24-5 5 0 .28.03.55.08.81C.93 10.43 0 11.91 0 13.5c0 2.21 1.79 4 4 4v4h16v-4c2.21 0 4-1.79 4-4 0-1.59-.93-3.07-2.36-3.36.05-.26.08-.53.08-.81 0-2.76-2.24-5-5-5-.44 0-.88.06-1.3.17-1.09-1.22-2.65-2-4.42-2zm-6 18v-1.89h11V19.5H6.5z"
                />
              </svg>
            </div>
            <h3 class="feature-title">Des chefs passionnés</h3>
            <p class="feature-description">
              Les plats cuisinés sont préparés par nos meilleurs chefs qui ont
              été sélectionnés pour leur expertise culinaire, qui ont été
              récompensés par plusieurs prix gastronomiques de qualité.
            </p>
          </div>

          <!-- Card 3 - Recommendation -->
          <div class="feature-card">
            <div class="feature-icon">
              <!-- Thumbs Up Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                  d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z"
                />
              </svg>
            </div>
            <h3 class="feature-title">Recommandé</h3>
            <p class="feature-description">
              Les plats cuisinés sont vivement recommandés par de nombreux
              clients qui les ont essayés et approuvés. Laissez-vous tenter par
              ces saveurs qui raviront vos papilles et surprendront vos invités.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-section">
      <div class="container">
        <!-- Header -->
        <div class="menu-header">
          <h2 class="menu-title">Entrées</h2>
          <div style="position: relative">
            <button class="filter-btn" id="filterBtn">
              <i class="bi bi-funnel"></i>
            </button>
            <div class="filter-dropdown" id="filterDropdown">
              <div class="filter-option" data-filter="all">Tous</div>
              <div class="filter-option" data-filter="vegetarian">
                Végétarien
              </div>
              <div class="filter-option" data-filter="halal">Halal</div>
              <div class="filter-option" data-filter="vegan">Végan</div>
            </div>
          </div>
        </div>

        <!-- Category Badge -->
        <span class="category-badge">Entrées</span>

        <!-- Food Grid -->
        <div class="food-grid">
          <!-- Food Card 1 -->
          <div class="food-card" data-id="1" data-category="vegetarian">
            <img
              src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400"
              alt="Flan aux champignons"
              class="food-image"
            />
            <div class="food-content">
              <div class="food-header">
                <span class="food-price">1.00€</span>
                <button class="add-btn">+</button>
              </div>
              <h3 class="food-name">Flan aux champignons</h3>
              <span class="food-tag">Végétarien</span>
            </div>
          </div>

          <!-- Food Card 2 -->
          <div class="food-card" data-id="2" data-category="vegetarian">
            <img
              src="https://images.unsplash.com/photo-1505253758473-96b7015fcd40?w=400"
              alt="Salade verte"
              class="food-image"
            />
            <div class="food-content">
              <div class="food-header">
                <span class="food-price">2.50€</span>
                <button class="add-btn">+</button>
              </div>
              <h3 class="food-name">Salade verte</h3>
              <span class="food-tag">Végétarien</span>
            </div>
          </div>

          <!-- Food Card 3 -->
          <div class="food-card" data-id="3" data-category="halal">
            <img
              src="https://images.unsplash.com/photo-1574484284002-952d92456975?w=400"
              alt="Soupe du jour"
              class="food-image"
            />
            <div class="food-content">
              <div class="food-header">
                <span class="food-price">3.00€</span>
                <button class="add-btn">+</button>
              </div>
              <h3 class="food-name">Soupe du jour</h3>
              <span class="food-tag">Halal</span>
            </div>
          </div>

          <!-- Food Card 4 -->
          <div class="food-card" data-id="4" data-category="vegan">
            <img
              src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400"
              alt="Légumes grillés"
              class="food-image"
            />
            <div class="food-content">
              <div class="food-header">
                <span class="food-price">4.00€</span>
                <button class="add-btn">+</button>
              </div>
              <h3 class="food-name">Légumes grillés</h3>
              <span class="food-tag">Végan</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sidebar -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="sidebar" id="sidebar">
      <button class="sidebar-close" id="sidebarClose">&times;</button>
      <div class="sidebar-content">
        <img
          src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400"
          alt="Food"
          class="sidebar-image"
          id="sidebarImage"
        />

        <div class="sidebar-title-wrapper">
          <span style="font-size: 30px">🇫🇷</span>
          <h2 class="sidebar-title" id="sidebarTitle">Flan aux champignons</h2>
        </div>

        <div class="rating-stars">
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
        </div>
        <p class="rating-text">0 Avis</p>

        <div class="detail-section">
          <h3 class="detail-heading">Brève description</h3>
          <p class="detail-text">Flan aux champignons</p>
        </div>

        <div class="detail-section">
          <h3 class="detail-heading">Ingrédients</h3>
          <p class="detail-text">
            Shiitake, champignon de Paris, échalote, carotte, brocoli, oeuf,
            crème fraîche
          </p>
        </div>

        <div class="detail-section">
          <h3 class="detail-heading">Allergènes</h3>
          <p class="detail-text">Non</p>
        </div>

        <div class="detail-section">
          <h3 class="detail-heading">Conseils de préparation</h3>
          <p class="detail-text">Chauffer 2 minutes au microonde</p>
        </div>

        <div class="detail-section">
          <h3 class="detail-heading">Poids</h3>
          <p class="detail-text">100g</p>
        </div>

        <div class="detail-section">
          <h3 class="detail-heading">Valeurs nutritionnelles</h3>
          <p class="detail-text">For 100g:</p>
          <div class="nutrition-circles">
            <div class="nutrition-item">
              <div class="nutrition-circle">
                <span class="nutrition-value">10</span>
                <span class="nutrition-unit">g</span>
              </div>
              <div class="nutrition-label">Carbs</div>
            </div>
            <div class="nutrition-item">
              <div class="nutrition-circle">
                <span class="nutrition-value">20</span>
                <span class="nutrition-unit">g</span>
              </div>
              <div class="nutrition-label">Proteins</div>
            </div>
          </div>
        </div>

        <div class="detail-section">
          <h3 class="detail-heading">Date d'expiration</h3>
          <p class="detail-text">30 novembre</p>
        </div>

        <button class="add-to-cart-btn">Ajouter au panier</button>
      </div>
    </div>

    <!-- Service Features Section -->
    <section class="service-features">
      <div class="container">
        <!-- First Row -->
        <div class="features-row">
          <!-- Feature 1: Left Side -->
          <div class="feature-item">
            <!-- Content First -->
            <div class="feature-content">
              <h2 class="feature-title">Commande<br />de dernière minute</h2>
              <p class="feature-subtitle">
                Les commandes en ligne sont possibles jusqu'à l'avant-veille 23h
              </p>
              <p class="feature-description">
                Une réunion improvisée ?<br />
                Commandez vos plateaux-repas par téléphone jusqu'au jour même.
              </p>
              <button class="cta-button">Appelez-nous</button>
            </div>

            <!-- Image Below -->
            <div class="feature-image-wrapper">
              <img
                src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=800"
                alt="Commande de dernière minute"
                class="feature-image"
              />
            </div>
          </div>

          <!-- Feature 2: Right Side -->
          <div class="feature-item reverse">
            <!-- Image First -->
            <div class="feature-image-wrapper">
              <img
                src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800"
                alt="Un service traiteur sur mesure"
                class="feature-image"
              />
            </div>

            <!-- Content Below -->
            <div class="feature-content">
              <h2 class="feature-title">Un service traiteur<br />sur mesure</h2>
              <p class="feature-subtitle">
                Notre équipe est à votre disposition pour faire de vos
                événements d'entreprise un moment inoubliable.
              </p>
              <p class="feature-description">
                Cocktail, buffet, petit déjeuner, service à l'assiette,
                animation culinaire, paella géante, brunch... tout est possible
                !
              </p>
              <button class="cta-button">Être recontacté</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial Heading Section -->
    <section class="testimonial-heading-section">
      <div class="testimonial-container">
        <h2 class="main-heading">LA PLAISIR D'AVOIR LE CHOIX</h2>
        <p class="sub-heading">LES PLATS COUP DE COEUR DE NOS CLIENT</p>
      </div>
    </section>

    <!-- Client Carousel Section -->
    <section class="clients-carousel-section">
      <div class="container">
        <div class="carousel-wrapper">
          <div
            id="clientsCarousel"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <!-- Indicators -->
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#clientsCarousel"
                data-bs-slide-to="0"
                class="active"
              ></button>
              <button
                type="button"
                data-bs-target="#clientsCarousel"
                data-bs-slide-to="1"
              ></button>
              <button
                type="button"
                data-bs-target="#clientsCarousel"
                data-bs-slide-to="2"
              ></button>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
              <!-- Slide 1 -->
              <div class="carousel-item active">
                <div class="row g-4">
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400"
                        alt="Bo bun au boeuf"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Bo bun au boeuf</h3>
                        <p class="carousel-card-text">
                          Un délicieux plat vietnamien authentique préparé avec
                          amour par nos chefs.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=400"
                        alt="Tiramisu spéculoos"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Tiramisu spéculoos</h3>
                        <p class="carousel-card-text">
                          Notre tiramisu revisité avec des spéculoos pour une
                          touche originale.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=400"
                        alt="Poulet aux olives"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">
                          Poulet aux olives et grenailles persillées
                        </h3>
                        <p class="carousel-card-text">
                          Un classique méditerranéen riche en saveurs et en
                          couleurs.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Slide 2 -->
              <div class="carousel-item">
                <div class="row g-4">
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400"
                        alt="Pizza italienne"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Pizza italienne</h3>
                        <p class="carousel-card-text">
                          Pizza artisanale préparée avec des ingrédients frais
                          et authentiques.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=400"
                        alt="Salade fraîche"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Salade composée</h3>
                        <p class="carousel-card-text">
                          Une explosion de fraîcheur et de saveurs dans chaque
                          bouchée.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=400"
                        alt="Pâtes carbonara"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Pâtes carbonara</h3>
                        <p class="carousel-card-text">
                          La recette traditionnelle italienne dans toute sa
                          splendeur.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Slide 3 -->
              <div class="carousel-item">
                <div class="row g-4">
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=400"
                        alt="Pancakes"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Pancakes maison</h3>
                        <p class="carousel-card-text">
                          Des pancakes moelleux pour un petit-déjeuner parfait.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1464093515883-ec948246accb?w=400"
                        alt="Burger gourmet"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Burger gourmet</h3>
                        <p class="carousel-card-text">
                          Un burger revisité avec des ingrédients de qualité
                          supérieure.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="carousel-card">
                      <img
                        src="https://images.unsplash.com/photo-1551024506-0bccd828d307?w=400"
                        alt="Dessert"
                        class="carousel-img"
                      />
                      <div class="carousel-card-content">
                        <h3 class="carousel-card-title">Fondant au chocolat</h3>
                        <p class="carousel-card-text">
                          Un dessert chocolaté irrésistible qui fond en bouche.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Controls -->
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#clientsCarousel"
              data-bs-slide="prev"
            >
              <span class="carousel-control-prev-icon"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#clientsCarousel"
              data-bs-slide="next"
            >
              <span class="carousel-control-next-icon"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Trust Section with Logos -->
    <section class="trust-section">
      <div class="container">
        <h2 class="trust-heading">Ils nous font confiance</h2>
      </div>
    </section>
    <!-- Trust Section with Logos -->
    <section class="trust-logo-section">
      <div class="container">
        <div class="logos-wrapper">
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/trust-logo.jpg"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/trust-logo.jpg"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/trust-logo.jpg"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/trust-logo.jpg"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/trust-logo.jpg"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/trust-logo.jpg"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/trust-logo.jpg"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Login Modal Section -->
    <div
        class="modal fade"
        id="exampleModalToggle"
        aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel"
        tabindex="-1"
        >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img
                src="assets/img/logo-2.jpeg"
                width="150"
                alt=""
                class="img-fluid"
              />
              <p class="description fw-normal mt-5 m-0">
                Are you a company and want to access our
                <span class="fw-bold bluecolor-txt">meal trays ?</span>
              </p>
              <p class="description fw-normal">
                Log in
                <a href="#" class="fw-bold bluecolor-txt">here</a>
              </p>

              <div>
                <button class="btn border login-btn">
                  <img src="assets/img/google.png" alt="" class="img-fluid" />
                  <span>Sign in with Google</span>
                </button>
              </div>

              <div class="form-group mt-4">
                <input
                  type="email"
                  placeholder="E-mail address"
                  class="form-control subheading py-3 text-secondary fw-normal"
                />
              </div>
              <div class="form-group mt-4">
                <div class="password-container">
                  <input
                    type="password"
                    class="password-input form-control subheading py-3 text-secondary fw-normal"
                    placeholder="Password"
                  />
                  <i
                    class="far fa-eye password-toggle pe-2"
                    onclick="togglePasswordVisibility(this)"
                  ></i>
                </div>
              </div>
              <button
                class="btn btn-warning mt-3 mb-5 w-100 text-white rounded-5 p-2"
              >
                Login in
              </button>

              <a href="#" class="email-hover subheading"
                >Forget your password?</a
              >
              <p class="description text-secondary mt-4 fw-normal">
                Not registered yet?
                <a
                  href="#"
                  class="email-hover subheading fw-normal"
                  data-bs-target="#exampleModalToggle2"
                  data-bs-toggle="modal"
                  >Create my account</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End login modal section -->

    <!-- Sign up modal section -->
    <div
        class="modal fade"
        id="exampleModalToggle2"
        aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1"
        >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img
                src="assets/img/logo-2.jpeg"
                width="150"
                alt=""
                class="img-fluid"
              />
              <p class="description fw-normal mt-4 m-0">
                Already registered?
                <a
                  href="#"
                  data-bs-target="#exampleModalToggle"
                  data-bs-toggle="modal"
                  class="fw-bold bluecolor-txt"
                  >Log in</a
                >
              </p>

              <div class="row">
                <div class="col-md-6 mt-3">
                  <div class="form-group mt-4">
                    <input
                      type="text"
                      placeholder="First Name"
                      class="form-control subheading py-3 text-secondary fw-normal"
                    />
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group mt-4">
                    <input
                      type="text"
                      placeholder="Name"
                      class="form-control subheading py-3 text-secondary fw-normal"
                    />
                  </div>
                </div>
              </div>
              <div class="form-group mt-4">
                <input
                  type="email"
                  placeholder="E-mail"
                  class="form-control subheading py-3 text-secondary fw-normal"
                />
              </div>
              <div class="form-group mt-4">
                <div class="password-container">
                  <input
                    type="password"
                    class="password-input form-control subheading py-3 text-secondary fw-normal"
                    placeholder="Password"
                  />
                  <i
                    class="far fa-eye password-toggle pe-2"
                    onclick="togglePasswordVisibility(this)"
                  ></i>
                </div>
              </div>
              <div class="form-group mt-4">
                <input
                  type="tel"
                  placeholder="Phone"
                  class="form-control subheading py-3 text-secondary fw-normal"
                />
              </div>
              <div class="form-group mt-4">
                <input
                  type="text"
                  placeholder="Delivery Address"
                  class="form-control subheading py-3 text-secondary fw-normal"
                />
              </div>
              <div class="form-group mt-4">
                <textarea
                  rows="2"
                  placeholder="How did you find about Tastiie?"
                  class="form-control subheading py-3 text-secondary fw-normal"
                ></textarea>
              </div>
              <button
                class="btn btn-warning mt-3 mb-5 w-100 text-white rounded-5 p-2"
              >
                Create an Account
              </button>

              <div class="form-check d-flex gap-2 justify-content-center">
                <input
                  class="form-check-input subheading"
                  type="checkbox"
                  value=""
                  id="defaultCheck1"
                />
                <label
                  class="form-check-label subheading fw-normal"
                  for="defaultCheck1"
                >
                  Recieve the daily menus
                </label>
              </div>

              <p class="description text-secondary mt-4 fw-normal m-0">
                By creating your account, you accept our
              </p>
              <p class="description text-secondary fw-normal">
                <a href="#" class="email-hover subheading fw-normal"
                  >general conditions</a
                >
                and certify that you are of legal age.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection