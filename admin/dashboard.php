<?php

require_once '../includes/auth.php';

requireRole('Admin');

require_once '../includes/db.php';

require_once '../includes/header.php';

require_once '../includes/navbar.php';

?>

<main class="dashboard-page">

    <div class="dashboard-container">


        <!-- ==========================
             ADMIN WELCOME
        =========================== -->

        <section class="dashboard-header">

            <div>

                <span class="dashboard-label">
                    ADMIN PANEL
                </span>

                <h1>
                    Admin Dashboard
                </h1>

                <p>

                    Welcome back,

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $_SESSION['username'],
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        ?>
                    </strong>

                    👋

                </p>

            </div>

            <a
                href="../logout.php"
                class="logout-btn"
            >
                Logout
            </a>

        </section>


        <!-- ==========================
             DASHBOARD CARDS
        =========================== -->

        <section class="dashboard-grid">


            <!-- STUDENTS -->

            <article class="dashboard-card">

                <div class="card-icon">
                    👨‍🎓
                </div>

                <h2>
                    Students
                </h2>

                <p>
                    Add, edit, delete and search
                    student records.
                </p>

                <a
                    href="students.php"
                    class="dashboard-btn"
                >
                    Manage Students
                    <span>→</span>
                </a>

            </article>


            <!-- SUBJECTS -->

            <article class="dashboard-card">

                <div class="card-icon">
                    📚
                </div>

                <h2>
                    Subjects
                </h2>

                <p>
                    Manage the subjects used
                    for attendance.
                </p>

                <a
                    href="subjects.php"
                    class="dashboard-btn"
                >
                    Manage Subjects
                    <span>→</span>
                </a>

            </article>


            <!-- ATTENDANCE -->

            <article class="dashboard-card">

                <div class="card-icon">
                    📊
                </div>

                <h2>
                    Attendance
                </h2>

                <p>
                    View attendance records
                    and attendance history.
                </p>

                <a
                    href="attendance.php"
                    class="dashboard-btn"
                >
                    View Attendance
                    <span>→</span>
                </a>

            </article>


            <!-- TEACHERS -->

            <article class="dashboard-card">

                <div class="card-icon">
                    👨‍🏫
                </div>

                <h2>
                    Teachers
                </h2>

                <p>
                    Manage teacher accounts
                    and access.
                </p>

                <a
                    href="teachers.php"
                    class="dashboard-btn"
                >
                    Manage Teachers
                    <span>→</span>
                </a>

            </article>


        </section>

    </div>

</main>

<?php

require_once '../includes/footer.php';

?>