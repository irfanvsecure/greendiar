document.addEventListener("DOMContentLoaded", () => {

  /* Preloader */
  const preloader = document.getElementById("preloader");
  window.addEventListener("load", () => preloader.classList.add("hide"));
  // Fallback in case slow images keep "load" waiting
  setTimeout(() => preloader.classList.add("hide"), 3000);

  /* Sticky header + back to top */
  const header = document.getElementById("header");
  const toTop = document.getElementById("toTop");
  const onScroll = () => {
    header.classList.toggle("scrolled", window.scrollY > 60);
    toTop.classList.toggle("show", window.scrollY > 600);
  };
  window.addEventListener("scroll", onScroll);
  onScroll();
  toTop.addEventListener("click", () => {
    if (window.lenis) window.lenis.scrollTo(0);
    else window.scrollTo({ top: 0, behavior: "smooth" });
  });

  /* Mobile menu */
  const nav = document.getElementById("nav");
  const toggle = document.getElementById("menuToggle");
  toggle.addEventListener("click", () => {
    nav.classList.toggle("open");
    toggle.classList.toggle("active");
  });
  document.querySelectorAll(".has-sub > a").forEach(link => {
    link.addEventListener("click", e => {
      if (window.innerWidth <= 1024) {
        e.preventDefault();
        link.parentElement.classList.toggle("open");
      }
    });
  });
  document.querySelectorAll(".nav a:not(.has-sub > a)").forEach(link => {
    link.addEventListener("click", () => {
      nav.classList.remove("open");
      toggle.classList.remove("active");
    });
  });

  /* Counters */
  const animateCount = el => {
    const target = parseFloat(el.dataset.to);
    const decimals = parseInt(el.dataset.decimals || 0, 10);
    const duration = 2000;
    const start = performance.now();
    const step = now => {
      const p = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - p, 3);
      el.textContent = (target * eased).toFixed(decimals);
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };

  /* Reveal on scroll + start counters when visible */
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      if (el.classList.contains("count")) animateCount(el);
      else el.classList.add("visible");
      observer.unobserve(el);
    });
  }, { threshold: 0.15 });
  // Headings animate letter by letter (animations.js); the eyebrow and intro text fade up
  document.querySelectorAll(".section-head > .eyebrow, .section-head > p").forEach(el => el.classList.add("reveal"));
  document.querySelectorAll(".reveal, .count").forEach(el => observer.observe(el));

  /* Project filter */
  const filters = document.querySelectorAll("#filters li");
  const projects = document.querySelectorAll(".project");
  filters.forEach(btn => {
    btn.addEventListener("click", () => {
      filters.forEach(f => f.classList.remove("active"));
      btn.classList.add("active");
      const f = btn.dataset.filter;
      projects.forEach(p => {
        const show = f === "all" || p.dataset.cat.split(" ").includes(f);
        p.classList.toggle("hidden", !show);
      });
    });
  });

  /* Testimonial slider */
  const slider = document.getElementById("slider");
  if (slider) {
    const slides = slider.querySelector(".slides");
    const total = slides.children.length;
    let index = 0;
    const go = i => {
      index = (i + total) % total;
      slides.style.transform = `translateX(-${index * 100}%)`;
    };
    slider.querySelector(".next").addEventListener("click", () => go(index + 1));
    slider.querySelector(".prev").addEventListener("click", () => go(index - 1));
    let autoplay = setInterval(() => go(index + 1), 6000);
    slider.addEventListener("mouseenter", () => clearInterval(autoplay));
    slider.addEventListener("mouseleave", () => {
      autoplay = setInterval(() => go(index + 1), 6000);
    });
  }

  /* Hero slider: photo, text and dot change together; arrows/dots/swipe to navigate, autoplay every 7s */
  const heroSlider = document.getElementById("heroSlider");
  if (heroSlider) {
    const photos = [...heroSlider.querySelectorAll(".hero-media")];
    const texts = [...heroSlider.querySelectorAll(".hero-text")];
    const dots = [...heroSlider.querySelectorAll(".hero-dots button")];
    const autoplay = !matchMedia("(prefers-reduced-motion: reduce)").matches;
    let current = 0;
    let timer;
    const loadPhoto = img => { if (img.dataset.src) { img.src = img.dataset.src; delete img.dataset.src; } };
    const go = i => {
      const next = (i + photos.length) % photos.length;
      if (next === current) return;
      loadPhoto(photos[next]);
      photos.forEach(p => p.classList.remove("prev"));
      photos[current].classList.replace("active", "prev");
      // Restart the zoom from the beginning for the incoming photo
      photos[next].style.animation = "none";
      void photos[next].offsetWidth;
      photos[next].style.animation = "";
      photos[next].classList.add("active");
      texts.forEach((t, n) => {
        t.classList.toggle("active", n === next);
        t.setAttribute("aria-hidden", n !== next);
      });
      dots.forEach((d, n) => d.classList.toggle("active", n === next));
      current = next;
    };
    const restart = () => {
      clearInterval(timer);
      if (autoplay) timer = setInterval(() => {
        const next = photos[(current + 1) % photos.length];
        if (next.complete && !next.dataset.src) go(current + 1); // wait for the photo instead of fading to a blank
      }, 7000);
    };
    heroSlider.querySelector(".hero-arrow.prev").addEventListener("click", () => { go(current - 1); restart(); });
    heroSlider.querySelector(".hero-arrow.next").addEventListener("click", () => { go(current + 1); restart(); });
    dots.forEach((d, n) => d.addEventListener("click", () => { go(n); restart(); }));
    let touchX = null;
    heroSlider.addEventListener("touchstart", e => { touchX = e.touches[0].clientX; }, { passive: true });
    heroSlider.addEventListener("touchend", e => {
      if (touchX === null) return;
      const dx = e.changedTouches[0].clientX - touchX;
      if (Math.abs(dx) > 50) { go(current + (dx < 0 ? 1 : -1)); restart(); }
      touchX = null;
    });
    window.addEventListener("load", () => { photos.forEach(loadPhoto); restart(); });
  }

  /* Service catalog sliders (home page) */
  if (window.Swiper) {
    document.querySelectorAll(".catalog-slider").forEach(wrap => {
      const perView = Number(wrap.dataset.perView) || 5;
      const autoplay = "autoplay" in wrap.dataset;
      new Swiper(wrap.querySelector(".catalog-swiper"), {
        slidesPerView: 2.2,
        spaceBetween: 10,
        loop: autoplay,
        speed: 600,
        autoplay: autoplay && { delay: 3000, disableOnInteraction: false, pauseOnMouseEnter: true },
        navigation: { nextEl: wrap.querySelector(".next"), prevEl: wrap.querySelector(".prev") },
        breakpoints: {
          768: { slidesPerView: Math.min(3.3, perView), spaceBetween: 15 },
          1024: { slidesPerView: perView, spaceBetween: perView < 5 ? 30 : 15 },
        },
      });
    });
  }

  /* Image gallery slider (service detail pages) */
  document.querySelectorAll("[data-gallery]").forEach(gallery => {
    const track = gallery.querySelector(".gallery-track");
    const count = track.children.length;
    const dotsWrap = gallery.querySelector(".gallery-dots");
    let current = 0;
    const dots = [...Array(count)].map((_, i) => {
      const d = document.createElement("button");
      d.setAttribute("aria-label", `Show image ${i + 1}`);
      d.addEventListener("click", () => show(i));
      dotsWrap.appendChild(d);
      return d;
    });
    const show = i => {
      current = (i + count) % count;
      track.style.transform = `translateX(-${current * 100}%)`;
      dots.forEach((d, n) => d.classList.toggle("active", n === current));
    };
    gallery.querySelector(".prev").addEventListener("click", () => show(current - 1));
    gallery.querySelector(".next").addEventListener("click", () => show(current + 1));
    let timer = setInterval(() => show(current + 1), 5000);
    gallery.addEventListener("mouseenter", () => clearInterval(timer));
    gallery.addEventListener("mouseleave", () => { timer = setInterval(() => show(current + 1), 5000); });
    show(0);
  });

  /* Contact form: validates in the browser, then posts to Laravel (ContactController) */
  const form = document.getElementById("contactForm");
  if (form) {
    const status = document.getElementById("formStatus");
    const today = new Date().toLocaleDateString("en-CA"); // YYYY-MM-DD in local time
    const rules = {
      name: v => v.trim() ? "" : "Please enter the owner name.",
      location: v => v.trim() ? "" : "Please enter your location.",
      email: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) ? "" : "Please enter a valid email address.",
      phone: v => /^[+\d][\d\s()-]{6,}$/.test(v.trim()) ? "" : "Please enter a valid phone number.",
      service: v => v ? "" : "Please select a service.",
      date: v => v && v >= today ? "" : "Please choose today or a later date.",
      hour: v => v ? "" : "Please select the hour.",
      minute: v => v ? "" : "Please select the minutes."
    };
    const setError = (input, msg) => {
      const field = input.closest(".field");
      let err = field.querySelector(".error");
      field.classList.toggle("invalid", !!msg);
      input.setAttribute("aria-invalid", msg ? "true" : "false");
      if (msg && !err) {
        err = document.createElement("span");
        err.className = "error";
        err.id = input.id + "-error";
        input.setAttribute("aria-describedby", err.id);
        field.appendChild(err);
      }
      if (err) err.textContent = msg;
      return !msg;
    };
    const check = input => setError(input, rules[input.name] ? rules[input.name](input.value) : "");
    const fields = [...form.querySelectorAll("input:not([type=hidden]), select")];
    fields.forEach(i => i.addEventListener(i.tagName === "SELECT" ? "change" : "blur", () => check(i)));

    form.addEventListener("submit", async e => {
      e.preventDefault();
      const valid = fields.map(check).every(Boolean);
      status.className = "form-status";
      if (!valid) {
        status.textContent = "Please fix the highlighted fields.";
        status.classList.add("fail");
        form.querySelector(".invalid input, .invalid select").focus();
        return;
      }
      const btn = form.querySelector("button[type=submit]");
      btn.disabled = true;
      try {
        const res = await fetch(form.action, {
          method: "POST",
          body: new FormData(form),
          headers: { Accept: "application/json", "X-Requested-With": "XMLHttpRequest" }
        });
        const data = await res.json().catch(() => ({}));
        if (res.status === 422 && data.errors) {
          Object.entries(data.errors).forEach(([name, msgs]) => {
            const input = form.elements[name];
            if (input) setError(input, msgs[0]);
          });
          status.textContent = "Please fix the highlighted fields.";
          status.classList.add("fail");
          return;
        }
        if (!res.ok) throw new Error();
        status.textContent = data.message || "Thank you! Your message has been sent.";
        status.classList.add("ok");
        form.reset();
      } catch {
        status.textContent = "Sorry, something went wrong. Please call or email us instead.";
        status.classList.add("fail");
      } finally {
        btn.disabled = false;
      }
    });
  }

  /* Tabs (About page Mission & Values) */
  document.querySelectorAll("[data-tabs]").forEach(box => {
    const tabs = [...box.querySelectorAll('[role="tab"]')];
    const panels = [...box.querySelectorAll('[role="tabpanel"]')];
    tabs.forEach((tab, n) => tab.addEventListener("click", () => {
      tabs.forEach((t, i) => { t.classList.toggle("active", i === n); t.setAttribute("aria-selected", i === n); });
      panels.forEach((p, i) => p.classList.toggle("active", i === n));
    }));
  });

  /* FAQ accordion */
  const items = document.querySelectorAll(".acc-item");
  const setHeight = item => {
    const body = item.querySelector(".acc-body");
    body.style.maxHeight = item.classList.contains("open") ? body.scrollHeight + "px" : "0";
  };
  items.forEach(item => {
    setHeight(item);
    item.querySelector(".acc-head").addEventListener("click", () => {
      const wasOpen = item.classList.contains("open");
      items.forEach(i => { i.classList.remove("open"); setHeight(i); });
      if (!wasOpen) { item.classList.add("open"); setHeight(item); }
    });
  });
  window.addEventListener("resize", () => items.forEach(setHeight));

  /* Video popup */
  const modal = document.getElementById("videoModal");
  const frame = document.getElementById("videoFrame");
  const playBtn = document.getElementById("playBtn");
  if (modal && frame && playBtn) {
    const closeModal = () => { modal.classList.remove("open"); frame.src = ""; };
    playBtn.addEventListener("click", () => {
      frame.src = playBtn.dataset.video;
      modal.classList.add("open");
    });
    document.getElementById("modalClose").addEventListener("click", closeModal);
    modal.addEventListener("click", e => { if (e.target === modal) closeModal(); });
    document.addEventListener("keydown", e => { if (e.key === "Escape") closeModal(); });
  }
});
