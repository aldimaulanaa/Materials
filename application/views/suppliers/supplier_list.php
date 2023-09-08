<!-- views/suppliers/supplier_list.php -->

<div class="container">
    <h2>List of Suppliers</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Supplier ID</th>
                <th>Supplier Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier) : ?>
                <tr>
                    <td><?php echo $supplier['SupplierID']; ?></td>
                    <td><?php echo $supplier['SupplierName']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>