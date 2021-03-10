let main = document.querySelectorAll(".abmshawon")
let mainArr = Array.from(main)

// find viewport start
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

let menu = document.querySelector(".menu")
if(menu){
    let scrollAmout;
    let elDistanceToTop = window.pageYOffset + menu.getBoundingClientRect().top
    window.addEventListener("scroll",function(){
     scrollAmout = window.pageYOffset
     if(scrollAmout > elDistanceToTop){
        menu.classList.add("menufixed")
    }else{
        menu.classList.remove("menufixed")
    }
})
}


// find viewport end

mainArr.map(item => {
   
    
    
    let pluginName = item.dataset.name
    let times = item.dataset.time
    let countDownDate = new Date(times).getTime();
    let x = setInterval(function () {
        let now = new Date().getTime();
        let distance = countDownDate - now;
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (pluginName === "counterdownday") {
            item.innerHTML = days
        } else if (pluginName === "counterdownhour") {
            item.innerHTML = hours
        } else if (pluginName === "counterdownmin") {
            item.innerHTML = minutes
        } else if (pluginName === "counterdownsec") {
            item.innerHTML = seconds
        }
        if (distance < 0) {
            clearInterval(x);
            item.innerHTML = "EXPIRED";
        }
    }, 1000);

    if (pluginName === "snow") {
        let body = document.querySelector("body")
        body.style.overflowX = "hidden"
       let bg = item.dataset.bg
       let snowamount = item.dataset.snowamount
       let snowsize = item.dataset.snowsize
       let snowspeed = item.dataset.snowspeed
       let height = item.dataset.height
       let width = item.dataset.width
        item.style.background = bg
        let ctx = item.getContext("2d");

        
        let w = window.innerWidth;
        let h = window.innerHeight;
        if(width === "auto"){
            w = window.innerWidth;
       }else{
           w = width;
       }
        if(height === "auto"){
             h = window.innerHeight;
        }else{
            h = height;
        }
        

        item.width = w;
        item.height = h;
        // amount of snow
        let mf = snowamount;

        let flakes = [];

        for (i = 0; i < mf; i++) {
            flakes.push({
                x: Math.random() * w,
                y: Math.random() * h,
                r: Math.random() * snowsize + 2, // size of snow
                d: Math.random() + parseInt(snowspeed), //speed of snow

            })
        }

        function drawFlakes() {
            ctx.clearRect(0, 0, w, h);
            ctx.fillStyle = "white";
            ctx.beginPath();
            for (i = 0; i < mf; i++) {
                let f = flakes[i];
                ctx.moveTo(f.x, f.y);
                ctx.arc(f.x, f.y, f.r, 0, Math.PI * 2, true);
            }
            ctx.fill()
            moveFlakes()
        }

        function moveFlakes() {

            for (i = 0; i < mf; i++) {
                let f = flakes[i];
                f.y += Math.pow(f.d, 2);
                if (f.y > h) {
                    flakes[i] = {
                        x: f.x,
                        y: 0,
                        r: f.r,
                        d: f.d
                    };
                }

            }


        }
        setInterval(drawFlakes, 25);
    }else if(pluginName === "bgspreader"){
        let bg = item.dataset.bg
        let height = item.dataset.height
        item.style.background = bg;
        item.style.backgroundAttachment = "fixed";
        item.style.height = height;
        item.style.clipPath = "circle(0px at center)";
        window.addEventListener("scroll",function(){
            let value = window.scrollY
            item.style.clipPath = `circle(${value}px at center)`;
        })
    }else if(pluginName === "popup"){
        let id = item.dataset.popid
        let bg = item.dataset.bg
        let selector = document.querySelector(`${id}`)
        selector.style.opacity = "0"
        selector.style.width = "100%"
        selector.style.height = "0"
        selector.style.background = `${bg}`
        selector.style.position = "fixed"
        selector.style.top = "0"
        selector.style.left = "0"
        selector.style.transform = "scale(0)"
        selector.style.transition = ".4s"

        item.addEventListener("click",function(){
            selector.style.transform = "scale(1)"
            selector.style.opacity = "1"
            selector.style.height = "100vh"
        })
    }else if(pluginName === "popclose"){
        let id = item.dataset.popid
        let selector = document.querySelector(`${id}`)
        selector.style.cursor = "pointer"
        item.addEventListener("click",function(){
            selector.style.transform = "scale(0)"
            selector.style.opacity = "0"
            selector.style.height = "0"
        })
    }else if(pluginName === "topbottom"){
        let scrollValue = item.dataset.scrollvalue
        item.addEventListener("click",function(){
            window.scrollTo({top:scrollValue})
        })
    }else if(pluginName === "parallax"){
        let speed = item.dataset.speed
        item.style.position = "absolute"
        let check = document.querySelector(".check")
        document.addEventListener("mousemove",function(e){
            let x = (window.innerWidth - e.pageX * speed)/100
            let y = (window.innerWidth - e.pageY * speed)/100
            item.style.transform = `translate3d(${x}px,${y}px,0px)`
            item.style.transformStyle = "preserve-3d"
            item.style.backfaceVisibility = "hidden"
            item.style.transition = ".4s"

        })
    }else if(pluginName === "popleft"){
        let body = document.querySelector("body")
        body.style.overflowX = "hidden"
        let id = item.dataset.popid
        let bg = item.dataset.bg
        let selector = document.querySelector(`${id}`)
        selector.style.width = "100%"
        selector.style.height = "100%"
        selector.style.background = `${bg}`
        selector.style.position = "fixed"
        selector.style.top = "0"
        selector.style.left = "-100%"
        selector.style.transition = ".4s"

        item.addEventListener("click",function(){
            selector.style.left = "0"
        })
    }else if(pluginName === "popleftclose"){
        let id = item.dataset.popid
        let selector = document.querySelector(`${id}`)
        selector.style.cursor = "pointer"
        item.addEventListener("click",function(){
            selector.style.left = "-100%"
        })
    }else if(pluginName === "popright"){
        let body = document.querySelector("body")
        body.style.overflowX = "hidden"
        let id = item.dataset.popid
        let bg = item.dataset.bg
        let selector = document.querySelector(`${id}`)
        selector.style.width = "100%"
        selector.style.height = "100%"
        selector.style.background = `${bg}`
        selector.style.position = "fixed"
        selector.style.top = "0"
        selector.style.right = "-100%"
        selector.style.transition = ".4s"

        item.addEventListener("click",function(){
            selector.style.right = "0"
        })
    }else if(pluginName === "poprightclose"){
        let id = item.dataset.popid
        let selector = document.querySelector(`${id}`)
        selector.style.cursor = "pointer"
        item.addEventListener("click",function(){
            selector.style.right = "-100%"
        })
    }else if(pluginName === "poptop"){
        let id = item.dataset.popid
        let bg = item.dataset.bg
        let selector = document.querySelector(`${id}`)
        selector.style.width = "100%"
        selector.style.height = "100%"
        selector.style.background = `${bg}`
        selector.style.position = "fixed"
        selector.style.top = "-100%"
        selector.style.left = "0"
        selector.style.transition = ".4s"

        item.addEventListener("click",function(){
            selector.style.top = "0"
        })
    }else if(pluginName === "poptopclose"){
        let id = item.dataset.popid
        let selector = document.querySelector(`${id}`)
        selector.style.cursor = "pointer"
        item.addEventListener("click",function(){
            selector.style.top = "-100%"
        })
    }else if(pluginName === "popbottom"){
        let id = item.dataset.popid
        let bg = item.dataset.bg
        let selector = document.querySelector(`${id}`)
        selector.style.width = "100%"
        selector.style.height = "100%"
        selector.style.background = `${bg}`
        selector.style.position = "fixed"
        selector.style.bottom = "-100%"
        selector.style.left = "0"
        selector.style.transition = ".4s"

        item.addEventListener("click",function(){
            selector.style.bottom = "0"
        })
    }else if(pluginName === "popbottomclose"){
        let id = item.dataset.popid
        let selector = document.querySelector(`${id}`)
        selector.style.cursor = "pointer"
        item.addEventListener("click",function(){
            selector.style.bottom = "-100%"
        })
    }


})








