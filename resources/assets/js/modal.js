const classToCloseModal = ['invisible', 'h-0', 'opacity-0']

/**
 * open / close a modal
 */
export function openCloseModal(modalSelector) {
    const modalEl = document.querySelector(modalSelector)

    // if modal open, set isModalOpen = true. else, isModalOpen = false
    const isModalOpen = modalEl.classList.contains(...classToCloseModal) ? true : false
    
    if (isModalOpen === true) {
        // close modal
        modalEl.classList.remove(...classToCloseModal)
    }
    else {
        // open modal
        modalEl.classList.add(...classToCloseModal)
    }
}