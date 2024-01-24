var {
  "campuses": [
    {
      "name": "Campus A",
      "colleges": [
        {
          "name": "College A1",
          "departments": ["Department A1", "Department A2"]
        },
        {
          "name": "College A2",
          "departments": ["Department A3", "Department A4"]
        }
      ]
    },
    {
      "name": "Campus B",
      "colleges": [
        {
          "name": "College B1",
          "departments": ["Department B1", "Department B2"]
        },
        {
          "name": "College B2",
          "departments": ["Department B3", "Department B4"]
        }
      ]
    }
  ]
}

// Assuming your JSON data is stored in a variable called jsonData
const campusesSelect = document.getElementById("campusSelect");
const collegesSelect = document.getElementById("collegeSelect");
const departmentsSelect = document.getElementById("departmentSelect");

// Populate campus select options
jsonData.campuses.forEach(campus => {
  const option = document.createElement("option");
  option.value = campus.name;
  option.textContent = campus.name;
  campusesSelect.appendChild(option);
});

// Update college select options based on selected campus
campusesSelect.addEventListener("change", () => {
  // Clear previous options
  collegesSelect.innerHTML = "<option value=''>Select College</option>";
  departmentsSelect.innerHTML = "<option value=''>Select Department</option>";

  const selectedCampus = campusesSelect.value;
  const selectedCampusData = jsonData.campuses.find(campus => campus.name === selectedCampus);

  selectedCampusData.colleges.forEach(college => {
    const option = document.createElement("option");
    option.value = college.name;
    option.textContent = college.name;
    collegesSelect.appendChild(option);
  });
});

// Update department select options based on selected college
collegesSelect.addEventListener("change", () => {
  // Clear previous options
  departmentsSelect.innerHTML = "<option value=''>Select Department</option>";

  const selectedCampus = campusesSelect.value;
  const selectedCampusData = jsonData.campuses.find(campus => campus.name === selectedCampus);

  const selectedCollege = collegesSelect.value;
  const selectedCollegeData = selectedCampusData.colleges.find(college => college.name === selectedCollege);

  selectedCollegeData.departments.forEach(department => {
    const option = document.createElement("option");
    option.value = department;
    option.textContent = department;
    departmentsSelect.appendChild(option);
  });
});
