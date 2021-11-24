"use strict";

function modify(e) {
    /*     alert(e.type +" on modify for "+ e.currentTarget.parentNode.id+" !");
     */    // modifier commentaire
    /*     alert(e.type +" on remove for "+ e.currentTarget.parentNode.id+" !");
     */
    var name = prompt("update comment", ". . . .");
    var txtid = document.getElementById(e.currentTarget.parentNode.id);
    txtid.getElementsByTagName('p')[0].textContent = name;

}

function deleter(e) {
/*     alert(e.type + " on remove for " + e.currentTarget.parentNode.id + " !");
 */    e.currentTarget.parentNode.remove();
}

document.getElementById("addNew").addEventListener("click", function (e) {
    /* alert(e.type + " on add !"); */
    var newDiv = document.createElement("div");
    newDiv.id = "UserX";

    var name = prompt("Ajouter un nouveau commentaire", ". . . .");
    const sender = document.createElement("h4");
    const h4txt = document.createTextNode("another user");
    sender.appendChild(h4txt);
    newDiv.appendChild(sender);
    const para = document.createElement("p");
    const node = document.createTextNode(name);
    para.appendChild(node);
    newDiv.appendChild(para);

    const btn1 = document.createElement("button");
    para.setAttribute("onclick", "modify(event)");
    const edit = document.createTextNode("Modifier");
    para.appendChild(edit);

    const allcomments = document.getElementById("users");
    allcomments.appendChild(newDiv);


})

let modifiers = document.getElementsByClassName("modify");
Array.from(modifiers).forEach(m => m.addEventListener("click", modify));

let remover = document.getElementsByClassName("remove");
Array.from(remover).forEach(m => m.addEventListener("click", deleter));
