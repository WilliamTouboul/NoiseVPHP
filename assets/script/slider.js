     /* -------------------------------------------------------------------------- */
     /*                                SCRIPT SLIDER                               */
     /* -------------------------------------------------------------------------- */
     const slider = document.querySelector('.sliders');
     let isDown = false;
     let startX;
     let scrollLeft;

     document.querySelectorAll('.sliders').forEach(item => {
         item.addEventListener('mousedown', (e) => {
             isDown = true;
             startX = e.pageX - slider.offsetLeft;
             scrollLeft = slider.scrollLeft;
         });
     });

     document.querySelectorAll('.sliders').forEach(item => {
         item.addEventListener('mouseleave', (e) => {
             isDown = false;
         });
     });

     document.querySelectorAll('.sliders').forEach(item => {
         item.addEventListener('mouseup', (e) => {
             isDown = false;
         });
     });

     document.querySelectorAll('.sliders').forEach(item => {
         item.addEventListener('mousemove', (e) => {
             if (!isDown) return;
             e.preventDefault();
             const x = e.pageX - slider.offsetLeft;
             const walk = (x - startX) * 1.8;
             item.scrollLeft = scrollLeft - walk;
         });
     });

     const mouseMoveHandler = function (e) {
         const dx = e.clientX - pos.x;
         const dy = e.clientY - pos.y;

         ele.scrollTop = pos.top - dy;
         ele.scrollLeft = pos.left - dx;
     };

     