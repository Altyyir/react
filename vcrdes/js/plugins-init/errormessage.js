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

// for title
document.addEventListener("DOMContentLoaded", function () {
        const inputElement = document.getElementById("title");
        const errorMessageElement = document.getElementById("title-error-message");

        inputElement.addEventListener("input", function () {
            const value = parseInt(inputElement.value);

            if (isNaN(value) || value < 0) {
                errorMessageElement.textContent = "The title field is required.";
            } else {
                errorMessageElement.textContent = "";
            }
        });
    });


 $(function(){

        var $personalForm = $("#personalprofiles");

        $personalForm.validate({
          rules:{
            title_profile:{
              required:true
            },
            lastname:{
              required:true
            },
            firstname:{
              required:true
            },
            middlename:{
              required:true
            },
            dateofbirth:{
              required:true
            },
            placeofbirth:{
              required:true
            },
            civilstatus:{
              required:true
            },
            gender:{
              required:true
            },
            citizenship:{
              required:true
            },
            mobileno:{
              required:true
            },
            emailprimary:{
              required:true
            },
            region:{
              required:true
            },
            province:{
              required:true
            },

          },  
          messages:{
            title_profile:{
              required:'Title must be required.'
            },
            lastname:{
              required:'Last name must be required.'
            },
            firstname:{
              required:'First name must be required.'
            },
            middlename:{
              required:'Middle Name must be required.' 
            },
            dateofbirth:{
              required:'Date of Birth must be required.'
            },
            placeofbirth:{
              required:'Place of Birth must be required.'
            },
            civilstatus:{
              required:'Civil Status must be required.'
            },
            gender:{
              required:'Gender must be required.'
            },
            citizenship:{
              required:'Citizenship must be required.'
            },
            mobileno:{
              required:'Mobile must be required.'
            },
            emailprimary:{
              required:'Email must be required.'
            },
            province:{
              required:'Province must be required.'
            },
            region:{
              required:'Region must be required.'
            },
          }
        })

      })

  $(function(){

        var $academicForm = $("#academic_background");

        $academicForm.validate({
          rules:{
            degree:{
              required:true
            },
            major_field:{
              required:true
            },
            sector:{
              required:true
            },
            institution:{
              required:true
            },
            status:{
              required:true
            },
            year_start:{
              required:true
            },
            year_end:{
              required:true
            },
          },  
          messages:{
            degree:{
              required:'Degree must be required.'
            },
            major_field:{
              required:'Major Field must be required.'
            },
            sector:{
              required:'Sector must be required.'
            },
            institution:{
              required:'Learning Institution must be required.' 
            },
            status:{
              required:'Status must be required.'
            },
            year_start:{
              required:'Year must be required.'
            },
            year_end:{
              required:'Year must be required.'
            },
          }
        })

      })

  $(function(){

        var $employmentForm = $("#employment");

        $employmentForm.validate({
          rules:{
            agency:{
              required:true
            },
            plantilla_position:{
              required:true
            },
            status:{
              required:true
            },
            appointment_start:{
              required:true
            },
            appointment_end:{
              required:true
            },
            monthly_salary:{
              required:true
            },
          },  
          messages:{
            agency:{
              required:'Agency must be required.'
            },
            plantilla_position:{
              required:'Plantilla Position must be required.'
            },
            status:{
              required:'Status must be required.'
            },
            appointment_start:{
              required:'Appointment must be required.' 
            },
            appointment_end:{
              required:'Appointment must be required.'
            },
            monthly_salary:{
              required:'Monthly Salary must be required.'
            },
          }
        })

      })

  $(function(){

        var $awardForm = $("#award");

        $awardForm.validate({
          rules:{
            award:{
              required:true
            },
            rank:{
              required:true
            },
            category:{
              required:true
            },
            year_granted:{
              required:true
            },
            granting_institution:{
              required:true
            },
          },  
          messages:{
            award:{
              required:'Award must be required.'
            },
            rank:{
              required:'Rank must be required.'
            },
            category:{
              required:'Category must be required.'
            },
            year_granted:{
              required:'Year Granted must be required.' 
            },
            granting_institution:{
              required:'Granting Institution must be required.'
            },
          }
        })

      })

  $(function(){

        var $conferencesForm = $("#conferences");

        $conferencesForm.validate({
          rules:{
            themetitle:{
              required:true
            },
            organizer:{
              required:true
            },
            venue:{
              required:true
            },
            participation:{
              required:true
            },
            conference:{
              required:true
            },
            to_conference:{
              required:true
            },
            from_conference:{
              required:true
            },
          },  
          messages:{
            themetitle:{
              required:'Title must be required.'
            },
            organizer:{
              required:'Organizer must be required.'
            },
            venue:{
              required:'Venue must be required.'
            },
            participation:{
              required:'Participation must be required.' 
            },
            conference:{
              required:'Conference must be required.'
            },
            to_conference:{
              required:'Date of Conference must be required.' 
            },
            from_conference:{
              required:'Date of Conference must be required.'
            },
          }
        })

      })

