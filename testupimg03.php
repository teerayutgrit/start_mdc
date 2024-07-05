<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable Example</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
</head>
<body>

<div class="table-responsive-sm">
    <?php
    include_once 'dbcon_inventory.php';

    $stmt = "SELECT Inventory, PD_CODE, Product_Name, Brand, Lot, FullLot, Size, Uom, BOX, PCS, Months_Difference FROM dbo.V_KM38_Sum_total_mdc
             UNION ALL
             SELECT Inventory, PD_CODE, Product_Name, Brand, Lot, FullLot, Size, Uom, BOX, PCS, Months_Difference FROM dbo.V_KM52_Sum_total_mdc
             ORDER BY PD_CODE, FullLot";

    $query = sqlsrv_query($conn, $stmt);

    if ($query === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    ?>

    <table id="myTable" class="table table-sm table-hover sm-2">
        <thead>
            <tr>
                <th class="text-center">Inventory</th>
                <th class="text-center">PD_CODE</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Lot</th>
                <th class="text-center">Full Lot</th>
                <th class="text-center">UOM</th>
                <th class="text-center">BOX</th>
                <th class="text-center">PCS</th>
                <th class="text-center">Months Difference</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                $monthsDifference = $result["Months_Difference"];
                $colorClass = '';
                if ($monthsDifference <= 3) {
                    $colorClass = 'text-success'; // green
                } elseif ($monthsDifference >= 4 && $monthsDifference <= 6) {
                    $colorClass = 'text-warning'; // yellow
                } elseif ($monthsDifference >= 7 && $monthsDifference <= 9) {
                    $colorClass = 'text-danger'; // red
                }
            ?>
            <tr>
                <td class="text-center"><?php echo htmlspecialchars($result["Inventory"]); ?></td>
                <td class="text-nowrap"><?php echo htmlspecialchars($result["PD_CODE"]); ?></td>
                <td class="text-nowrap"><?php echo htmlspecialchars($result["Product_Name"]); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["Lot"]); ?></td>
                <td><?php echo htmlspecialchars($result["FullLot"]); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["Uom"]); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["BOX"]); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["PCS"]); ?></td>
                <td class="text-center <?php echo $colorClass; ?>"><?php echo htmlspecialchars($result["Months_Difference"]); ?></td>
            </tr>
            <?php
               }

               sqlsrv_free_stmt($query);
               sqlsrv_close($conn);
               ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6"></th>
                <th class="text-center">Total</th>
                <th colspan="2"></th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'print'
        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(6, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(6).footer()).html(
                'Total: ' + pageTotal
            );
        }
    });
});
</script>


</body>
</html>
