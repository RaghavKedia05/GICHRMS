<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportation ERP Dashboard</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <button id="menu-btn">
        <span class="material-symbols-outlined">menu</span>
    </button>

    <div class="container">
    
        <!-- SIDEBAR START -->
        <aside>

            <div class="top">

                <div class="logo">
                    <h2>Transport<span class="danger">ERP</span></h2>
                </div>

                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">close</span>
                </div>

            </div>

            <div class="sidebar">

                <a href="<?= base_url('dashboard') ?>" class="active">
                    <span class="material-symbols-outlined">dashboard</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= base_url('transporters') ?>">
                    <span class="material-symbols-outlined">local_shipping</span>
                    <h3>Transporters</h3>
                </a>

                <a href="<?= base_url('drivers') ?>">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Drivers</h3>
                </a>

                <a href="<?= base_url('vehicles') ?>">
                    <span class="material-symbols-outlined">directions_car</span>
                    <h3>Vehicles</h3>
                </a>
                
                <a href="<?= base_url('shipments') ?>">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <h3>Shipments</h3>
                </a>

                <a href="<?= base_url('warehouses') ?>">
                    <span class="material-symbols-outlined">warehouse</span>
                    <h3>Warehouses</h3>
                </a>

                <a href="<?= base_url('billing') ?>">
                    <span class="material-symbols-outlined">payments</span>
                    <h3>Billing</h3>
                </a>

                <a href="<?= base_url('reports') ?>">
                    <span class="material-symbols-outlined">analytics</span>
                    <h3>Reports</h3>
                </a>

                <a href="<?= base_url('settings') ?>">
                    <span class="material-symbols-outlined">settings</span>
                    <h3>Settings</h3>
                </a>

                <a href="<?= base_url('/') ?>">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>

            </div>

        </aside>
        <!-- SIDEBAR END -->


        <!-- MAIN CONTENT -->
        <main>

            <h1>Dashboard</h1>

            <div class="date">
                <input type="date">
            </div>

            <div class="insights">

                <div class="card">
                    <span class="material-symbols-outlined">local_shipping</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Vehicles</h3>
                            <h1>128</h1>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>

                <div class="card">
                    <span class="material-symbols-outlined">person</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Active Drivers</h3>
                            <h1>64</h1>
                        </div>
                    </div>
                    <small class="text-muted">Updated Just Now</small>
                </div>

                <div class="card">
                    <span class="material-symbols-outlined">payments</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Revenue</h3>
                            <h1>$24,500</h1>
                        </div>
                    </div>
                    <small class="text-muted">This Month</small>
                </div>

            </div>

            <!-- TABLE -->

            <div class="recent-orders">

                <h2>Recent Shipments</h2>

                <div class="table-responsive">
                    <table>

                        <thead>
                            <tr>
                                <th>Shipment ID</th>
                                <th>Driver</th>
                                <th>Status</th>
                                <th>Destination</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>#TR1021</td>
                                <td>John</td>
                                <td class="success">Delivered</td>
                                <td>New York</td>
                            </tr>

                            <tr>
                                <td>#TR1022</td>
                                <td>Alex</td>
                                <td class="warning">Pending</td>
                                <td>Chicago</td>
                            </tr>

                            <tr>
                                <td>#TR1023</td>
                                <td>David</td>
                                <td class="danger-text">Delayed</td>
                                <td>California</td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

        </main>


        <!-- RIGHT PANEL -->

        <div class="right">

            <div class="top-right">

                <div class="profile">

                    <div class="info">
                        <p><b>Admin</b></p>
                        <small class="text-muted">Manager</small>
                    </div>

                    <div class="profile-photo">
                        A
                    </div>

                </div>

            </div>

            <div class="recent-updates">

                <h2>Recent Updates</h2>

                <div class="updates">

                    <div class="update">
                        <span class="material-symbols-outlined">notifications</span>
                        <div class="update-content">

                            <div class="message">
                                <p><b>Truck #21</b> reached destination.</p>
                                <small class="text-muted">2 Minutes Ago</small>
                            </div>
                        </div>
                    </div>

                    <div class="update">
                        <span class="material-symbols-outlined">warning</span>
                        <div class="update-content">
                            <div class="message">
                                <p><b>Vehicle #18</b> requires maintenance.</p>
                                <small class="text-muted">10 Minutes Ago</small>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- JavaScript Start-->
    <script>

        const menuBtn = document.getElementById("menu-btn");
        const closeBtn = document.getElementById("close-btn");
        const sidebar = document.querySelector("aside");

        menuBtn.addEventListener("click", () => {
            sidebar.classList.add("active");
        });

        closeBtn.addEventListener("click", () => {
            sidebar.classList.remove("active");
        });

    </script>
    <!-- JavaScript End-->

</body>

</html>