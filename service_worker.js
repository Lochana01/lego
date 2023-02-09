const statCache = "statv1";
const dynaCache = "dynav1";

const assests = ["./","./admin.php","./android-chrome-192x192.png","./android-chrome-256x256.png","./apple-touch-icon.png","./avatar.jpg","./browserconfig.xml","./call.php","./close.php","./conn.php","./create_message.php","./dashboard_admin.php","./dashboard_developer.php","./dashboard_redirection.php","./dashboard_tutor.php","./dashboard_student.php","./developer.php","./fallback.php","./favicon-16x16.png","./favicon-32x32.png","./favicon.ico","./forum.php","./forum.sql","./home.php","./index.php","./information_management_admin.php","./information_management_developer.php","./information_management_student.php","information_management_tutor.php","./lego.sql","./login.php","./logout.jpg","./logout.php","./main.js","./manifest.json","./message_inbox.php","./message.php","./register.php","./resources.php","./safari-pinned-tab.svg","./save.php","./signature.js","./student.php","./tutors.php","./video_call.php","./view.php","./voice_message.php","../classes/add.php","../classes/connect.php","./../classes/create_message.php","../classes/delete.php","../classes/login.php","../classes/register.php","../classes/search.php","../classes/update.php","../classes/user_information_management.php","../classes/user.php","../classes/view.php","../images/add_icon.png"]

self.addEventListener("Install",(evt)=>{
    evt.waitUntil(
        caches.open(statCache)
    .then((cache)=>{
        console.log("Caching Assests....");
        cache.addAll(assests);
        }) 
    );
    console.log("Service Worker Installed.");
});

self.addEventListener("Activate",(evt)=>{
    console.log("Service Worker is Active.");
    evt.waitUntil(
        caches.keys()
        .then((keys)=>{
            return Promise.all(
                keys.filter(key=>key!==statCache && key!==dynaCache)
                .map(key=>caches.delete(key))
            );
        })
    );
});

self.addEventListener("Fetch",(evt)=>{ 
    console.log("Fetch Event",evt);
    evt.respondWith(
        caches.match(evt.request)
        .then((cacheRes)=>{
            return cacheRes || fetch(evt.request)
            .then(fetchRes=>{
                return caches.open(dynaCache)
                .then(cache=>{
                    cache.put(evt.request.url,fetchRes.clone());
                    return fetchRes;
                });
            });
        }).catch(()=>{
            if(evt.request.url.indexOf(".php")>-1){
                return caches.match("./fallback.php")
            }
            })
    );
});