$(function(){

        var $project_profileForm = $("#project_profile");

        $project_profileForm.validate({
          rules:{
            titleproject:{
              required:true
            },
            typeproject:{
              required:true
            },
            typefundinginstitution:{
              required:true
            },
            implementingagency:{
              required:true
            },
            positionproject:{
              required:true
            },
            status:{
              required:true
            },
            sector:{
              required:true
            },
            from_project:{
              required:true
            },
            image:{
              required:true
            },
          },  
          messages:{
            titleproject:{
              required:'Title Project must be required.'
            },
            typeproject:{
              required:'Types Project must be required.'
            },
            typefundinginstitution:{
              required:'Funding Institution must be required.'
            },
            implementingagency:{
              required:'Implementing Agency must be required.' 
            },
            positionproject:{
              required:'Position Project must be required.'
            },
            status:{
              required:'Status must be required.' 
            },
            sector:{
              required:'Sector must be required.'
            },
            from_project:{
              required:'Date must be required.' 
            },
            image:{
              required:'PDF File must be required.'
            },
          }
        })

      })

$(function(){

        var $scwForm = $("#scw");

        $scwForm.validate({
          rules:{
            type:{
              required:true
            },
            title:{
              required:true
            },
            principal_author:{
              required:true
            },
            main_author:{
              required:true
            },
            volume:{
              required:true
            },
            no:{
              required:true
            },
            year_published:{
              required:true
            },
            edition:{
              required:true
            },
            issn_isbn:{
              required:true
            },
            class:{
              required:true
            },
            level:{
              required:true
            },
            publication_group:{
              required:true
            },
            authoring_type:{
              required:true
            },
            publisher:{
              required:true
            },
            place_publication:{
              required:true
            },
            url:{
              required:true
            },
            digital_identifier:{
              required:true
            },
          },  
          messages:{
            type:{
              required:'Type must be required.'
            },
            title:{
              required:'Title must be required.'
            },
            principal_author:{
              required:'Principal Author must be required.'
            },
            main_author:{
              required:'Main Author must be required.' 
            },
            volume:{
              required:'Volume must be required.'
            },
            no:{
              required:'No must be required.' 
            },
            year_published:{
              required:'Year Published must be required.'
            },
            edition:{
              required:'Edition must be required.' 
            },
            issn_isbn:{
              required:'ISSN/ISBN must be required.'
            },
            class:{
              required:'Class must be required.'
            },
            level:{
              required:'Level must be required.'
            },
            publication_group:{
              required:'Publication Group must be required.'
            },
            authoring_type:{
              required:'Authoring Type must be required.' 
            },
            publisher:{
              required:'Publisher must be required.'
            },
            place_publication:{
              required:'Place of Publication must be required.' 
            },
            url:{
              required:'URL must be required.'
            },
            digital_identifier:{
              required:'Digital Identifier must be required.' 
            },
          }
        })

      })

$(function(){

        var $inventionsForm = $("#inventions");

        $inventionsForm.validate({
          rules:{
            title:{
              required:true
            },
            right_type:{
              required:true
            },
            patent_no:{
              required:true
            },
            principal_author:{
              required:true
            },
            date_inventions:{
              required:true
            },
            country:{
              required:true
            },
            ipo_registration:{
              required:true
            },
          },  
          messages:{
            title:{
              required:'Title Project must be required.'
            },
            right_type:{
              required:'IP Right Type must be required.'
            },
            patent_no:{
              required:'Registration or Patent No. must be required.'
            },
            principal_author:{
              required:'Principal Author/Inventor must be required.' 
            },
            date_inventions:{
              required:'Date Issued must be required.'
            },
            country:{
              required:'Country must be required.' 
            },
            ipo_registration:{
              required:'PDF File must be required.'
            },
          }
        })

      })

$(function(){

        var $certificateForm = $("#certificate");

        $certificateForm.validate({
          rules:{
            certificate:{
              required:true
            },
            right_type:{
              required:true
            },
            patent_no:{
              required:true
            },
            principal_author:{
              required:true
            },
            date_inventions:{
              required:true
            },
            country:{
              required:true
            },
            ipo_registration:{
              required:true
            },
          },  
          messages:{
            certificate:{
              required:'Title of Certificate must be required.'
            },
            right_type:{
              required:'IP Right Type must be required.'
            },
            patent_no:{
              required:'Registration or Patent No. must be required.'
            },
            principal_author:{
              required:'Principal Author/Inventor must be required.' 
            },
            date_inventions:{
              required:'Date Issued must be required.'
            },
            country:{
              required:'Country must be required.' 
            },
            ipo_registration:{
              required:'PDF File must be required.'
            },
          }
        })

      })

$(function(){

        var $researchtopicForm = $("#researchtopic");

        $researchtopicForm.validate({
          rules:{
            research_project_title:{
              required:true
            },
          },  
          messages:{
            research_project_title:{
              required:'Title Project must be required.'
            },
          }
        })

      })


