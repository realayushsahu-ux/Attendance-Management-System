// ===================================
// Attendance Management System
// Main JavaScript File
// ===================================

console.log("Attendance Management System Loaded Successfully");

document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("searchStudent");
    const tableRows = document.querySelectorAll(".attendance-table tbody tr");

    const allPresentBtn = document.getElementById("allPresent");
    const allAbsentBtn = document.getElementById("allAbsent");
    const clearBtn = document.getElementById("clearAttendance");

    const saveBtn = document.getElementById("saveAttendance");

    const presentCount = document.getElementById("presentCount");
    const absentCount = document.getElementById("absentCount");

    //---------------------------------------------------
    // Search Student
    //---------------------------------------------------

    if (searchInput) {

        searchInput.addEventListener("keyup", function () {

            let value = this.value.toLowerCase();

            tableRows.forEach(function (row) {

                let text = row.innerText.toLowerCase();

                row.style.display = text.includes(value) ? "" : "none";

            });

        });

    }

    //---------------------------------------------------
    // Radio Buttons
    //---------------------------------------------------

    const radios = document.querySelectorAll("input[type='radio']");

    radios.forEach(function (radio) {

        radio.addEventListener("change", function () {

            updateCounter();

            toggleSaveButton();

            highlightRows();

        });

    });

    //---------------------------------------------------
    // Mark All Present
    //---------------------------------------------------

    if (allPresentBtn) {

        allPresentBtn.addEventListener("click", function () {

            tableRows.forEach(function (row) {

                row.querySelector("input[value='Present']").checked = true;

            });

            updateCounter();

            toggleSaveButton();

            highlightRows();

        });

    }

    //---------------------------------------------------
    // Mark All Absent
    //---------------------------------------------------

    if (allAbsentBtn) {

        allAbsentBtn.addEventListener("click", function () {

            tableRows.forEach(function (row) {

                row.querySelector("input[value='Absent']").checked = true;

            });

            updateCounter();

            toggleSaveButton();

            highlightRows();

        });

    }

    //---------------------------------------------------
    // Clear Attendance
    //---------------------------------------------------

    if (clearBtn) {

        clearBtn.addEventListener("click", function () {

            radios.forEach(function (radio) {

                radio.checked = false;

            });

            updateCounter();

            toggleSaveButton();

            highlightRows();

        });

    }

    //---------------------------------------------------
    // Update Counter
    //---------------------------------------------------

    function updateCounter() {

        let p = 0;
        let a = 0;

        tableRows.forEach(function (row) {

            if (row.querySelector("input[value='Present']").checked) {

                p++;

            }

            if (row.querySelector("input[value='Absent']").checked) {

                a++;

            }

        });

        presentCount.textContent = p;

        absentCount.textContent = a;

    }

    //---------------------------------------------------
    // Enable Save Button
    //---------------------------------------------------

    function toggleSaveButton() {

        let complete = true;

        tableRows.forEach(function (row) {

            let checked = row.querySelector("input[type='radio']:checked");

            if (!checked) {

                complete = false;

            }

        });

        saveBtn.disabled = !complete;

    }

    //---------------------------------------------------
    // Highlight Rows
    //---------------------------------------------------

    function highlightRows() {

        tableRows.forEach(function (row) {

            row.classList.remove("present-row");

            row.classList.remove("absent-row");

            if (row.querySelector("input[value='Present']").checked) {

                row.classList.add("present-row");

            }

            if (row.querySelector("input[value='Absent']").checked) {

                row.classList.add("absent-row");

            }

        });

    }

});