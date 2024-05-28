var loadFile = function (event) {
    var output = document.getElementById('myimage');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};

function openModal(employeeId) {
    var modal = document.getElementById("deleteModal-" + employeeId);
    modal.style.display = "block";
    document.body.style.overflow = "hidden"; // Disable scrolling on the body
}

// Function to close the modal and change CSS
function closeModal(employeeId) {
    var modal = document.getElementById("deleteModal-" + employeeId);
    modal.style.display = "none";
    document.body.style.overflow = "auto"; // Enable scrolling on the body
}
