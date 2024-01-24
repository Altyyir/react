var college = document.getElementById('college').value;

console.log(campus);
console.log(college);

var loadProgram = new XMLHttpRequest();
loadProgram.open("GET", "load.program.php?college="+college);
loadProgram.send();
loadProgram.onload = function() {
    document.getElementById('department').innerHTML = this.responseText;
    console.log(this.responseText);
}