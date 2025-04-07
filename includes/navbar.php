<?php
session_start();
?>
<!-- Accessibility skip link -->
<a href="#main-content" class="skip-link">Skip to content</a>

<!-- Top Bar -->
<div class="bg-gradient-to-r from-blue-800 to-indigo-900 text-white py-2">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center flex-wrap">
      <div class="flex items-center space-x-4 text-sm">
        <div>
          <i class="far fa-clock mr-1"></i>
          <span id="current-date">Tuesday, March 11, 2025</span>
        </div>
        <div>
          <i class="fas fa-globe-americas mr-1"></i>
          <span>Local News</span>
        </div>
      </div>
      <div class="flex items-center space-x-4" style="z-index: 9999;">
        <div class="hidden sm:flex space-x-3 text-sm">
          <?php if (isset($_SESSION['user_id'])): ?>
            <!-- User is logged in, show user info/dropdown -->
            <div class="user-dropdown">
              <button class="flex items-center hover:text-blue-300 transition">
                <span><?php echo htmlspecialchars($_SESSION['username'] ?? $_SESSION['user_name'] ?? 'User'); ?></span>
                <i class="fas fa-chevron-down ml-1 text-xs"></i>
              </button>
              <div class="user-dropdown-menu">
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'editor')): ?>
                  <a href="admin/dashboard.php" class="user-dropdown-item">
                    <i class="fas fa-tachometer-alt mr-2 text-blue-500"></i> Dashboard
                  </a>
                <?php endif; ?>
                <a href="profile.php" class="user-dropdown-item">
                  <i class="fas fa-user-circle mr-2 text-blue-500"></i> My Profile
                </a>
                <a href="my-articles.php" class="user-dropdown-item">
                  <i class="fas fa-newspaper mr-2 text-blue-500"></i> My Articles
                </a>
                <div class="user-dropdown-divider"></div>
                <a href="logout.php" class="user-dropdown-item">
                  <i class="fas fa-sign-out-alt mr-2 text-red-500"></i> Logout
                </a>
              </div>
            </div>
          <?php else: ?>
            <!-- User is not logged in, show login/register links -->
            <a href="login.php" class="hover:text-blue-300 transition flex items-center">
              <i class="fas fa-sign-in-alt mr-1"></i> Sign In
            </a>
            <span class="text-gray-400">|</span>
            <a href="register.php" class="hover:text-blue-300 transition flex items-center">
              <i class="fas fa-user-plus mr-1"></i> Register
            </a>
          <?php endif; ?>
        </div>
        <div class="flex space-x-3">
          <a href="#" class="text-gray-300 hover:text-white transition" aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-300 hover:text-white transition" aria-label="Twitter">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-300 hover:text-white transition" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-300 hover:text-white transition" aria-label="YouTube">
            <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Main Navigation -->
