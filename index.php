<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "campus_system");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch latest announcements
$announcements = $conn->query(
    "SELECT * FROM announcements ORDER BY created_at DESC LIMIT 3"
);

// Fetch latest campus map
$map = $conn->query(
    "SELECT * FROM campus_map_updates ORDER BY created_at DESC LIMIT 1"
);
$latestMap = $map ? $map->fetch_assoc() : null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Campus Safety System</title>
    <link rel="stylesheet" href="style.css">

    <style>
body.bg { margin: 0; 
          font-family: "Segoe UI", Arial, sans-serif; 
          background: url("admin/background.jpg") no-repeat center fixed; 
          background-size: cover; min-height: 100vh; }
        /* MAIN CONTAINER */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px 40px;
}
.page-header { text-align: center; 
               margin-bottom: 35px; 
            } 
.page-header h1 { position: relative; 
                  display: inline-block; 
                  font-size: 55px; 
                  font-weight: 800; 
                  letter-spacing: 1px; 
                  margin-bottom: 8px; 
                  color: white; z-index: 1; 
                  padding: 12px 24px; }
.page-header h1::before { content: ""; 
                          position: absolute; 
                          inset: 0; 
                          background: linear-gradient(90deg, blue ,purple ); 
                          border-radius: 12px 12px 18px 18px; /* tab feel */ 
                          z-index: -1;
                         } 
.subtitle { font-size: 30px; 
            font-weight: 800; 
            color: black; }
announcement-box h2 { font-size: 22px; 
                      margin-bottom: 12px; 
                      color: #1E3A8A;
                    } 
.announcement h3 { font-size: 16px; 
                   margin-bottom: 4px; 
                } 
.announcement p { font-size: 14px; 
                  color: #374151; s
                } 
.announcement small { font-size: 12px; 
                      color: #6B7280; 
                    } 
.map-box h2 { font-size: 22px; 
              margin-bottom: 12px; 
              color: #1E3A8A; 
            } .
map-box p { font-size: 24px; 
        } 
.map-box img { max-width: 100%; 
               max-height: 520px; 
               object-fit: contain; 
               display: block; 
               margin: 0 auto 15px auto; 
               border-radius: 10px; }
/* ROLE SECTION */
.roles {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 24px;
    flex-wrap: wrap;
    margin: 40px 0;
}

/* ROLE CARDS */
.card.role {
    width: 180px;
    padding: 22px 20px;
    text-align: center;
    font-size: 18px;
    font-weight: 700;
    text-decoration: none;
    color: #1F2937;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}

.card.role:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 18px 40px rgba(0,0,0,0.3);
}

/* ANNOUNCEMENT & MAP CARDS */
.card.announcement-box {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 18px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
}

/* ANNOUNCEMENT ITEMS */
.announcement {
    padding: 12px 0;
    border-bottom: 1px solid #E5E7EB;
}

.announcement:last-child {
    border-bottom: none;
}

/* TOP ACTION BUTTON */
.top-action {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
}

/* MOBILE FRIENDLY */
@media (max-width: 768px) {
    .page-header h1 {
        font-size: 40px;
    }

    .subtitle {
        font-size: 22px;
    }

    .card.role {
        width: 100%;
        max-width: 260px;
    }
}
/* BEAUTIFUL COMPLAINT BUTTON */
.complaint-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    color: #fff;
    border-radius: 14px;
    background: linear-gradient(90deg, #2563EB, #7C3AED);
    box-shadow: 0 12px 28px rgba(0,0,0,0.25);
    transition: all 0.3s ease;
}

.complaint-btn:hover {
    transform: translateY(-3px) scale(1.03);
    box-shadow: 0 18px 40px rgba(0,0,0,0.35);
    background: linear-gradient(90deg, #1D4ED8, #6D28D9);
}

.complaint-btn:active {
    transform: translateY(0) scale(0.98);
}


    </style>
</head>

<body class="bg">

<div class="page-header">
    <h1>CAMPUS SAFETY SYSTEM</h1>
    <p class="subtitle">Choose Your Role</p>
</div>

<div class="container">

    <div class="top-action">

    <a href="create_complaint.php" class="complaint-btn">
    📝 Create Complaint
</a>

</div>


    <!-- ROLE SELECTION -->
    <div class="roles">
        <a href="admin/login.php" class="card role">👩‍💼 Admin</a>
        <a href="auth/staff_login.php" class="card role">👨‍🏫 Staff</a>
        <a href="visitor/index.php" class="card role">👫 Visitor</a>
        <a href="auth/student_login.php" class="card role">🎓 Student</a>
    </div>

    <!-- ANNOUNCEMENTS -->
    <div class="card announcement-box">

        <h2>📢 Latest Announcements</h2>

        <?php if ($announcements && $announcements->num_rows > 0) { ?>
            <?php while ($row = $announcements->fetch_assoc()) { ?>
                <div class="announcement">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                    <small><?php echo $row['created_at']; ?></small>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No announcements available.</p>
        <?php } ?>
    </div>

    <!-- CAMPUS MAP -->
    <?php if ($latestMap) { ?>
    <div class="card announcement-box map-box">

        <h2>🗺️ Latest Campus Map</h2>

        <img src="uploads/<?php echo $latestMap['map_image']; ?>" alt="Campus Map" style="width:100%;border-radius:10px;">

        <p><strong>Emergency Exits:</strong><br>
        <?php echo nl2br(htmlspecialchars($latestMap['emergency_exits'])); ?></p>

        <p><strong>Safety Zones:</strong><br>
        <?php echo nl2br(htmlspecialchars($latestMap['safety_zones'])); ?></p>

        <p><strong>Effective Date:</strong>
        <?php echo $latestMap['effective_date']; ?></p>
    </div>
    <?php } ?>

</div>
</div> 

</body>
</html>
