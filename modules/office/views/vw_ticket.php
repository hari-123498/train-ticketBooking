<?php
include("../../includes/head.php");
include '../../includes/menubar.php';

if (isset($_SESSION['alert'])):
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']);
?>
    <div class="container mt-3">
        <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $alert['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<!-- Main Container with Light Background, Gradient, and Soft Shadow -->
<div class="container mt-5 p-4" style="background-color: #b0c4de; border-radius: 16px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="color: #004080; font-weight: 600; font-family: 'Poppins', sans-serif;">Passenger Registration</h2>

    <!-- Form with Rounded Inputs, Gradient Borders, and Shadows -->
    <form id="TicketForm" method="post" action="ticket.php" class="mb-3 p-4" style="background-color: #ffffff; border-radius: 16px; box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);">
        <div class="mb-3">
            <label for="userid" class="form-label" style="color: #004080; font-weight: 500;">User ID</label>
            <input type="text" class="form-control" id="userid" name="userid" required style="border-radius: 10px; border: 1px solid #004080;">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label" style="color: #004080; font-weight: 500;">User Name</label>
            <input type="text" class="form-control" id="username" name="username" required style="border-radius: 10px; border: 1px solid #004080;">
        </div>
        <div class="mb-3">
            <p style="color: #004080; font-weight: 500;">Gender:</p>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="male" name="gender" value="male" required>
                <label class="form-check-label" for="male" style="color: #004080;">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="female" name="gender" value="female" required>
                <label class="form-check-label" for="female" style="color: #004080;">Female</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="whenis" class="form-label" style="color: #004080; font-weight: 500;">Date</label>
            <input type="date" class="form-control" id="whenis" name="whenis" required style="border-radius: 10px; border: 1px solid #004080;">
        </div>
        <div class="mb-3">
            <label for="addressis" class="form-label" style="color: #004080; font-weight: 500;">Address</label>
            <input type="text" class="form-control" id="addressis" name="addressis" required style="border-radius: 10px; border: 1px solid #004080;">
        </div>
        <div class="mb-3">
            <label for="phoneno" class="form-label" style="color: #004080; font-weight: 500;">Phone No</label>
            <input type="text" class="form-control" id="phoneno" name="phoneno" required style="border-radius: 10px; border: 1px solid #004080;">
        </div>
        <div id="trainDetails" class="mb-3"></div>
        <div class="mb-3">
            <label for="Trainid" class="form-label" style="color: #004080; font-weight: 500;">Train_Id</label>
            <select class="form-select" id="Trainid" name="Trainid" required style="border-radius: 10px; border: 1px solid #004080;">
                <option value="">Select Train</option>
                <?php foreach ($departments as $dept): ?>
                    <option value="<?php echo $dept['Trainid']; ?>"><?php echo $dept['Trainid']; ?> - <?php echo $dept['Trainname']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="action" id="action" value="create">
        <button type="submit" class="btn btn-primary" style="background: linear-gradient(90deg, #004080, #388e3c); border-color: #388e3c; border-radius: 10px;">Submit</button>
    </form>

    <!-- Table with Consistent Theme and Modern Styling -->
    <table class="table table-bordered mt-4" style="background-color: #ffffff; border-radius: 16px; box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);">
        <thead style="background-color: #004080; color: white;">
            <tr>
                <th>User Id</th>
                <th>User Name</th>
                <th>Gender</th>
                <th>Date</th>
                <th>Address</th>
                <th>Phone No</th>
                <th>Train_Id</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Ticket as $Ticket): ?>
                <tr style="background-color: #f1f8e9;">
                    <td><?php echo $Ticket['userid']; ?></td>
                    <td><?php echo $Ticket['username']; ?></td>
                    <td><?php echo $Ticket['gender']; ?></td>
                    <td><?php echo $Ticket['whenis']; ?></td>
                    <td><?php echo $Ticket['addressis']; ?></td>
                    <td><?php echo $Ticket['phoneno']; ?></td>
                    <td><?php echo $Ticket['Trainid']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn" data-userid="<?php echo $Ticket['userid']; ?>">Edit</button>
                        <form method="post" action="Ticket.php" style="display:inline;">
                            <input type="hidden" name="userid" value="<?php echo $Ticket['userid']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include '../../includes/footerjs.php';
include '../../includes/footer.php';
?>

<script>
$(document).ready(function() {
    $('#Trainid').change(function() {
        var Trainid = $(this).val();
        if (Trainid) {
            $.ajax({
                url: 'fetch_dept.php',
                type: 'POST',
                data: {Trainid: Trainid},
                success: function(response) {
                    $('#trainDetails').html(response);
                }
            });
        } else {
            $('#trainDetails').html('');
        }
    });
});
</script>
<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        const userid = this.getAttribute('data-userid');
        const row = this.closest('tr');
        
        const username = row.cells[1].textContent;
        const gender = row.cells[2].textContent;
        const whenis = row.cells[3].textContent;
        const addressis = row.cells[4].textContent;
        const phoneno = row.cells[5].textContent;
        const Trainid = row.cells[6].textContent;

        document.getElementById('userid').value = userid;
        document.getElementById('username').value = username;
        document.querySelector(`input[name="gender"][value="${gender}"]`).checked = true;
        document.getElementById('whenis').value = whenis;
        document.getElementById('addressis').value = addressis;
        document.getElementById('phoneno').value = phoneno;
        document.getElementById('Trainid').value = Trainid;
        document.getElementById('action').value = 'update';

        $('#Trainid').trigger('change');
    });
});
</script>
</body>
</html>
