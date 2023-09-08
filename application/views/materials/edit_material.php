<!-- views/materials/edit_material.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Edit Material</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Edit Material</h2>
        <form method="post" action="<?php echo site_url('material/edit/' . $material_id); ?>">
            <div class="form-group">
                <label for="material_code">Material Code:</label>
                <input type="text" class="form-control" name="material_code" value="<?php echo $material['MaterialCode']; ?>" required>
            </div>

            <div class="form-group">
                <label for="material_name">Material Name:</label>
                <input type="text" class="form-control" name="material_name" value="<?php echo $material['MaterialName']; ?>" required>
            </div>

            <div class="form-group">
                <label for="material_type">Material Type:</label>
                <select class="form-control" name="material_type" required>
                    <option value="Fabric" <?php echo ($material['MaterialType'] == 'Fabric') ? 'selected' : ''; ?>>Fabric</option>
                    <option value="Jeans" <?php echo ($material['MaterialType'] == 'Jeans') ? 'selected' : ''; ?>>Jeans</option>
                    <option value="Cotton" <?php echo ($material['MaterialType'] == 'Cotton') ? 'selected' : ''; ?>>Cotton</option>
                </select>
            </div>

            <div class="form-group">
                <label for="material_buy_price">Material Buy Price:</label>
                <input type="number" class="form-control" name="material_buy_price" value="<?php echo $material['MaterialBuyPrice']; ?>" required>
            </div>

            <div class="form-group">
                <label for="supplier_id">Supplier:</label>
                <select class="form-control" name="supplier_id" required>
                    <?php foreach ($suppliers as $supplier) : ?>
                        <option value="<?php echo $supplier['SupplierID']; ?>" <?php echo ($material['SupplierID'] == $supplier['SupplierID']) ? 'selected' : ''; ?>><?php echo $supplier['SupplierName']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Material</button>
        </form>
    </div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>