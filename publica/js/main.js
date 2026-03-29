document.addEventListener("DOMContentLoaded", function(){
    const hamburguer = document.querySelector(".hamburguer");
    const navLinks = document.querySelector(".nav-links");
    if(hamburguer && navLinks){
        hamburguer.addEventListener("click",function(){
            navLinks.classList.toggle("active");
            hamburguer.classList.toggle("active");
        });
    }

    const anchorLinks=document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener("click",function(e){
            e.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);
            if(targetElement){
                targetElement.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
        });
    });

    const forms= document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener("submit",function(e){
            const requiredFields=form.querySelectorAll("[required]");
            let isValid = true;
            requiredFields.forEach(field=>{
                if(!field.value.trim()){
                    isValid=false;
                    field.classList.add("error");
                    field.addEventListener("input", function(){
                        this.classList.remove("error");
                    })
                }
            });
            if(!isValid){
                e.preventDefault();
                showNotification("Porfavor, completa todos los campos obligatorios", "error");
            }
        });
    });

    function showNotification(message,type="info"){
        const notification = document.createElement("div");
        notification.className= `notification notification-${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.classList.add("show");
        }, 100);
        setTimeout(() => {
            notification.classList.remove("show");
            setTimeout(() => {
                document.body.removeChild(notification);    
            }, 300);
        },3000);
    }

    const notificationStyles = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1,5rem;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 10000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .notification-show{
            transform: translateX(0);
        }

        .notification-success{
            background: linear-gradient(135deg, #27AE60, #2ECC71);
        }

        .notification-error{
            background: linear-gradient(135deg, #E74C3C, #C0392B);
        }

        .notification-warning{
            background: linear-gradient(135deg, #F39C12, #E67E22);
        }

        .notification-info{
            background: linear-gradient(135deg, #3498DB, #2980B9);
        }

        .form-group input.error,
        .form-group textarea.error,
        .form-group select.error{
        
            border-color: #E74C3C !important;
        }
    `;

    const styleSheet = document.createElement("style");
    styleSheet.textContent = notificationStyles;
    document.head.appendChild(styleSheet);

    const observerOptions = {
        threshold:0.1,
        rootMargin:'0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries){
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add("fade-in");
            }    
        });
    },observerOptions);

    const animateElements = document.querySelectorAll(".feature-card , .testimonial-card, .card");
    animateElements.forEach(el=>observer.observe(el));

    const buttons = document.querySelectorAll('.btn[type="submit"]');
    buttons.forEach(button => {
        if(!button.classList.contains("loading")){
            button.classList.add("loading");
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';
        }
    });
});