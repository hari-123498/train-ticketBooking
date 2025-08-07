<?php
include("../../includes/head.php");
include '../../includes/menubar.php';

if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']);
?>
    <div class="container mt-3">
        <div class="alert alert-<?php echo $alert['type'];?> alert-dismissible fade show" role="alert">
            <?php echo $alert['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php } ?>

<!-- Main Container with Light Grey Background and Box Shadow -->
<div class="container mt-5 p-5" style="background-color: #b0c4de; border-radius: 12px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center mb-4" style="color: #004080; font-weight: 700;">Train Information</h2>

    <!-- Form with Soft White Background, Improved Styling, and Shadow -->
    <form id="departmentForm" method="post" action="dept.php" class="mb-4 p-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Trainid" class="form-label" style="color: #004080; font-weight: 500;">Train ID</label>
                <input type="text" class="form-control" id="Trainid" name="Trainid" required style="border-radius: 8px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Trainname" class="form-label" style="color: #004080; font-weight: 500;">Train Name</label>
                <input type="text" class="form-control" id="Trainname" name="Trainname" required style="border-radius: 8px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Departurecity" class="form-label" style="color: #004080; font-weight: 500;">Departure City</label>
                <input type="text" class="form-control" id="Departurecity" name="Departurecity" required style="border-radius: 8px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Arrivalcity" class="form-label" style="color: #004080; font-weight: 500;">Arrival City</label>
                <input type="text" class="form-control" id="Arrivalcity" name="Arrivalcity" required style="border-radius: 8px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Depaturetime" class="form-label" style="color: #004080; font-weight: 500;">Departure Time</label>
                <input type="time" class="form-control" id="Depaturetime" name="Depaturetime" required style="border-radius: 8px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Arrivaltime" class="form-label" style="color: #004080; font-weight: 500;">Arrival Time</label>
                <input type="time" class="form-control" id="Arrivaltime" name="Arrivaltime" required style="border-radius: 8px;">
            </div>
        </div>
        <input type="hidden" name="action" id="action" value="create">
        <button type="submit" class="btn btn-primary w-100" style="background-color: #004080; border-radius: 8px; font-weight: 600;">Submit</button>
    </form>

    <!-- Modern Table with Light Design -->
    <div class="table-responsive">
        <table class="table table-bordered" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);">
            <thead style="background-color: #004080; color: white; text-align: center;">
                <tr>
                    <th>Train ID</th>
                    <th>Train Name</th>
                    <th>Departure City</th>
                    <th>Arrival City</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($departments as $dept): ?>
                <tr style="text-align: center;">
                    <td><?php echo $dept['Trainid']; ?></td>
                    <td><?php echo $dept['Trainname']; ?></td>
                    <td><?php echo $dept['Departurecity']; ?></td>
                    <td><?php echo $dept['Arrivalcity']; ?></td>
                    <td><?php echo $dept['Depaturetime']; ?></td>
                    <td><?php echo $dept['Arrivaltime']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn me-2" data-Trainid="<?php echo $dept['Trainid']; ?>" style="border-radius: 6px;">Edit</button>                     
                        <form method="post" action="dept.php" style="display:inline;">
                            <input type="hidden" name="Trainid" value="<?php echo $dept['Trainid']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 6px;">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include '../../includes/footerjs.php';
include '../../includes/footer.php';
?>

<script>
document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        const Trainid = this.getAttribute('data-Trainid');
        const row = this.closest('tr');
        const Trainname = row.cells[1].textContent;
        const Departurecity = row.cells[2].textContent;
        const Arrivalcity = row.cells[3].textContent;
        const Depaturetime = row.cells[4].textContent;
        const Arrivaltime = row.cells[5].textContent;

        document.getElementById('Trainid').value = Trainid;
        document.getElementById('Trainname').value = Trainname;
        document.getElementById('Departurecity').value = Departurecity;
        document.getElementById('Arrivalcity').value = Arrivalcity;
        document.getElementById('Depaturetime').value = Depaturetime;
        document.getElementById('Arrivaltime').value = Arrivaltime;
        document.getElementById('action').value = 'update';
    });
});
</script>
</body>
</html>
