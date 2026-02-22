import './bootstrap';

function initToasts() {
    document.querySelectorAll('[data-toast]').forEach((toast) => {
        const bar = toast.querySelector('[data-toast-bar]');
        const close = toast.querySelector('[data-toast-close]');

        let remaining = 4500;
        const start = Date.now();

        if (bar) {
            bar.style.transition = `width ${remaining}ms linear`;
            // Trigger transition on next frame
            requestAnimationFrame(() => {
                bar.style.width = '0%';
            });
        }

        const removeToast = () => {
            toast.classList.add('opacity-0', 'transition-opacity');
            setTimeout(() => toast.remove(), 250);
        };

        if (close) {
            close.addEventListener('click', removeToast);
        }

        setTimeout(() => {
            const elapsed = Date.now() - start;
            if (elapsed >= remaining) {
                removeToast();
            }
        }, remaining + 50);
    });
}

function initLoadingForms() {
    document.querySelectorAll('form[data-loading-form]').forEach((form) => {
        form.addEventListener('submit', () => {
            const submitButtons = form.querySelectorAll('[data-loading-submit]');
            submitButtons.forEach((btn) => {
                btn.setAttribute('disabled', 'disabled');
                btn.classList.add('opacity-80', 'cursor-not-allowed');
            });

            const spinners = form.querySelectorAll('[data-loading-spinner]');
            spinners.forEach((el) => el.classList.remove('hidden'));
        });
    });
}

