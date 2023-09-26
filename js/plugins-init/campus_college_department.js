var departmentsByCampus = {
    "ARASOF-Nasugbu Campus": {
        "College of Engineering": [
            "Bachelor of Science in Computer Engineering"
            ],
        "College of Industrial Technology": [
            "Bachelor of Science in Industrial Technology"
            ],
        "College of Informatics and Computing Sciences": [
            "Bachelor of Science in Computer Science", 
            "Bachelor of Science in Information Technology"
            ],
        "College of Art and Sciences": [
            "Bachelor of Arts in Communication", 
            "Bachelor of Science in Criminology", 
            "Bachelor of Science in Psychology", 
            "Bachelor of Science in Fisheries and Aquatic Sciences"
            ],
        "College of Accountancy, Business, Economics, and International Hospitality Management": [
            "Bachelor of Science in Accountancy", 
            "Bachelor of Science in Management Accounting", 
            "Bachelor of Science in Entrepreneurship", 
            "Bachelor of Science in Business Administration major in Marketing Management", 
            "Bachelor of Science in Business Administration major in Human Resource Management", 
            "Bachelor of Science in Business Administration major in Financial Management", 
            "Bachelor of Science in Business Administration major in Operations Management", 
            "Bachelor of Science in Tourism Management", 
            "Bachelor of Science in Hospitality Management"
            ],
        "College of Teacher Education": [
            "Bachelor of Secondary Education major in English", 
            "Bachelor of Secondary Education major in Mathematics", 
            "Bachelor of Secondary Education major in Sciences", 
            "Bachelor of Secondary Education major in Filipino", 
            "Bachelor of Secondary Education major in Social Studies", 
            "Bachelor of Elementary Education", 
            "Bachelor of Physical Education", 
            "Bachelor of Early Childhood Education"
            ],
        "College of Nursing and Allied Health Sciences": [
            "Bachelor of Science in Nursing", 
            "Bachelor of Science in Nutrition and Dietetics"
            ]
    }
};

function test(){
    var selectedCampus = document.getElementById("campus").value;
    var collegeDropdown = document.getElementById("college");
    collegeDropdown.innerHTML = "<option selected>Choose Colleges</option>"; // Reset the College dropdown

    if (selectedCampus !== "Choose Campus") {
        var colleges = Object.keys(departmentsByCampus[selectedCampus]);
        for (var i = 0; i < colleges.length; i++) {
            var option = document.createElement("option");
            option.value = colleges[i];
            option.textContent = colleges[i];
            collegeDropdown.append(option);
        }
    }

    var departmentDropdown = document.getElementById("department");
    departmentDropdown.innerHTML = "<option selected>Choose Department</option>"; 
}

// Function to populate the "College" dropdown based on the selected "Campus"
document.getElementById("campus").addEventListener("change", function () {
    
});

// Function to populate the "Department" dropdown based on the selected "College"
document.getElementById("college").addEventListener("change", function () {
    var selectedCampus = document.getElementById("campus").value;
    var selectedCollege = this.value;
    var departmentDropdown = document.getElementById("department");
    departmentDropdown.innerHTML = "<option selected>Choose Department</option>"; // Reset the Department dropdown

    if (selectedCollege !== "Choose College" && selectedCampus !== "Choose Campus") {
        var departments = departmentsByCampus[selectedCampus][selectedCollege];
        for (var i = 0; i < departments.length; i++) {
            var option = document.createElement("option");
            option.textContent = departments[i];
            departmentDropdown.appendChild(option);
        }
    }
});