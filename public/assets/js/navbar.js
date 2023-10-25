
    // JavaScript for adding an "active" class to the clicked list item
    // const sideMenuItems = document.querySelectorAll('.side-menu li');
    document.addEventListener("DOMContentLoaded", function() {
        // Define sideMenuItems here
        const sideMenuItems = document.querySelectorAll('.side-menu li');
    
        sideMenuItems.forEach(item => {
            item.addEventListener('click', function () {
                // Remove the "active" class from all list items
                sideMenuItems.forEach(item => {
                    item.classList.remove('active');
                });
    
                // Add the "active" class to the clicked list item
                this.classList.add('active');
            });
        });
        // console.log("My JavaScript is connected!");
    });
    

  
 

