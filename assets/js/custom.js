/**
 * Created by Aminat on 3/21/2018.
 */

//Functions for dynamically changing form fields
function getLga(value) {
//                                console.log(value);
    var xmlHttp = new XMLHttpRequest;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var lga = document.getElementById('lga');
            lga.innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open('GET', 'ajax/getLga.php?stateId=' + value, true);
    xmlHttp.send();
}

function getSpecificDepartments(value) {
    // console.log(value);
    var xmlHttp = new XMLHttpRequest;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var department = document.getElementById('department');
            department.innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open('GET', 'ajax/getSpecificDepartment.php?collegeId=' + value, true);
    xmlHttp.send();
}

function getDepartments(value) {
    // console.log(value);
    var xmlHttp = new XMLHttpRequest;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var department = document.getElementById('department');
            department.innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open('GET', 'ajax/getSpecificDepartment.php?collegeId=' + value, true);
    xmlHttp.send();
}

function getCollegeLecturers(value) {
    // console.log(value);
    var xmlHttp = new XMLHttpRequest;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var lecturer = document.getElementById('lecturer');
            lecturer.innerHTML = xmlHttp.responseText;
            // alert(xmlHttp.responseText);
        }
    }
    xmlHttp.open('GET', 'ajax/getCollegeLecturer.php?collegeId=' + value, true);
    xmlHttp.send();
}


function getLecturers(value) {
    // console.log(value);
    var xmlHttp = new XMLHttpRequest;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var lecturer = document.getElementById('lecturer');
            lecturer.innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open('GET', 'ajax/getLecturer.php?departmentId=' + value, true);
    xmlHttp.send();
}

function getDepartmentId(departmentId) {
    // alert(departmentId);
    var xmlHttp = new XMLHttpRequest;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var previousDeptHod = document.getElementById('previousDeptHod');
            previousDeptHod.innerHTML = xmlHttp.responseText;
            // alert(xmlHttp.responseText);
        }
    }
    xmlHttp.open('GET', 'ajax/getPreviousHod.php?departmentId=' + departmentId, true);
    xmlHttp.send();
}