<header class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
  <div class="container mx-auto px-4">
    <nav class="flex justify-between items-center py-3">
      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="index.php" class="flex items-center group">
          <div class="text-white text-2xl font-bold rounded-lg mr-2 transition-transform duration-300 group-hover:rotate-3">
            <img src="assets/images/logo.webp" alt="Lion Of Web Logo" class="w-12 h-12 rounded-full shadow-md">
          </div>
          <div class="flex flex-col">
            <span class="text-2xl font-bold text-gray-800">Lion Of<span class="text-blue-600"> Web</span></span>
            <span class="text-xs text-gray-500 -mt-1">Your Source for Everything</span>
          </div>
        </a>
      </div>

      <!-- Search bar for desktop -->
      <div class="hidden md:block w-1/3">
        <form id="search-form" action="search.php" method="get" class="relative">
          <input
            type="text"
            id="search-input"
            name="query"
            placeholder="Search for news, articles..."
            class="w-full py-2 pl-4 pr-10 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
          <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-600">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>

      <!-- Desktop Navigation Menu -->
      <div class="hidden lg:flex items-center space-x-1">
        <a href="index.php" class="px-3 py-2 rounded-md hover:bg-blue-50 hover:text-blue-600 font-medium text-gray-800 transition-colors duration-200">Home</a>

        <!-- Dropdown: News -->
        <div class="dropdown">
          <button class="dropdown-trigger px-3 py-2 rounded-md hover:bg-blue-50 hover:text-blue-600 font-medium text-gray-800 flex items-center transition-colors duration-200">
            News <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div class="dropdown-menu w-48">
            <div class="py-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
              <a href="news-english.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 hover:text-blue-600">English News</a>
              <a href="news-urdu.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 hover:text-blue-600">Urdu News</a>
            </div>
          </div>
        </div>

        <!-- Categories Dropdown -->
        <div class="dropdown">
          <button class="dropdown-trigger px-3 py-2 rounded-md hover:bg-blue-50 hover:text-blue-600 font-medium text-gray-800 flex items-center transition-colors duration-200">
            Categories <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div class="dropdown-menu responsive-dropdown">
            <div class="py-2 px-4 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
              <div class="grid-container">
                <!-- Business & Finance Column -->
                <div class="px-2">
                  <h4 class="font-semibold text-blue-600 mb-2 px-2 border-l-4 border-blue-600 pl-2">Business & Finance</h4>
                  <a href="business.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Business</a>
                  <a href="crypto.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Cryptocurrency</a>
                  <a href="economy.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Economy</a>
                  <a href="finance.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Personal Finance</a>
                  <a href="jobs.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Jobs</a>
                </div>

                <!-- Lifestyle Column -->
                <div class="px-2">
                  <h4 class="font-semibold text-blue-600 mb-2 px-2 border-l-4 border-blue-600 pl-2">Lifestyle</h4>
                  <a href="health.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Health</a>
                  <a href="women.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Women</a>
                  <a href="food.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Food</a>
                  <a href="recipes.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Recipes</a>
                  <a href="travel.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Travel</a>
                </div>

                <!-- Tech & More Column -->
                <div class="px-2">
                  <h4 class="font-semibold text-blue-600 mb-2 px-2 border-l-4 border-blue-600 pl-2">Tech & More</h4>
                  <a href="mobile.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Mobile</a>
                  <a href="tech.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Technology</a>
                  <a href="education.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Education</a>
                  <a href="sports.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Sports</a>
                  <a href="autos.php" class="block px-2 py-1.5 text-gray-800 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-colors">Autos</a>
                </div>
              </div>
              <div class="border-t border-gray-200 mt-3 pt-2 text-center">
                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                  View All Categories <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        <a href="currency.php" class="px-3 py-2 rounded-md hover:bg-blue-50 hover:text-blue-600 font-medium text-gray-800 transition-colors duration-200">Currency</a>
        <a href="recipes.php" class="px-3 py-2 rounded-md hover:bg-blue-50 hover:text-blue-600 font-medium text-gray-800 transition-colors duration-200">Recipes</a>
        <a href="contact.php" class="px-3 py-2 rounded-md hover:bg-blue-50 hover:text-blue-600 font-medium text-gray-800 transition-colors duration-200">Contact</a>
      </div>

      <!-- Mobile Menu Button -->
      <div class="flex items-center lg:hidden space-x-4">
        <button id="search-mobile-button" class="text-gray-700 hover:text-blue-600 focus:outline-none p-2 rounded-full hover:bg-gray-100 transition-colors" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
        <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none p-2 rounded-full hover:bg-gray-100 transition-colors" aria-label="Menu">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </nav>
  </div>
</header>

<!-- Mobile Search (Hidden by default) -->
<div id="mobile-search" class="bg-white py-3 px-4 shadow-md hidden">
  <form action="search.php" method="get">
    <div class="relative">
      <input
        type="text"
        name="query"
        placeholder="Search for news, articles..."
        class="w-full py-2 pl-4 pr-10 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
      <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-600">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </form>
</div>

