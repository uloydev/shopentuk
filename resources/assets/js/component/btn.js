/**
    * set icon color when btn #btn-back hovered
*/
 const btnChangeIconOnHover = document.querySelectorAll('.change-icon-color-on-hover')
 btnChangeIconOnHover.forEach(btn => {
     const icon = btn.querySelector('box-icon')
     const iconOriginalColor = icon.getAttribute('color')
     btn.addEventListener('mouseover', () => {
         icon.setAttribute('color', btn.dataset.toColor)
     })
     btn.addEventListener('mouseleave', () => {
         icon.setAttribute('color', iconOriginalColor)
     })
 })