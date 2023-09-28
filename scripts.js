document.addEventListener("DOMContentLoaded", function () {
    // Add JavaScript functionality for star rating interactivity
    const stars = document.querySelectorAll(".star");

    stars.forEach(function (star) {
        star.addEventListener("click", function () {
            const employeeId = this.getAttribute("data-employee-id");
            const rating = this.getAttribute("data-rating");

            // Send an AJAX request to update the rating in the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_rating.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the star ratings on the page
                    const activeStars = document.querySelectorAll(`.star[data-employee-id="${employeeId}"]`);
                    activeStars.forEach(function (activeStar) {
                        activeStar.classList.remove("active");
                    });

                    for (let i = 0; i < rating; i++) {
                        activeStars[i].classList.add("active");
                    }
                }
            };

            xhr.send(`employee_id=${employeeId}&rating=${rating}`);
        });
    });
});