// viewport part
window.onload = function () {
    mainArr.map(item => {
        if (isInViewport(item)) {
            if (item.dataset.view) {
                let pluginName = item.dataset.name
                let progressBarPluginHeight = item.dataset.height
                let progressBarPluginPercent = item.dataset.parcent
                let progressBarPluginBg = item.dataset.bg
                let pluginPercentMove = item.dataset.pmove
                let pluginRunSpeed = item.dataset.speed
                if (pluginName === "counterup") {
                    let counterNumber = item.innerHTML
                    let countstartPoint = 0

                    function countRunner() {

                        item.innerHTML = countstartPoint++
                        if (countstartPoint > Number(counterNumber)) {
                            clearInterval(stop)
                        }
                    }
                    let stop = setInterval(() => {
                        countRunner()
                    }, pluginRunSpeed)
                } else if (pluginName === "progressbar") {
                    let barStartPoint = 0

                    function progressbar() {
                        barStartPoint = barStartPoint + .1
                        if (pluginPercentMove === "true") {
                            item.style.position = 'relative'
                            item.innerHTML = `<div class="percentages" style="position:absolute;right:0;top:0;">${parseInt(barStartPoint)}%</div>`
                        } else {
                            item.innerHTML = `<div class="percentages">${parseInt(barStartPoint)}%</div>`
                        }
                        item.style.width = `${barStartPoint}%`
                        item.style.height = `${progressBarPluginHeight}`
                        item.style.background = `${progressBarPluginBg}`
                        if (barStartPoint > progressBarPluginPercent) {
                            clearInterval(stop)
                        }
                    }
                    let stop = setInterval(() => {
                        progressbar()
                    }, pluginRunSpeed)
                } else if (pluginName === "typejs") {
                    let typeText = item.innerHTML
                    let typeArr = item.innerHTML.split("")
                    let countstartPoint = -1
                    item.innerHTML = ""

                    function typejs() {
                        if (countstartPoint < typeText.length) {
                            countstartPoint++
                            item.innerHTML += typeText.charAt(countstartPoint)
                            typeArr = item.innerHTML.split("")
                        } else {
                            typeArr.pop()
                            item.innerHTML = typeArr.join("")
                            if (typeArr.length == 0) {
                                countstartPoint = -1
                            }
                        }
                    }
                    let stop = setInterval(() => {
                        typejs()
                    }, 200);
                }
                item.dataset.view = ""
            }
        }
    })
}

