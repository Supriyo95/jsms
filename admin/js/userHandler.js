$(document).ready(function () {
  getAllStaff();
  deleteUser();
  editUser();
  handleSubmit();
  const uid = Math.floor(Math.random()*9999); 
   // auto complete username
   $("#username").on("focus", function() {
        if(fname !=''){
            let fname = $("#fname").val();
            $("#username").val(fname.concat(uid.toString()));
        }
    });
});

// custom alert box
function toast(selector, msg, msgType, time = 1500) {
  let html = ``;
  if (msgType == "error") {
    html += `<div class="alert alert-danger alert-dismissible fade show " role="alert">
        <p class="mb-0"> ${msg}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
  } else {
    html += `<div class="alert alert-info alert-dismissible fade show" role="alert">
        <p class="mb-0">${msg}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
  }
  // Add the new message to the
  $(selector).html(html);
  if(time !=0){
      setTimeout(function () {
        $(selector).html("");
      }, time);
  }
}

// display all staff
function getAllStaff(){
  $.ajax({
    method:"GET",
    url:"display-staff.php" ,
    dataType : "json",
    success:function(data){
       let html=``;
       $(data).each(function(idx,{AdminName,last_name,UserName,MobileNumber,Email,role,createdAt}){
        html += `<tr>
            <td>${idx+1}</td>
            <td>${AdminName}</td>
            <td>${last_name}</td>
            <td>${UserName}</td>
            <td>${MobileNumber}</td>
            <td>${Email}</td>
            <td>${role}</td>
            <td>${createdAt}</td>
            <td>
              <p class="mb-0 btn btn-outline-primary" data-bs-toggle="modal"
                  data-bs-target="#updateModalForm"
                  onclick='editUser("${Email}")'>Edit</p>
                  
              <p class="mb-0 btn btn-danger"
                  onclick='deleteUser("${Email}")'>Delete</p>
          </td>
         </tr>`;
       });
       $("#staff-records").html(html);
    }
  });
}

// handle submit
function  handleSubmit() {
    $("#addStaffBtn").click(function(e){
        e.preventDefault();

        // get form data
        const fname = $("#fname").val().trim();
        const lname = $("#lname").val().trim();
        const phone = $("#phone").val().trim();
        const email = $("#email").val().trim();
        const username = $("#username").val().trim();

        // const password = $("#password").val().trim();
        // const confPassword = $("#confPassword").val().trim();

       // Check if the input fields are not empty
    if (fname === "" || lname === "" || phone === "" || email === "" || username==="") {
        toast(".error-msg","All fields are required.",'error',3000);
        return false;
      }

      // Check if the email is valid
      else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        toast(".error-msg","Invalid email address.",'error',3000);
        return false;
      }

      // Check if the passwords match
      // else if (password !== confPassword) {
      //   toast(".error-msg","Passwords do not match.",'error',3000);
      //   return false;
      // }
      
      else {
        $.ajax({
            type: "POST",
            url: "add-satff-record.php",
            data: {
              'fname': fname,
              'lname': lname,
              'username': username,
              'phone': phone,
              'email': email
            },
            success: function(response,textStatus) {
                if (textStatus == "success") {
                    $("#modalForm").modal("hide");
                    $("#frmUser").trigger("reset");
                    toast(".msg-box", response, "success", 3000);
                    getAllStaff();
                  }
            }
          });
      }
  

    });
}

// function for delete a user through email-id
function deleteUser(email) {
  if (email) {
    $.ajax({
      type: "POST",
      url: "delete-user.php",
      data: { email: email },
      success: function (response, textStatus) {
        // console.log(response);
        if (textStatus == "success") {
          toast(".msg-box", response, "success", 3000);
          getAllStaff();
          // setTimeout(() => {
          //   window.location.reload();
          // }, 1500);
        }
      },
      error: function (response, textStatus) {
        toast(".msg-box", response, "error", 3000);
      },
    });
  }
}

// Update user
function editUser(email) {
  console.log(email);
    if (email) {
      $("#frmStaff").submit(function (e) { 
        e.preventDefault();
        const permitVal = $("#permit-option").val();
        if(permitVal == ""){
            toast(".error-msg", "Invalid Selection", "error");
            return false;
        }else {
            $.ajax({
              type: "POST",
              url: "update-user.php",
              data: {
                email: email,
                permitVal: permitVal,
                action: "edit",
              },
              success: function (response, textStatus) {
                if (textStatus == "success") {
                  $("#updateModalForm").modal("hide");
                  toast(".msg-box", response, "success", 3000);
                  setTimeout(() => {
                      window.location.reload();
                    }, 1000); 
                  }
              },
              error: function (response, textStatus) {
                toast(".msg-box", response, "error", 3000);
              },
            });
        }
        return false;
      });
  }
}

