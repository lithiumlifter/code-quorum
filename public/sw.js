const CACHE_NAME = "offline-mode";
const urlsToCache = [
    '/',
    '/offline.html',
    '/discussions',
    '/my-discussions',
    '/my-saves',
    '/profile',
    '/profile/setting',
    '/tags',
    '/my-answers',
    '/login',
    '/register',
    '/build/assets/app-CUfIFuVq.css',
    '/build/assets/app-CVYclMpX.js',
    '/build/assets/app-BgDxBACR.css',
    '/assets/img/logo.png',
    '/assets/img/illustration_home.jpg',
    '/assets/img/user.png',
    '/assets/css/login-register.css',
    '/assets/css/sb-admin-2.css',
    '/assets/css/sb-admin-2.min.css',
    '/assets/css/owl.carousel.min.css',
    '/assets/js/bootstrap.min.js',
    '/assets/js/jquery-3.3.1.min.js',
    '/assets/js/main.js',
    '/assets/js/owl.carousel.min.js',
    '/assets/js/popper.min.js',
    '/assets/js/sb-admin-2.js',
    '/assets/js/sb-admin-2.min.js',
    'https://use.fontawesome.com/releases/v6.3.0/js/all.js',
    'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(urlsToCache);
        })
    );
});

self.addEventListener('fetch', (event) => {
    if (event.request.url.startsWith('http')) {
        event.respondWith(
            caches.open(CACHE_NAME).then((cache) => {
                return cache.match(event.request).then((cachedResponse) => {
                    const fetchPromise = fetch(event.request).then((networkResponse) => {
                        if (networkResponse && networkResponse.status === 200) {
                            // Menyimpan respons baru ke dalam cache
                            cache.put(event.request, networkResponse.clone());
                        }
                        return networkResponse;
                    }).catch(() => {
                        // Jika fetch gagal, berikan respons dari cache
                        return cachedResponse || caches.match('/offline.html');
                    });

                    // Mengembalikan respons dari cache terlebih dahulu
                    return cachedResponse || fetchPromise;
                });
            })
        );
    }
});



