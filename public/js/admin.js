// Access page 

const editButton = document.getElementById('editAction');
const saveButton = document.getElementById('saveAction');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');

editButton.addEventListener('click', function () {
    nameInput.disabled = false;
    emailInput.disabled = false;
    editButton.style.display = 'none';
    saveButton.style.display = 'inline-block';
});

saveButton.addEventListener('click', function () {
    setdata(nameInput.value, emailInput.value);
    nameInput.disabled = true;
    emailInput.disabled = true;
    editButton.style.display = 'inline-block';
    saveButton.style.display = 'none';
});

// name and email save
function setdata(name, email){
    console.log(email);
    $.ajax({
        url: "/setdata/" + name + "/" + email,
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function(response){
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}
