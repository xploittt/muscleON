document.addEventListener('DOMContentLoaded', function() {
    
    const navLinks = document.querySelector('.enlaces-navegacion');
    
 

    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    
                    // Remove error class on input
                    field.addEventListener('input', function() {
                        this.classList.remove('error');
                    });
                }
            });

            if (!isValid) {
                e.preventDefault();
                showNotification('Por favor, completa todos los campos obligatorios', 'error');
            }
        });
    });

    // Notification system
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // show notification
        setTimeout(() => {
            notification.classList.add('show');
        }, 100);
        
        // hide notification after 3 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // notification styles dynamically
    const notificationStyles = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 10000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification-success {
            background: linear-gradient(135deg, #27AE60, #2ECC71);
        }
        
        .notification-error {
            background: linear-gradient(135deg, #E74C3C, #C0392B);
        }
        
        .notification-warning {
            background: linear-gradient(135deg, #F39C12, #E67E22);
        }
        
        .notification-info {
            background: linear-gradient(135deg, #3498DB, #2980B9);
        }
        
        .grupo-formulario input.error,
        .grupo-formulario textarea.error,
        .grupo-formulario select.error {
            border-color: #E74C3C !important;
        }
    `;
    
    const styleSheet = document.createElement('style');
    styleSheet.textContent = notificationStyles;
    document.head.appendChild(styleSheet);

    // scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);

    const animateElements = document.querySelectorAll('.tarjeta-caracteristica, .testimonial-card, .card');
    animateElements.forEach(el => observer.observe(el));

    const buttons = document.querySelectorAll('.btn[type="submit"]');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            if (!this.classList.contains('loading')) {
                this.classList.add('loading');
                this.disabled = true;
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';
            }
        });
    });

    const passwordInputs = document.querySelectorAll('input[type="password"][name*="contrasena"]');
    passwordInputs.forEach(input => {
        input.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            showPasswordStrength(strength);
        });
    });

    function calculatePasswordStrength(password) {
        let strength = 0;
        
        if (password.length >= 8) strength++;
        if (password.length >= 12) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^a-zA-Z0-9]/.test(password)) strength++;
        
        return strength;
    }

    function showPasswordStrength(strength) {
        const strengthBar = document.getElementById('password-strength');
        if (!strengthBar) return;
        
        const strengthLevels = ['Muy débil', 'Débil', 'Regular', 'Buena', 'Fuerte', 'Muy fuerte'];
        const strengthColors = ['#E74C3C', '#E67E22', '#F39C12', '#F1C40F', '#27AE60', '#2ECC71'];
        
        strengthBar.style.width = `${(strength / 6) * 100}%`;
        strengthBar.style.backgroundColor = strengthColors[strength - 1] || '#ECF0F1';
        
        const strengthText = document.getElementById('password-strength-text');
        if (strengthText) {
            strengthText.textContent = strengthLevels[strength - 1] || '';
        }
    }

    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.textContent = this.getAttribute('data-tooltip');
            document.body.appendChild(tooltip);
            
            const rect = this.getBoundingClientRect();
            tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + 'px';
            
            this.tooltip = tooltip;
        });
        
        element.addEventListener('mouseleave', function() {
            if (this.tooltip) {
                document.body.removeChild(this.tooltip);
                this.tooltip = null;
            }
        });
    });

    // tooltip styles
    const tooltipStyles = `
        .tooltip {
            position: absolute;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.875rem;
            z-index: 10000;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .tooltip.show {
            opacity: 1;
        }
    `;
    
    const tooltipStyleSheet = document.createElement('style');
    tooltipStyleSheet.textContent = tooltipStyles;
    document.head.appendChild(tooltipStyleSheet);

    // lazy loading
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => {
        img.classList.add('lazy');
        imageObserver.observe(img);
    });

    //lazy loading styles
    const lazyStyles = `
        img.lazy {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        img:not(.lazy) {
            opacity: 1;
        }
    `;
    
    const lazyStyleSheet = document.createElement('style');
    lazyStyleSheet.textContent = lazyStyles;
    document.head.appendChild(lazyStyleSheet);
});

// Utility functions
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function sanitizeInput(input) {
    const div = document.createElement('div');
    div.textContent = input;
    return div.innerHTML;
}

function formatDate(date) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString('es-ES', options);
}

function formatTime(minutes) {
    const hours = Math.floor(minutes / 60);
    const mins = minutes % 60;
    
    if (hours > 0) {
        return `${hours}h ${mins}m`;
    }
    return `${mins}m`;
}

window.showNotification = function(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 3000);
};

window.validateEmail = validateEmail;
window.sanitizeInput = sanitizeInput;
window.formatDate = formatDate;
window.formatTime = formatTime;