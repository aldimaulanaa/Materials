<!-- views/materials/material_list.php -->

<!DOCTYPE html>
<html>

<head>
    <title>List of Materials</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>List of Materials</h2>
        <a href="<?php echo site_url('material/create'); ?>" class="btn btn-primary mb-3">Create Material</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Material Code</th>
                    <th>Material Name</th>
                    <th>Material Type</th>
                    <th>Material Buy Price</th>
                    <th>Related Supplier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materials as $material) : ?>
                    <tr>
                        <td><?php echo $material['MaterialCode']; ?></td>
                        <td><?php echo $material['MaterialName']; ?></td>
                        <td><?php echo $material['MaterialType']; ?></td>
                        <td><?php echo $material['MaterialBuyPrice']; ?></td>
                        <td><?php echo $material['SupplierName']; ?></td>
                        <td>
                            <a href="<?php echo site_url('material/edit/' . $material['MaterialID']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo site_url('material/delete/' . $material['MaterialID']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this material?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>