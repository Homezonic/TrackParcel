document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 32,
        autoplay: {
            delay: 8000,
        },
        breakpoints: {
            640: {
                centeredSlides: true,
                slidesPerView: 1.25,
            },
            1024: {
                centeredSlides: false,
                slidesPerView: 1.5,
            },
        },
        navigation: {
            nextEl: '.next-button',
            prevEl: '.prev-button',
        },
    })
})

function copyFunction() {
    // Get the text field
    var copyText = document.getElementById("tracking");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Change the copy icon to a checkmark
    var icon = document.querySelector("#copy svg");
    icon.innerHTML = `
    <svg class="tooltiptext h-4 w-4 text-green-500" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 13l4 4L19 7"></path>
    </svg>
`;

    // Reset the copy icon after a certain duration
    setTimeout(() => {
        icon.innerHTML = `
        <svg class="tooltiptext h-4 w-4" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
        </svg>
    `;
    }, 2000);
}

function outFunc() {
    var icon = document.querySelector("#copy svg");
    icon.innerHTML = `
    <svg class="tooltiptext h-4 w-4" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
    </svg>
`;
}