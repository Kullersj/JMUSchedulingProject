/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function deleteRow(row) {
    var i = row.parentNode.parentNode.rowIndex;
    document.getElementById('ClassTable').deleteRow(i);
}


function insRow() {
    console.log('hi');
    var x = document.getElementById('ClassTable');
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;

    var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
    inp1.id += len;
    inp1.value = '';
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id += len;
    inp2.value = '';
    x.appendChild(new_row);
}