function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

/** Services toc */

const tocContainer = document.getElementById('toc_container');
const tocList = tocContainer.querySelector('.toc_list');
const tocTitle = tocContainer.querySelector('.toc_title');

let isMenuOpen = false;

tocTitle.addEventListener('click', () => {
    toggleMenu();
});

function toggleMenu() {
    tocList.style.display = tocList.style.display === 'none' ? 'block' : 'none';
    isMenuOpen = !isMenuOpen;
}


