/* Scroll + text + image animations (Lenis, GSAP ScrollTrigger, SplitText from CDN) */
(() => {
  if (!window.gsap) return;
  gsap.registerPlugin(ScrollTrigger, SplitText);

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* Smooth scrolling */
  if (window.Lenis && !reduceMotion) {
    const lenis = new Lenis({ wheelMultiplier: 1.2, touchMultiplier: 1.5 });
    // Lenis 1.1.13 has no autoRaf option, so drive it from GSAP's ticker
    lenis.on("scroll", ScrollTrigger.update);
    gsap.ticker.add(time => lenis.raf(time * 1000));
    gsap.ticker.lagSmoothing(0);
    window.lenis = lenis;

    // In-page anchor links scroll through Lenis
    document.querySelectorAll('a[href*="#"]').forEach(link => {
      link.addEventListener("click", e => {
        const url = new URL(link.href, location.href);
        if (url.pathname !== location.pathname || !url.hash || url.hash === "#") return;
        const target = document.querySelector(url.hash);
        if (!target) return;
        e.preventDefault();
        lenis.scrollTo(target, { offset: -90 });
      });
    });
  }

  if (reduceMotion) return;

  /* Magic cursor: small ball that trails the pointer */
  const ball = document.getElementById("cursorBall");
  if (ball && window.matchMedia("(pointer: fine)").matches) {
    const moveX = gsap.quickTo(ball, "x", { duration: 0.35, ease: "power3" });
    const moveY = gsap.quickTo(ball, "y", { duration: 0.35, ease: "power3" });
    window.addEventListener("mousemove", e => {
      ball.classList.add("visible");
      moveX(e.clientX);
      moveY(e.clientY);
    });
    document.querySelectorAll("a, button, .filters li").forEach(el => {
      el.addEventListener("mouseenter", () => ball.classList.add("grow"));
      el.addEventListener("mouseleave", () => ball.classList.remove("grow"));
    });
    document.addEventListener("mouseleave", () => ball.classList.remove("visible"));
  }

  /* Headings: letters slide in one by one */
  const headings = document.querySelectorAll(
    ".section-head h2, .video-top h2, .page-header h1, .detail-block h2, .consult-box h2"
  );
  document.fonts.ready.then(() => {
    headings.forEach(el => {
      const split = new SplitText(el, { type: "chars, words" });
      gsap.from(split.chars, {
        x: 20,
        autoAlpha: 0,
        duration: 0.8,
        stagger: 0.03,
        ease: "power2.out",
        scrollTrigger: { trigger: el, start: "top 85%" },
      });
    });
    ScrollTrigger.refresh();
  });

  /* Images: clip reveal from the left while the photo settles from a zoom */
  const images = document.querySelectorAll(
    ".about-img-1, .about-img-2, .vm-img, .why-img img, .expertise-gallery img, " +
    ".detail-images img, .contact-side > img, .post-featured .img-wrap, .gallery"
  );
  images.forEach(el => {
    const img = el.tagName === "IMG" ? el : el.querySelector("img");
    const tl = gsap.timeline({ scrollTrigger: { trigger: el, start: "top 80%" } });
    tl.fromTo(el, { clipPath: "inset(0 100% 0 0)" }, { clipPath: "inset(0 0% 0 0)", duration: 1.4, ease: "power2.out" });
    if (img) tl.from(img, { scale: 1.3, duration: 1.4, ease: "power2.out" }, 0);
  });

  /* Gentle parallax on full-width photo backgrounds */
  gsap.utils.toArray(".testimonials, .video-cta").forEach(section => {
    gsap.fromTo(section, { backgroundPositionY: "30%" }, {
      backgroundPositionY: "70%",
      ease: "none",
      scrollTrigger: { trigger: section, start: "top bottom", end: "bottom top", scrub: true },
    });
  });
})();
