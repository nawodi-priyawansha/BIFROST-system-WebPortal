// Access page 
// edit button acction
function editAction(id) {
    const editButton = document.getElementById('editAction_' + id);
    const saveButton = document.getElementById('saveAction_' + id);
    const nameInput = document.getElementById('name_' + id);
    const emailInput = document.getElementById('email_' + id);

    nameInput.disabled = false;
    emailInput.disabled = false;
    editButton.style.display = 'none';
    saveButton.style.display = 'inline-block';
}
//  save button action
function saveAction(id) {
    const editButton = document.getElementById('editAction_' + id);
    const saveButton = document.getElementById('saveAction_' + id);
    const nameInput = document.getElementById('name_' + id);
    const emailInput = document.getElementById('email_' + id);

    // call setData function
    setData(nameInput.value, emailInput.value, id);

    nameInput.disabled = true;
    emailInput.disabled = true;
    editButton.style.display = 'inline-block';
    saveButton.style.display = 'none';

    // Here, you can add your logic to save the changes (e.g., AJAX request to the server)
}

// name and email save
function setData(name, email, id) {
    console.log(id);
    $.ajax({
        url: "/updatedata",
        type: "POST",
        data: {
            name: name,
            email: email,
            id: id,
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}


// user delete function
function deleteAction(id) {
    console.log(id);
    $.ajax({
        url: "/deletedata",
        type: "POST",
        data: {
            id: id,
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function (response) {
            console.log(response);
            location.reload(); // Reload the page
        },
        error: function (xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}

// reset pin
function resetAction(id) {
    // const pin = document.getElementById('pin_' + id).value;
    // console.log(pin);
    $.ajax({
        url: "/resetpin",
        type: "POST",
        data: {
            id: id,
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function (response) {
            console.log(response);
            location.reload(); // Reload the page
        },
        error: function (xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}

// chane access type
function updateAccessType(checkbox, accessId) {
    const accessType = checkbox.checked ? 'read' : 'write';
    console.log(accessType);

    $.ajax({
        url: "/updateaccesstype",
        type: "POST",
        data: {
            id: accessId,
            access_type: accessType,
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function (response) {
            console.log(response);
            if (response.message === 'Access type updated successfully') {
                alert("Access type updated to: " + accessType);
                location.reload(); // Reload the page
            }
        },
        error: function (xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}

// change access page in users
function accesspage(id,name){
    console.log(name);

    $.ajax({
        url: "/updateaccesspage",
        type: "POST",
        data: {
            id: id,
            name: name,
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function(response) {
            console.log(response);
            if (response.message === 'Access type updated successfully') {
                alert("Access type updated to: " + response.access.access_type);
                // Optionally reload the page or update the checkbox state based on the new value
                location.reload();
            }
        },
        error: function (xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}