// JavaScript
function showUnitForm() {
    document.getElementById('unit-form').style.display = 'block';
    document.getElementById('department-form').style.display = 'none';
    document.getElementById('employee-form').style.display = 'none';
}

function showDepartmentForm() {
    document.getElementById('unit-form').style.display = 'none';
    document.getElementById('department-form').style.display = 'block';
    document.getElementById('employee-form').style.display = 'none';
}

function showEmployeeForm() {
    document.getElementById('unit-form').style.display = 'none';
    document.getElementById('department-form').style.display = 'none';
    document.getElementById('employee-form').style.display = 'block';
}