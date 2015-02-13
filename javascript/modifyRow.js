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
    var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
    inp3.id += len;
    inp3.value = '';
    var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
    inp4.id += len;
    inp4.value = '';
    var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
    inp5.id += len;
    inp5.value = '';
    var inp6 = new_row.cells[6].getElementsByTagName('input')[0];
    inp6.id += len;
    inp6.value = '';
    x.appendChild(new_row);
}