<!-- Mobile Menu (Off-canvas) -->
<div id="mobile-menu" class="fixed top-0 left-0 bottom-0 w-4/5 max-w-xs bg-white shadow-xl z-50 mobile-menu overflow-y-auto">
  <div class="p-4 border-b border-gray-200 bg-gradient-to-r from-blue-800 to-indigo-900 text-white">
    <div class="flex justify-between items-center">
      <a href="index.php" class="flex items-center">
        <div class="mr-2">
          <img src="assets/images/logo.webp" alt="Lion Of Web Logo" class="w-10 h-10 rounded-full">
        </div>
        <span class="text-xl font-bold">Lion Of<span class="text-blue-300"> Web</span></span>
      </a>
      <button id="close-mobile-menu" class="text-white hover:text-red-400 focus:outline-none transition-colors p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>

  <nav class="p-4">
    <ul>
      <li class="mb-1">
        <a href="index.php" class="block px-3 py-2 rounded-md font-medium text-gray-800 bg-blue-50 text-blue-600">Home</a>
      </li>
      <li class="mb-1">
        <div class="mobile-dropdown">
          <button class="mobile-dropdown-trigger w-full text-left flex justify-between items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
            News
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div class="mobile-dropdown-menu hidden pl-4 mt-1">
            <a href="news-english.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">English News</a>
            <a href="news-urdu.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Urdu News</a>
          </div>
        </div>
      </li>
      <li class="mb-1">
        <div class="mobile-dropdown">
          <button class="mobile-dropdown-trigger w-full text-left flex justify-between items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
            Categories
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div class="mobile-dropdown-menu hidden pl-4 mt-1">
            <div class="mb-2">
              <span class="block text-xs font-semibold text-blue-600 px-3 py-1">Business & Finance</span>
              <a href="business.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Business</a>
              <a href="crypto.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Cryptocurrency</a>
              <a href="finance.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Personal Finance</a>
            </div>
            <div class="mb-2">
              <span class="block text-xs font-semibold text-blue-600 px-3 py-1">Lifestyle</span>
              <a href="health.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Health</a>
              <a href="food.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Food</a>
              <a href="recipes.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Recipes</a>
            </div>
            <div>
              <span class="block text-xs font-semibold text-blue-600 px-3 py-1">Tech & More</span>
              <a href="tech.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Technology</a>
              <a href="mobile.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Mobile</a>
              <a href="sports.php" class="block px-3 py-2 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Sports</a>
            </div>
          </div>
        </div>
      </li>
      <li class="mb-1">
        <a href="currency.php" class="block px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Currency</a>
      </li>
      <li class="mb-1">
        <a href="recipes.php" class="block px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Recipes</a>
      </li>
      <li class="mb-1">
        <a href="contact.php" class="block px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">Contact</a>
      </li>
    </ul>
  </nav>

  <div class="border-t border-gray-200 p-4">
    <div class="flex flex-col space-y-3">
      <?php if (isset($_SESSION['user_id'])): ?>
        <!-- User is logged in, show personalized options -->
        <div class="flex items-center px-3 py-2 mb-2 bg-gray-50 rounded-md">
          <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3 shadow-sm">
            <?php if (!empty($_SESSION['user_avatar'])): ?>
              <img class="w-10 h-10 rounded-full object-cover" src="<?php echo $_SESSION['user_avatar']; ?>" alt="<?php echo htmlspecialchars($_SESSION['username'] ?? $_SESSION['user_name'] ?? 'User'); ?>">
            <?php else: ?>
              <i class="fas fa-user text-blue-500"></i>
            <?php endif; ?>
          </div>
          <div>
            <div class="font-medium"><?php echo htmlspecialchars($_SESSION['username'] ?? $_SESSION['user_name'] ?? 'User'); ?></div>
            <div class="text-sm text-gray-500"><?php echo ucfirst($_SESSION['user_role'] ?? 'User'); ?></div>
          </div>
        </div>

        <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'editor')): ?>
          <a href="admin/dashboard.php" class="flex items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
            <i class="fas fa-tachometer-alt mr-2 text-blue-500"></i> Dashboard
          </a>
        <?php endif; ?>

        <a href="profile.php" class="flex items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
          <i class="fas fa-user-circle mr-2 text-blue-500"></i> My Profile
        </a>

        <a href="my-articles.php" class="flex items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
          <i class="fas fa-newspaper mr-2 text-blue-500"></i> My Articles
        </a>

        <a href="logout.php" class="flex items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
          <i class="fas fa-sign-out-alt mr-2 text-red-500"></i> Logout
        </a>
      <?php else: ?>
        <!-- User is not logged in, show login/register options -->
        <a href="login.php" class="flex items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
          <i class="fas fa-sign-in-alt mr-2 text-blue-500"></i> Sign In
        </a>
        <a href="register.php" class="flex items-center px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-blue-50 hover:text-blue-600 transition-colors">
          <i class="fas fa-user-plus mr-2 text-blue-500"></i> Register
        </a>
      <?php endif; ?>

      <div class="flex space-x-3 px-3 py-2 mt-2">
        <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors" aria-label="Facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors" aria-label="Twitter">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors" aria-label="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors" aria-label="YouTube">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Overlay for mobile menu -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

