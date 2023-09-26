// for Sustainable Development Goal 
$(document).ready(function(){
	$(".form-check-input").click(function(){
		if($("input:checkbox").filter(":checked").length < 1){
			$(".err").show();
			return false;
		}
		else{
			$(".err").hide();
			return true;
		}
	})
})


// No. of BatStateU Female Participants
document.addEventListener("DOMContentLoaded", function () {
        const inputElement = document.getElementById("input1");
        const errorMessageElement = document.getElementById("error-message");

        inputElement.addEventListener("input", function () {
            const value = parseInt(inputElement.value);

            if (isNaN(value) || value < 0) {
                errorMessageElement.textContent = "The BatStateU Female must be at least 0.";
            } else {
                errorMessageElement.textContent = "";
            }
        });
    });

// No. of BatStateU Male Participants
document.addEventListener("DOMContentLoaded", function () {
        const inputElement = document.getElementById("input3");
        const errorMessageElement = document.getElementById("male-error-message");

        inputElement.addEventListener("input", function () {
            const value = parseInt(inputElement.value);

            if (isNaN(value) || value < 0) {
                errorMessageElement.textContent = "The BatStateU Male must be at least 0.";
            } else {
                errorMessageElement.textContent = "";
            }
        });
    });