<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Villavi The Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        body {
            margin-left: 280px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background-color: #343a40;
            color: white;
            padding: 1rem;
            overflow-y: auto;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            margin-bottom: 10px;
        }

        .sidebar a.active {
            background-color: #007bff;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .content {
            padding: 20px;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-day {
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            padding: 10px;
        }

        .calendar-day.used {
            background-color: #ffcccc;
            color: #333;
        }

        .calendar-day:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }

        .calendar-header {
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-auto text-white text-decoration-none">
            <i class="fas fa-heartbeat fa-2x me-2"></i>
            <span class="fs-4">Admin Page</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin.php" class="nav-link active">
                    <i class="fas fa-calendar-alt me-2"></i> Dashboard
                </a>
            </li>
        </ul>
        <hr>
    </div>

    <!-- Main Content -->
    <div class="content">
        <header class="bg-primary text-white text-center py-3">
            <h1>Admin Dashboard</h1>
            <p>Data Input and Kalender</p>
        </header>

        <!-- Calendar Section -->
        <div class="calendar-header">
            <h3 id="calendar-month">Januari</h3>
            <p id="calendar-year">2024</p>
        </div>

        <div class="calendar">
            <div class="calendar-day">Sun</div>
            <div class="calendar-day">Mon</div>
            <div class="calendar-day">Tue</div>
            <div class="calendar-day">Wed</div>
            <div class="calendar-day">Thu</div>
            <div class="calendar-day">Fri</div>
            <div class="calendar-day">Sat</div>
        </div>

        <div id="calendar-grid" class="calendar mt-2">
            <!-- Dates will be dynamically populated -->
        </div>

        <!-- Data Table Section -->
        <div class="container my-4">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Service</th>
                            <th>Package</th>
                            <th>Budget</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = new mysqli("localhost", "root", "", "p3l");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            if (isset($_POST['delete_id'])) {
                                $delete_id = $_POST['delete_id'];
                                $conn->query("DELETE FROM contact WHERE id = $delete_id");
                            }
                            if (isset($_POST['edit_id'])) {
                                $edit_id = $_POST['edit_id'];
                                $name = $_POST['name'];
                                $phone = $_POST['phone'];
                                $email = $_POST['email'];
                                $address = $_POST['address'];
                                $service = $_POST['service'];
                                $package = $_POST['package'];
                                $budget = $_POST['budget'];
                                $date = $_POST['date'];
                                $details = $_POST['details'];

                                $conn->query("UPDATE contact SET name='$name', phone='$phone', email='$email', address='$address', service='$service', package='$package', budget='$budget', date='$date', details='$details' WHERE id=$edit_id");
                            }
                        }

                        $sql = "SELECT * FROM contact";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['service'] . "</td>";
                                echo "<td>" . $row['package'] . "</td>";
                                echo "<td>Rp " . number_format($row['budget'], 0, ',', '.') . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['details'] . "</td>";
                                echo "<td>";
                                echo "<form method='POST' style='display:inline;'>";
                                echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                                echo "<button type='submit' class='btn btn-danger btn-sm'>Delete</button>";
                                echo "</form>";
                                echo " ";
                                echo "<button class='btn btn-warning btn-sm' onclick='openEditModal(" . json_encode($row) . ")'>Edit</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11' class='text-center'>No data available</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <footer class="bg-light text-center py-3">
            <p>&copy;2024 Villavi The Venue | Admin Dashboard</p>
        </footer>
    </div>

    <!-- Modal for Edit -->
    <div class="modal" tabindex="-1" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="btn-close" onclick="closeEditModal()"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit-id" />
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="edit-phone" name="phone" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="edit-address" name="address" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-service" class="form-label">Service</label>
                            <input type="text" class="form-control" id="edit-service" name="service" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-package" class="form-label">Package</label>
                            <input type="text" class="form-control" id="edit-package" name="package" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-budget" class="form-label">Budget</label>
                            <input type="number" class="form-control" id="edit-budget" name="budget" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="edit-date" name="date" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-details" class="form-label">Details</label>
                            <textarea class="form-control" id="edit-details" name="details" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Event Details -->
    <div class="modal" tabindex="-1" id="eventModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event Details</h5>
                    <button type="button" class="btn-close" onclick="closeEventModal()"></button>
                </div>
                <div class="modal-body" id="event-details">
                    <!-- Details will be dynamically populated -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeEventModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(data) {
            document.getElementById('edit-id').value = data.id;
            document.getElementById('edit-name').value = data.name;
            document.getElementById('edit-phone').value = data.phone;
            document.getElementById('edit-email').value = data.email;
            document.getElementById('edit-address').value = data.address;
            document.getElementById('edit-service').value = data.service;
            document.getElementById('edit-package').value = data.package;
            document.getElementById('edit-budget').value = data.budget;
            document.getElementById('edit-date').value = data.date;
            document.getElementById('edit-details').value = data.details;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function openEventModal(service, details) {
            document.getElementById('event-details').innerHTML = `
        <p><strong>Service:</strong> ${service}</p>
        <p><strong>Details:</strong> ${details}</p>
    `;
            document.getElementById('eventModal').style.display = 'block';
        }

        function closeEventModal() {
            document.getElementById('eventModal').style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const usedDates = [];
            const dateDetails = {};

            // Fetch data dari server
            fetch('fetch_dates.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(event => {
                        usedDates.push(event.date);
                        // Simpan layanan (service) dan detail ke dalam objek dateDetails
                        dateDetails[event.date] = {
                            service: event.service,
                            details: event.details
                        };
                    });
                    generateCalendar();
                });

            function generateCalendar() {
                const calendarGrid = document.getElementById('calendar-grid');
                const currentYear = new Date().getFullYear();
                const currentMonth = new Date().getMonth();

                document.getElementById('calendar-month').textContent = new Date(currentYear, currentMonth).toLocaleString('default', {
                    month: 'long'
                });
                document.getElementById('calendar-year').textContent = currentYear;

                const firstDay = new Date(currentYear, currentMonth, 1).getDay();
                const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();

                calendarGrid.innerHTML = '';

                // Tambahkan elemen kosong untuk mengisi awal minggu
                for (let i = 0; i < firstDay; i++) {
                    calendarGrid.innerHTML += '<div></div>';
                }

                // Tambahkan elemen tanggal ke kalender
                for (let day = 1; day <= totalDays; day++) {
                    const dateStr = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const isUsed = usedDates.includes(dateStr);
                    const dayClass = isUsed ? 'calendar-day used' : 'calendar-day';
                    const details = isUsed ? dateDetails[dateStr] : {};

                    calendarGrid.innerHTML += `<div class="${dayClass}" onclick="${isUsed ? `openEventModal('${details.service}', '${details.details}')` : ''}">${day}</div>`;
                }
            }
        });
    </script>
</body>

</html>