<style>
  /* Responsive dropdown styles */
  .responsive-dropdown {
    position: absolute;
    left: 0;
    min-width: 250px;
    max-width: 100vw;
    max-height: calc(100vh - 150px);
    /* Prevent going off screen vertically */
    overflow-y: auto;
    z-index: 50;
  }

  /* Position the dropdown relative to the viewport */
  @media (min-width: 768px) {
    .responsive-dropdown {
      width: auto;
      max-width: min(650px, calc(100vw - 20px));
    }
  }

  /* Improved grid layout */
  .grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1rem;
  }

  /* Single column on very small screens */
  @media (max-width: 500px) {
    .grid-container {
      grid-template-columns: 1fr;
    }
  }

  /* Add some padding to ensure spacing is consistent */
  .grid-container>div {
    padding: 0.5rem;
  }

  /* Ensure the dropdown doesn't go off screen */
  @media (max-width: 992px) {
    .dropdown:last-child .responsive-dropdown {
      left: auto;
      right: 0;
    }
  }

  /* Core styles for smooth dropdown behavior */
  .mobile-menu {
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
  }

  .mobile-menu.active {
    transform: translateX(0);
  }

  .skip-link {
    position: absolute;
    left: -999px;
    width: 1px;
    height: 1px;
    overflow: hidden;
  }

  .skip-link:focus {
    left: 0;
    top: 0;
    width: auto;
    height: auto;
    padding: 10px;
    background: white;
    color: black;
    z-index: 1000;
  }

  /* Enhanced dropdown styling */
  .user-dropdown {
    position: relative;
  }

  .user-dropdown-menu {
    position: absolute;
    right: 0;
    width: 200px;
    margin-top: 8px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: opacity 0.2s ease, transform 0.2s ease, visibility 0s linear 0.2s;
    z-index: 50;
    border: 1px solid rgba(229, 231, 235, 0.8);
  }

  .user-dropdown:hover .user-dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s linear 0s;
  }

  /* Add a invisible extender to prevent mouseout */
  .user-dropdown-menu::before {
    content: '';
    position: absolute;
    top: -16px;
    left: 0;
    right: 0;
    height: 16px;
    background-color: transparent;
  }

  /* Menu items styling */
  .user-dropdown-item {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    color: #4b5563;
    font-size: 0.875rem;
    transition: all 0.15s ease;
  }

  .user-dropdown-item:hover {
    background-color: #EBF5FF;
    color: #3B82F6;
  }

  .user-dropdown-item:first-child {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }

  .user-dropdown-item:last-child {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
  }

  .user-dropdown-divider {
    height: 1px;
    margin: 4px 0;
    background-color: #e5e7eb;
  }

  /* Improved general dropdown styling */
  .dropdown {
    position: relative;
  }

  .dropdown-menu {
    position: absolute;
    left: 0;
    margin-top: 8px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: opacity 0.2s ease, transform 0.2s ease, visibility 0s linear 0.2s;
    z-index: 50;
    border: 1px solid rgba(229, 231, 235, 0.8);
    width: auto;
    max-width: 100%;
  }

  .dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s linear 0s;
  }

  /* Add a invisible extender */
  .dropdown-menu::before {
    content: '';
    position: absolute;
    top: -16px;
    left: 0;
    right: 0;
    height: 16px;
    background-color: transparent;
  }

  /* Mobile styling improvements */
  #mobile-menu-button,
  #search-mobile-button,
  #close-mobile-menu {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* Make sure SVG icons are visible */
  #mobile-menu-button svg,
  #search-mobile-button svg,
  #close-mobile-menu svg {
    stroke-width: 2;
  }

  /* Add animation to the mobile menu toggle */
  #mobile-menu-button:active svg {
    transform: scale(0.9);
  }

  /* Make sure the sidebar has a good z-index */
  #mobile-menu {
    z-index: 999;
  }

  /* Larger hit area for mobile close button */
  #close-mobile-menu {
    padding: 8px;
    border-radius: 50%;
    margin: -8px;
  }

  #close-mobile-menu:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Set current date
    const date = new Date();
    const options = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };

    const currentDateElement = document.getElementById('current-date');
    if (currentDateElement) {
      currentDateElement.textContent = date.toLocaleDateString('en-US', options);
    }

    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenuButton = document.getElementById('close-mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

    if (mobileMenuButton && mobileMenu && mobileMenuOverlay) {
      mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.add('active');
        mobileMenuOverlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      });
    }

    if (closeMenuButton && mobileMenu && mobileMenuOverlay) {
      closeMenuButton.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      });
    }

    if (mobileMenuOverlay && mobileMenu) {
      mobileMenuOverlay.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      });
    }

    // Mobile search functionality
    const searchMobileButton = document.getElementById('search-mobile-button');
    const mobileSearch = document.getElementById('mobile-search');

    if (searchMobileButton && mobileSearch) {
      searchMobileButton.addEventListener('click', function() {
        mobileSearch.classList.toggle('hidden');
      });
    }

    // Mobile dropdown functionality
    const mobileDropdownTriggers = document.querySelectorAll('.mobile-dropdown-trigger');

    mobileDropdownTriggers.forEach(trigger => {
      trigger.addEventListener('click', function() {
        const menu = this.nextElementSibling;
        const icon = this.querySelector('svg');

        if (!menu) return;

        this.classList.toggle('active');
        menu.classList.toggle('hidden');

        // No need to change icon class since we're using SVG rotation via CSS
      });
    });

    // Add active class to current page link
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('nav a');

    navLinks.forEach(link => {
      const linkPath = link.getAttribute('href');

      if (linkPath && currentPath.endsWith(linkPath)) {
        link.classList.add('bg-blue-50', 'text-blue-600');
      }
    });

    // Handle window resize events
    window.addEventListener('resize', function() {
      const isDesktop = window.innerWidth >= 1024; // lg breakpoint

      // Hide mobile search on resize to desktop
      if (isDesktop && mobileSearch && !mobileSearch.classList.contains('hidden')) {
        mobileSearch.classList.add('hidden');
      }

      // Close mobile menu on resize to desktop
      if (isDesktop && mobileMenu && mobileMenu.classList.contains('active')) {
        mobileMenu.classList.remove('active');
        if (mobileMenuOverlay) {
          mobileMenuOverlay.classList.add('hidden');
        }
        document.body.classList.remove('overflow-hidden');
      }

      // Adjust dropdown positions on resize to ensure they stay in viewport
      const dropdowns = document.querySelectorAll('.dropdown');
      dropdowns.forEach(dropdown => {
        const menu = dropdown.querySelector('.dropdown-menu');
        if (menu) {
          // Reset any custom positioning
          menu.style.left = '';
          menu.style.right = '';

          // Check if menu would go off-screen
          const rect = menu.getBoundingClientRect();
          if (rect.right > window.innerWidth) {
            menu.style.left = 'auto';
            menu.style.right = '0';
          }
        }
      });
    });

    // Ensure dropdowns don't go off-screen on initial load
    document.querySelectorAll('.dropdown').forEach(dropdown => {
      dropdown.addEventListener('mouseenter', function() {
        const menu = this.querySelector('.dropdown-menu');
        if (menu) {
          setTimeout(() => {
            const rect = menu.getBoundingClientRect();
            if (rect.right > window.innerWidth) {
              menu.style.left = 'auto';
              menu.style.right = '0';
            }
          }, 0);
        }
      });
    });
  });
</script>