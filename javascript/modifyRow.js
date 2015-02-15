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
    var new_row = x.rows[2].cloneNode(true);
    var len = x.rows.length;

    var inp0 = new_row.cells[0].getElementsByTagName('input')[0];
    inp0.id += len;
    inp0.name = "class[" + len + "][subject]";
    inp0.value = '';
    
    var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
    inp1.id += len;
    inp1.name = "class[" + len + "][num]";
    inp1.value = '';
    
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id += len;
    inp2.name = "class[" + len + "][prof]";
    inp2.value = '';
    
    var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
    inp3.id += len;
    inp3.name = "class[" + len + "][loc]";
    inp3.value = '';
    
    var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
    inp4.id += len;
    inp4.name = "class[" + len + "][start]";
    inp4.value = '';
    
    var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
    inp5.id += len;
    inp5.name = "class[" + len + "][end]";
    inp5.value = '';
    
    var inp6 = new_row.cells[6].getElementsByTagName('input')[0];
    inp6.id += len;
    inp6.name = "class[" + len + "][day][m]";
    inp6.checked = false;
    
    var inp7 = new_row.cells[6].getElementsByTagName('input')[1];
    inp7.id += len;
    inp7.name = "class[" + len + "][day][t]";
    inp7.checked = false;
    
    var inp8 = new_row.cells[6].getElementsByTagName('input')[2];
    inp8.id += len;
    inp8.name = "class[" + len + "][day][w]";
    inp8.checked = false;
    
    var inp9 = new_row.cells[6].getElementsByTagName('input')[3];
    inp9.id += len;
    inp9.name = "class[" + len + "][day][th]";
    inp9.checked = false;
    
    var inp10 = new_row.cells[6].getElementsByTagName('input')[4];
    inp10.id += len;
    inp10.name = "class[" + len + "][day][f]";
    inp10.checked = false;
    
    x.appendChild(new_row);
}