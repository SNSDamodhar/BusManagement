

function validate() {
    if(document.forms[0].elements[2].value === "Select LoginAs") {
        alert("Select User from dropdown list");
        return false;
    }
    return true;
}