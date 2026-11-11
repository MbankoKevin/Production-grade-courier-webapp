<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      background: #f4f6f9;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Sidebar styles */
    #sidebar {
      width: 250px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      z-index: 1050;
      background: linear-gradient(180deg, #0d6efd 0%, #0044cc 100%);
      color: white;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
    }
    #sidebar.collapsed {
      transform: translateX(-250px);
    }

    #sidebar .sidebar-header {
      background: rgba(255, 255, 255, 0.1);
      padding: 1rem;
    }

    #sidebar .sidebar-header h5 {
      color: #fff;
      font-weight: bold;
    }

    #sidebar .nav-item {
      margin: 0.3rem 0;
    }

    #sidebar .nav-link {
      color: #dce3f1;
      padding: 0.7rem 1rem;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    #sidebar .nav-link i {
      font-size: 1.1rem;
      width: 20px;
      text-align: center;
    }

    #sidebar .nav-link:hover,
    #sidebar .nav-link.active {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      text-decoration: none;
      transform: translateX(4px);
    }

    /* Content wrapper shifts when sidebar is visible */
    #content {
      margin-left: 250px;
      transition: margin-left 0.3s ease;
    }
    #content.expanded {
      margin-left: 0;
    }

    /* Hamburger button */
    #sidebarToggle {
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1100;
      background: #0d6efd;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 1.2rem;
      box-shadow: 0 3px 6px rgba(0,0,0,0.2);
      transition: background 0.3s ease;
    }
    #sidebarToggle:hover {
      background: #0044cc;
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
      #sidebar {
        position: fixed;
        height: 100vh;
        top: 0;
        left: 0;
        transform: translateX(-250px); /* Hidden by default */
      }
      #sidebar.show {
        transform: translateX(0); /* Slide in */
      }
      #content {
        margin-left: 0; /* Don’t push content on mobile */
      }
    }
  </style>
</head>
<body>

  <!-- Hamburger Toggle -->
  <button id="sidebarToggle">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <nav id="sidebar" class="vh-100 position-fixed">
    <div class="sidebar-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">🚀 Dashboard</h5>
      <button class="btn btn-sm btn-light text-dark d-md-none" id="closeSidebar">
        <i class="fa fa-times"></i>
      </button>
    </div>
    <ul class="nav flex-column px-3 pt-3">
      <li class="nav-item">
        <a href="home.php" class="nav-link active">
          <i class="fa fa-tachometer-alt"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="add_user.php" class="nav-link">
          <i class="fa fa-user-plus"></i> New User
        </a>
      </li>
      <li class="nav-item">
        <a href="view_user.php" class="nav-link">
          <i class="fa fa-users"></i> View Users
        </a>
      </li>
      <li class="nav-item">
        <a href="new_tracking.php" class="nav-link">
          <i class="fa fa-truck"></i> New Tracking
        </a>
      </li>
      <li class="nav-item">
        <a href="view_tracking.php" class="nav-link">
          <i class="fa fa-list"></i> View Tracking
        </a>
      </li>
      <li class="nav-item">
        <a href="mail.php" class="nav-link">
          <i class="fa fa-envelope"></i> Mail Jk
        </a>
      </li>
      <li class="nav-item">
        <a href="editmap.php" class="nav-link">
          <i class="fa fa-map-marker-alt"></i> Edit Map
        </a>
      </li>
    </ul>
  </nav>

  <!-- Page Content -->
  <div id="content" class="p-4">
    <h2>Welcome to Cargo Dashboard</h2>
    <p>This is your main content area.</p>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const closeBtn = document.getElementById('closeSidebar');
    const content = document.getElementById('content');
    const links = document.querySelectorAll('.nav-link');

    // Toggle sidebar open/close
    toggleBtn.addEventListener('click', () => {
      if (window.innerWidth <= 768) {
        sidebar.classList.toggle('show'); // Mobile toggle
      } else {
        sidebar.classList.toggle('collapsed'); // Desktop collapse
        content.classList.toggle('expanded');
      }
    });

    // Close button inside sidebar (mobile only)
    closeBtn.addEventListener('click', () => {
      sidebar.classList.remove('show');
    });

    // Highlight active link
    links.forEach(link => {
      link.addEventListener('click', () => {
        links.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        if (window.innerWidth <= 768) {
          sidebar.classList.remove('show');
        }
      });
    });

    // Close sidebar when clicking outside it (mobile only)
    document.addEventListener('click', (e) => {
      if (window.innerWidth <= 768) {
        if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
          sidebar.classList.remove('show');
        }
      }
    });
  </script>
</body>
</html>
