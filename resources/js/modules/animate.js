export default function animate() {
    
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active-reveal");
            } else {
                reveals[i].classList.remove("active-reveal");
            }
        }
    }
    window.addEventListener("scroll", reveal); 
}