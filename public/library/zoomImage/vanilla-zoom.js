(function(window){
    function zoomImage() {
        var vanillaZoom = {};
        vanillaZoom.init = function(el) {

            // var container = document.querySelector(el);
            // if(!container) {
            //     console.error('No container element. Please make sure you are using the right markup.');
            //     return;
            // }

            var zoomedImage = document.querySelector(el);

            if (!zoomedImage) {
                console.error('No image to zoomed');
                return;
            }
            
            // Zoom image on mouse enter.
            zoomedImage.addEventListener('mouseenter', function(e) {
                this.style.backgroundSize = "200%"; 
            }, false);


            // Show different parts of image depending on cursor position.
            zoomedImage.addEventListener('mousemove', function(e) {
                
                // getBoundingClientReact gives us various information about the position of the element.
                var dimentions = this.getBoundingClientRect();

                // Calculate the position of the cursor inside the element (in pixels).
                var x = e.clientX - dimentions.left;
                var y = e.clientY - dimentions.top;

                // Calculate the position of the cursor as a percentage of the total width/height of the element.
                var xpercent = Math.round(100 / (dimentions.width / x));
                var ypercent = Math.round(100 / (dimentions.height / y));

                // Update the background position of the image.
                this.style.backgroundPosition = xpercent+'% ' + ypercent+'%';
            
            }, false);


            // When leaving the container zoom out the image back to normal size.
            zoomedImage.addEventListener('mouseleave', function(e) {
                this.style.backgroundSize = "cover"; 
                this.style.backgroundPosition = "center"; 
            }, false);

        }
        return vanillaZoom;
    }

    // Add the vanillaZoom object to global scope.
    window.vanillaZoom = zoomImage();    

})(window);