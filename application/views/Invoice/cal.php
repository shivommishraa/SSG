<input type="button" value="Add" onClick="addRow('dataTable')" />
<input type="button" value="Remove" onClick="deleteRow('dataTable')" />
<table id="dataTable" class="form" border="1">
    <tbody>
        <tr id='row_0'>
            <p>
                <td>
                    <label>Quantity</label>
                    <input type="text" required="required" name="qty" oninput="calculate('row_0')">
                </td>
                <td>
                    <label for="price">Price</label>
                    <input type="text" required="required" class="small" name="price" oninput="calculate('row_0')">
                </td>
                <td>
                    <label for="total">Total</label>
                    <input type="text" required="required" class="small" name="total">
                </td>
                <td>
                    <label for="grandtotal">Grand Total</label>
                    <input type="text" name="grandtotal" class="small" required="required">
                </td>
                <td>
                    <label for=""></label>
                </td>
            </p>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
    function addRow(tableID) {
    var table = document.getElementById(tableID);
    //alert(table);
    var rowCount = table.rows.length;

    if (rowCount < 100) { // limit the user from creating fields more than your limits
        var row = table.insertRow(rowCount);

        var colCount = table.rows[0].cells.length;
        row.id = 'row_'+rowCount;
        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;            
        }
       var listitems= row.getElementsByTagName("input")
            for (i=0; i<listitems.length; i++) {
              listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");
            }
    } else {
        alert("Maximum Passenger per ticket is 100.");

    }
}

function deleteRow(tableID) {
    var table = document.getElementById(tableID);
     //alert(table);
    var rowCount = table.rows.length;
       //alert(rowCount);
    for (var i = 0; i < rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        alert(chkbox);
        if (null !== chkbox && true === chkbox.checked) {
            if (rowCount <= 1) { // limit the user from removing all the fields
                alert("Cannot Remove all the Row.");
                break;
            }
            table.deleteRow(i);
            rowCount--;
            i--;
        }
    }
}

function calculate(elementID) {
    var mainRow = document.getElementById(elementID);
    var myBox1 = mainRow.querySelectorAll('[name=qty]')[0].value;
    var myBox2 = mainRow.querySelectorAll('[name=price]')[0].value;
    var total = mainRow.querySelectorAll('[name=total]')[0];
    var myResult1 = myBox1 * myBox2;
    total.value = myResult1;

}
</script>