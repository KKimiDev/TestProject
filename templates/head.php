<!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <!-- Dein custom CSS -->
  <style>
    /* Hier kommt dein gesamter CSS-Code aus deiner Vorlage rein */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #faf8f5;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .profile-container {
      max-width: 800px;
      margin: auto;
      margin-top: 20px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      padding: 30px;
    }

    /* ... restliche CSS-Klassen hier ... */
    .zsm {
      display: flex;
      align-items: center;
    }

    .folgen {
      margin: 10%;
      color: #aaa;
      font-style: italic;
    }

    /* Zusätzliche Styles für Sidebar und Layout */
    main {
      min-height: 80vh;
    }

    footer {
      background-color: #f9a825;
      color: white;
      padding: 15px 0;
      text-align: center;
      font-weight: 600;
    }

    .sidebar {
      background: white;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .sidebar h5 {
      border-bottom: 2px solid #f9a825;
      padding-bottom: 8px;
      margin-bottom: 15px;
      font-weight: 700;
      color: #6d4c41;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      margin-bottom: 10px;
    }

    .sidebar ul li a {
      color: #5d4037;
      text-decoration: none;
      font-weight: 600;
    }

    .sidebar ul li a:hover {
      color: #f9a825;
      text-decoration: underline;
    }
    .B-Rund{
      background-color: #f9a825;
      padding: 12px 12px;
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      border-radius: 12px;
    }
    .B-Rund:hover{
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
      padding: 12.25px 12.25px;
    }
    .scroll-container {
      width: 100%;              
      overflow-x: auto;         
      white-space: nowrap;      
      border: 1px solid #ccc;
      padding-bottom: 5px;
      scrollbar-width: medium;    
    }
    .scroll-container::-webkit-scrollbar {
      height: 10px;             
    }
    .scroll-container::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 4px;
    }
    .scroll-container::-webkit-scrollbar-track {
      background: #eee;
    }
    .scroll-container img {
      display: inline-block;
      width: 300px;             
      height: 200px;
      object-fit: cover;
      margin-right: 10px;
      border-radius: 4px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    .scroll-container img:last-child {
      margin-right: 0;
    }
    .scroll-container img:hover {
      transform: scale(1.05);
    }
    .flex-bilder{
      display: flex;
    }
  </style>