const signUpLink = document.querySelector(".signIn");
const mainContent = document.querySelector(".main"); // The container for all sections
const signUpButton = document.querySelector(".sign-up-btn");
const signUpContent = document.querySelector("#sign-up-content");
const bookLink = document.querySelector(".book-link");
const bookContent = document.querySelector('#book-now')

// Hide main content and show sign-up content when "Sign Up" <a> is clicked
signUpLink.addEventListener("click", (event) => {
    event.preventDefault();  // Prevent default <a> behavior
    signUpContent.style.display = "block";
    mainContent.style.display="none"; 
    bookContent.style.display = 'none';
    scroll(signUpLink)
});

bookLink.addEventListener("click", (event) => {
    event.preventDefault();  // Prevent default <a> behavior
    bookContent.style.display = "block";
    mainContent.style.display="none";
    signUpContent.style.display = "none"
    scroll(bookLink) 
});

// Show main content when header links are clicked
const headerLinks = document.querySelectorAll("header ul li a"); // Select all header links
headerLinks.forEach(link => {
    link.addEventListener("click", (event) => {
        event.preventDefault();  // Prevent default <a>  // Log which link is clicked 
        mainContent.style.display='block'  // show the main content
        signUpContent.style.display= 'none' // show the main content
        bookContent.style.display = "none"
        scroll(link)
    });
});
function scroll(link){
    const targetId = link.getAttribute("href").substring(1);// Get the id from href (remove #)
    const targetContent = document.querySelector(`#${targetId}`);
    if (targetContent) {
        console.log('hiii')
    // Scroll to the targeted content (optional)
        targetContent.scrollIntoView({ behavior: "smooth", block: "start" });
}}