window.onscroll = function () {
    mainArr.map(item => {
        if (isInViewport(item)) {

            if (item.dataset.view) {
                let pluginName = item.dataset.name
                let progressBarPluginHeight = item.dataset.height
                let progressBarPluginPercent = item.dataset.parcent
                let progressBarPluginBg = item.dataset.bg
                let pluginPercentMove = item.dataset.pmove
                let pluginRunSpeed = item.dataset.speed
                if (pluginName === "counterup") {
                    let counterNumber = item.innerHTML
                    let countstartPoint = 0

                    function countRunner() {

                        item.innerHTML = countstartPoint++
                        if (countstartPoint > Number(counterNumber)) {
                            clearInterval(stop)
                        }
                    }
                    let stop = setInterval(() => {
                        countRunner()
                    }, pluginRunSpeed)
                } else if (pluginName === "progressbar") {
                    let barStartPoint = 0

                    function progressbar() {
                        barStartPoint = barStartPoint + .1
                        if (pluginPercentMove == "true") {
                            item.style.position = 'relative'
                            item.innerHTML = `<div class="percentages" style="position:absolute;right:0;top:0;">${parseInt(barStartPoint)}</div>`
                        } else {
                            item.innerHTML = `<div class="percentages">${parseInt(barStartPoint)}</div>`
                        }

                        item.style.width = `${barStartPoint}%`
                        item.style.height = `${progressBarPluginHeight}`
                        item.style.background = `${progressBarPluginBg}`
                        if (barStartPoint > progressBarPluginPercent) {
                            clearInterval(stop)
                        }
                    }
                    let stop = setInterval(() => {
                        progressbar()
                    }, pluginRunSpeed)
                } else if (pluginName === "typejs") {
                    let typeText = item.innerHTML
                    let typeArr = item.innerHTML.split("")
                    let countstartPoint = -1
                    item.innerHTML = ""

                    function typejs() {
                        if (countstartPoint < typeText.length) {
                            countstartPoint++
                            item.innerHTML += typeText.charAt(countstartPoint)
                            typeArr = item.innerHTML.split("")
                        } else {
                            typeArr.pop()
                            item.innerHTML = typeArr.join("")
                            if (typeArr.length == 0) {
                                countstartPoint = -1
                            }
                        }
                    }
                    let stop = setInterval(() => {
                        typejs()
                    }, 200);
                }
                item.dataset.view = ""
            }
        }
    })
}
//counterup start