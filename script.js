/* =====================================================
   STOOPENDAAL.NL
   SCRIPT V3
   Sprint 24
   ================================================ */

document.addEventListener("DOMContentLoaded", () => {

    "use strict";

    initHeader();
    initMobileMenu();
    initSmoothScroll();
    initFadeAnimations();
    initProvinceCards();
    initActiveMenu();
    initHoverEffects();

});

/* =====================================================
   HEADER
===================================================== */

function initHeader() {

    const header = document.querySelector(".site-header");

    if (!header) return;

    const updateHeader = () => {

        header.classList.toggle(
            "scrolled",
            window.scrollY > 40
        );

    };

    updateHeader();

    window.addEventListener("scroll", updateHeader, {
        passive: true
    });

}


/* =====================================================
   MOBILE MENU
===================================================== */

function initMobileMenu() {

    const menuToggle = document.querySelector(".menu-toggle");
    const mobileNav = document.querySelector(".mobile-nav");
    const overlay = document.querySelector(".mobile-overlay");

    if (!menuToggle || !mobileNav || !overlay) return;

    const openMenu = () => {

        menuToggle.classList.add("active");
        mobileNav.classList.add("active");
        overlay.classList.add("active");

        menuToggle.setAttribute(
            "aria-expanded",
            "true"
        );

        document.body.classList.add("menu-open");

    };

    const closeMenu = () => {

        menuToggle.classList.remove("active");
        mobileNav.classList.remove("active");
        overlay.classList.remove("active");

        menuToggle.setAttribute(
            "aria-expanded",
            "false"
        );

        document.body.classList.remove("menu-open");

    };

    menuToggle.addEventListener("click", () => {

        mobileNav.classList.contains("active")
            ? closeMenu()
            : openMenu();

    });

    overlay.addEventListener(
        "click",
        closeMenu
    );

    document
        .querySelectorAll(".mobile-nav a")
        .forEach(link => {

            link.addEventListener(
                "click",
                closeMenu
            );

        });

    document.addEventListener("keydown", event => {

        if (event.key === "Escape") {

            closeMenu();

        }

    });

    window.addEventListener("resize", () => {

        if (window.innerWidth > 992) {

            closeMenu();

        }

    });

    let lastScroll = window.scrollY;

    window.addEventListener("scroll", () => {

        if (
            mobileNav.classList.contains("active") &&
            Math.abs(window.scrollY - lastScroll) > 30
        ) {

            closeMenu();

        }

        lastScroll = window.scrollY;

    }, {
        passive: true
    });

}


/* =====================================================
   SMOOTH SCROLL
===================================================== */

function initSmoothScroll() {

    document
        .querySelectorAll('a[href^="#"]')
        .forEach(anchor => {

            anchor.addEventListener("click", function (e) {

                const target = document.querySelector(
                    this.getAttribute("href")
                );

                if (!target) return;

                e.preventDefault();

                target.scrollIntoView({

                    behavior: "smooth",
                    block: "start"

                });

            });

        });

}/* =====================================================
   FADE-IN ANIMATIONS
===================================================== */

function initFadeAnimations() {

    const animatedElements = document.querySelectorAll(
        ".route-card, .partner-card, .contact-card, .social-card, .faq-item"
    );

    if (!animatedElements.length) return;

    if (!("IntersectionObserver" in window)) {

        animatedElements.forEach(element => {
            element.classList.add("in-view");
        });

        return;

    }

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (!entry.isIntersecting) return;

            entry.target.classList.add("in-view");
            observer.unobserve(entry.target);

        });

    }, {

        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"

    });

    animatedElements.forEach(element => {

        observer.observe(element);

    });

}


/* =====================================================
   PROVINCE CARDS
===================================================== */

function initProvinceCards() {

    const cards = document.querySelectorAll(".province");

    if (!cards.length) return;

    cards.forEach(card => {

        card.style.cursor = "pointer";

        card.addEventListener("click", () => {

            const url = card.dataset.url;

            if (url) {

                window.location.href = url;

            }

        });

        card.addEventListener("keydown", event => {

            if (event.key === "Enter" || event.key === " ") {

                event.preventDefault();

                const url = card.dataset.url;

                if (url) {

                    window.location.href = url;

                }

            }

        });

    });

}


/* =====================================================
   ACTIVE MENU ON SCROLL
===================================================== */

function initActiveMenu() {

    const sections = document.querySelectorAll("section[id]");
    const menuLinks = document.querySelectorAll(".main-menu a");

    if (!sections.length || !menuLinks.length) return;

    const updateActiveMenu = () => {

        let currentSection = "";

        sections.forEach(section => {

            const top = section.offsetTop - 180;

            if (window.scrollY >= top) {

                currentSection = section.id;

            }

        });

        menuLinks.forEach(link => {

            link.classList.remove("active-scroll");

            const href = link.getAttribute("href");

            if (href === "#" + currentSection) {

                link.classList.add("active-scroll");

            }

        });

    };

    updateActiveMenu();

    window.addEventListener("scroll", updateActiveMenu, {
        passive: true
    });

}


/* =====================================================
   HOVER PERFORMANCE
===================================================== */

function initHoverEffects() {

    const cards = document.querySelectorAll(
        ".route-card, .partner-card, .contact-card"
    );

    if (!cards.length) return;

    cards.forEach(card => {

        card.addEventListener("mouseenter", () => {

            card.style.willChange = "transform";

        });

        card.addEventListener("mouseleave", () => {

            card.style.willChange = "auto";

        });

    });

}/* =====================================================
   UTILITIES
===================================================== */

function debounce(callback, delay = 150) {

    let timeout;

    return (...args) => {

        clearTimeout(timeout);

        timeout = setTimeout(() => {

            callback.apply(null, args);

        }, delay);

    };

}

function throttle(callback, limit = 100) {

    let waiting = false;

    return (...args) => {

        if (waiting) return;

        callback.apply(null, args);

        waiting = true;

        setTimeout(() => {

            waiting = false;

        }, limit);

    };

}


/* =====================================================
   OPTIONAL HELPERS
===================================================== */

function scrollToTop(smooth = true) {

    window.scrollTo({

        top: 0,
        behavior: smooth ? "smooth" : "auto"

    });

}

function bodyLock(lock = true) {

    document.body.classList.toggle(
        "menu-open",
        lock
    );

}


/* =====================================================
   PERFORMANCE
===================================================== */

window.addEventListener(

    "pageshow",

    () => {

        document.body.classList.remove("menu-open");

    },

    {

        passive: true

    }

);

window.addEventListener(

    "load",

    () => {

        document.body.classList.add("page-loaded");

    },

    {

        once: true

    }

);


/* =====================================================
   DEBUG
===================================================== */

console.log(
    "%cSTOOPENDAAL",
    "color:#2E7D32;font-size:18px;font-weight:bold;"
);

console.log(
    "%cScript v3 loaded",
    "color:#666;font-size:12px;"
);


/* =====================================================
   END OF FILE
===================================================== */