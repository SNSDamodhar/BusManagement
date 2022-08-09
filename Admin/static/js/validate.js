function validate() {
    if (document.forms[0].elements[3].value == "Select Driver"){
        alert('Select Driver, If not available, Create one.');
        return false;
    };

    if(document.forms[0].elements[4].value == "Select CareTaker") {
        alert("Select CareTaker, If not available, Create one");
        return false;
    }

    return true;
}

function validate1() {
    if (document.forms[0].elements[15].value == "Select Bus"){
        alert('Select Bus from drop down list');
        return false;
    };

    return true;
}

function deleteValidate() {
    const confirm = window.confirm("Once deleted, data cannot be restored. Do you want to delete?");
    if(confirm) {
        return true;
    } else {
        return false;
    }
}