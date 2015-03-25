/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addReason(section) {
    var x = document.getElementById('schedTable');
    var box = section.parentNode;
    
    var input = document.createElement("input");
    var day = "";
    var shift = "";
    var name = section.attributes[1].nodeValue;
    input.type = text;
    input.name = "day[" + day + "][" + shift + "][reason]"

}

function removeReason() {
    
}