// Loading Overlay
window.addEventListener('load', function () {
    const loadingOverlay = document.getElementById('loading-overlay');
    if (loadingOverlay) {
        loadingOverlay.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            loadingOverlay.remove();
        }, 500);
    }
});

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function () {
    initToasts();
    initLoadingForms();

    const escapeHtml = (value) => {
        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    };

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Search Modal
    const searchToggle = document.getElementById('search-toggle');
    const searchClose = document.getElementById('search-close');
    const searchModal = document.getElementById('search-modal');
    const searchPanel = document.getElementById('search-panel');
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const searchResultsList = document.getElementById('search-results-list');

    const STATIC_INDEX = [
        { type: 'Halaman', title: 'Beranda', url: '/', subtitle: '/' },
        { type: 'Halaman', title: 'Profil Desa', url: '/profil', subtitle: '/profil' },
        { type: 'Halaman', title: 'Potensi', url: '/potensi', subtitle: '/potensi' },
        { type: 'Halaman', title: 'Layanan', url: '/layanan', subtitle: '/layanan' },
        { type: 'Halaman', title: 'Ajukan Layanan', url: '/layanan', subtitle: '/layanan' },
        { type: 'Halaman', title: 'Lacak Status Layanan', url: '/layanan/track', subtitle: '/layanan/track' },
        { type: 'Halaman', title: 'Berita', url: '/berita', subtitle: '/berita' },
        { type: 'Halaman', title: 'Galeri', url: '/galeri', subtitle: '/galeri' },
        { type: 'Halaman', title: 'Kontak', url: '/kontak', subtitle: '/kontak' },
        { type: 'Halaman', title: 'Login', url: '/login', subtitle: '/login' },
        { type: 'Halaman', title: 'Setelan Akun', url: '/setelan', subtitle: '/setelan' },
        { type: 'Halaman', title: 'Setelan Admin', url: '/admin/settings', subtitle: '/admin/settings' },
    ];

    const renderSearchResults = (items, options = {}) => {
        if (!searchResults || !searchResultsList) return;

        const { isLoading = false } = options;

        if (isLoading) {
            searchResultsList.innerHTML = `
                <div class="px-4 py-4 text-sm text-slate-600">Mencari…</div>
            `;
            searchResults.classList.remove('hidden');
            return;
        }

        if (!items.length) {
            searchResultsList.innerHTML = `
                <div class="px-4 py-4 text-sm text-slate-600">Tidak ada hasil. Coba kata kunci lain.</div>
            `;
            searchResults.classList.remove('hidden');
            return;
        }

        const html = items.slice(0, 10).map((item, idx) => {
            const isFirst = idx === 0;
            const type = escapeHtml(item.type || 'Hasil');
            const title = escapeHtml(item.title || '');
            const subtitle = escapeHtml(item.subtitle || item.url || '');
            const url = escapeHtml(String(item.url || '#'));
            return `
                <a href="${url}" class="block px-4 py-3 hover:bg-slate-50 transition-colors ${isFirst ? 'bg-slate-50' : ''}">
                    <div class="flex items-center justify-between gap-3">
                        <div class="text-sm font-semibold text-slate-900 truncate">${title}</div>
                        <span class="text-[11px] px-2 py-0.5 rounded-full bg-slate-100 text-slate-700 flex-shrink-0">${type}</span>
                    </div>
                    <div class="text-xs text-slate-500 truncate">${subtitle}</div>
                </a>
            `;
        }).join('');

        searchResultsList.innerHTML = html;
        searchResults.classList.remove('hidden');
    };

    const filterStatic = (query) => {
        const q = query.toLowerCase();
        return STATIC_INDEX.filter((item) =>
            item.title.toLowerCase().includes(q) || item.url.toLowerCase().includes(q)
        );
    };

    const uniqueByKey = (items) => {
        const seen = new Set();
        const out = [];
        for (const item of items) {
            const key = `${String(item.url || '')}::${String(item.type || '')}::${String(item.title || '')}`;
            if (!key || seen.has(key)) continue;
            seen.add(key);
            out.push(item);
        }
        return out;
    };

    let searchDebounceTimer = null;
    let searchAbortController = null;

    const closeSearch = function () {
        if (!searchModal) return;
        searchModal.classList.add('opacity-0');
        if (searchPanel) searchPanel.classList.add('-translate-y-full');
        setTimeout(() => {
            searchModal.classList.add('hidden');
            if (searchInput) searchInput.value = '';
            if (searchResults) searchResults.classList.add('hidden');
            if (searchResultsList) searchResultsList.innerHTML = '';
        }, 300);
    };

    if (searchToggle && searchModal && searchPanel) {
        searchToggle.addEventListener('click', function () {
            searchModal.classList.remove('hidden');
            // Small delay to allow display:block to apply before opacity transition
            setTimeout(() => {
                searchModal.classList.remove('opacity-0');
                searchPanel.classList.remove('-translate-y-full');
            }, 10);

            setTimeout(() => {
                if (searchInput) searchInput.focus();
            }, 50);
        });

        if (searchClose) searchClose.addEventListener('click', closeSearch);
        searchModal.addEventListener('click', function (e) {
            if (e.target === searchModal) {
                closeSearch();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (!searchModal || searchModal.classList.contains('hidden')) return;

            if (e.key === 'Escape') {
                closeSearch();
            }

            if (e.key === 'Enter' && document.activeElement === searchInput) {
                const first = searchResultsList?.querySelector('a');
                if (first) {
                    window.location.href = first.getAttribute('href');
                }
            }
        });

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const query = (searchInput.value || '').trim().toLowerCase();
                if (!query) {
                    if (searchResults) searchResults.classList.add('hidden');
                    if (searchResultsList) searchResultsList.innerHTML = '';
                    return;
                }

                const staticMatches = filterStatic(query);
                renderSearchResults(staticMatches);

                if (searchDebounceTimer) {
                    clearTimeout(searchDebounceTimer);
                }

                // Skip DB search for ultra-short input
                if (query.length < 2) {
                    return;
                }

                searchDebounceTimer = setTimeout(async () => {
                    try {
                        if (searchAbortController) {
                            searchAbortController.abort();
                        }

                        searchAbortController = new AbortController();

                        // Show loading if there are no quick matches
                        if (!staticMatches.length) {
                            renderSearchResults([], { isLoading: true });
                        }

                        const res = await fetch(`/search?q=${encodeURIComponent(query)}` , {
                            headers: { 'Accept': 'application/json' },
                            signal: searchAbortController.signal,
                        });

                        if (!res.ok) {
                            throw new Error('Search request failed');
                        }

                        const data = await res.json();
                        const remoteResults = Array.isArray(data?.results) ? data.results : [];

                        const merged = uniqueByKey([
                            ...staticMatches,
                            ...remoteResults,
                        ]);

                        renderSearchResults(merged);
                    } catch (err) {
                        // Ignore aborts (typing fast)
                        if (err?.name === 'AbortError') return;
                        // Fallback to static matches
                        renderSearchResults(staticMatches);
                    }
                }, 220);
            });
        }
    }

    // Back to Top Button
    const backToTopButton = document.getElementById('back-to-top');

    if (backToTopButton) {
        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'pointer-events-none');
                backToTopButton.classList.add('opacity-100');
            } else {
                backToTopButton.classList.add('opacity-0', 'pointer-events-none');
                backToTopButton.classList.remove('opacity-100');
            }
        });

        backToTopButton.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });
    }

    // Scroll Animations (Intersection Observer)
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with data-animate attribute
    document.querySelectorAll('[data-animate]').forEach(el => {
        el.classList.add('opacity-0');
        observer.observe(el);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});

