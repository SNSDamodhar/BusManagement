function validate() {
    if (document.forms[0].elements[1].value == "Attendence"){
        alert('Select IN/OUT/ABSENT status');
        return false;
    }

    if(document.forms[0].elements[0].value == "Student Roll Number") {
        alert('Select Student');
        return false;
    }

    return true;
}
