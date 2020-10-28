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
// find viewport end
//counterup start
window.onload  = function () {
    mainArr.map(item=>{
    if (isInViewport(item)) {
        
        if (item.dataset.view) {
            let pluginName = item.dataset.name
            let pluginRunSpeed = item.dataset.speed
            if(pluginName === "counterup"){
                let counterNumber = item.innerHTML
                let countstartPoint = 0
                function countRunner(){
                    
                    item.innerHTML = countstartPoint++
                    if(countstartPoint > Number(counterNumber)){
                        clearInterval(stop)
                    }
                }
        
                let stop = setInterval(()=>{
                    countRunner()
                },pluginRunSpeed)
            }
            
            item.dataset.view = ""
        }
    }
})
}


    
window.onscroll  = function () {
    mainArr.map(item=>{
    if (isInViewport(item)) {
        
        if (item.dataset.view) {
            let pluginName = item.dataset.name
            let pluginRunSpeed = item.dataset.speed
            if(pluginName === "counterup"){
                let counterNumber = item.innerHTML
                let countstartPoint = 0
                function countRunner(){
                    
                    item.innerHTML = countstartPoint++
                    if(countstartPoint > Number(counterNumber)){
                        clearInterval(stop)
                    }
                }
        
                let stop = setInterval(()=>{
                    countRunner()
                },pluginRunSpeed)
            }
            item.dataset.view = ""
        }
    }
})
}
//counterup start

//progressbar start
window.onload  = function () {
    mainArr.map(item=>{
    if (isInViewport(item)) {
        if (item.dataset.view) {
            let pluginName = item.dataset.name
            let progressBarPluginHeight = item.dataset.height
            let progressBarPluginPercent = item.dataset.parcent
            let progressBarPluginBg = item.dataset.bg
            let pluginRunSpeed = item.dataset.speed
            
            if(pluginName === "progressbar"){
                let barStartPoint = 0
                function progressbar(){
                    barStartPoint = barStartPoint + .1
                    item.innerHTML = `<div>${parseInt(barStartPoint)}</div>`
                    item.style.width = `${barStartPoint}%`
                    item.style.height = `${progressBarPluginHeight}`
                item.style.background = `${progressBarPluginBg}`
                
                if(barStartPoint>progressBarPluginPercent){
                    clearInterval(stop)
                }
                }
                
        
                // item.style.width = `100px`
                
                let stop = setInterval(()=>{
                    progressbar()
                },pluginRunSpeed)
            }
            item.dataset.view = ""
        }
    }
})
}

window.onscroll  = function () {
    mainArr.map(item=>{
    if (isInViewport(item)) {
        if (item.dataset.view) {
            let pluginName = item.dataset.name
            let progressBarPluginHeight = item.dataset.height
            let progressBarPluginPercent = item.dataset.parcent
            let progressBarPluginBg = item.dataset.bg
            let pluginRunSpeed = item.dataset.speed
            
            if(pluginName === "progressbar"){
                let barStartPoint = 0
                function progressbar(){
                    barStartPoint = barStartPoint + .1
                    item.innerHTML = `<div class="percentages">${parseInt(barStartPoint)}</div>`
                    item.style.width = `${barStartPoint}%`
                    item.style.height = `${progressBarPluginHeight}`
                item.style.background = `${progressBarPluginBg}`
                if(barStartPoint>progressBarPluginPercent){
                    clearInterval(stop)
                }
                }
                
        
                // item.style.width = `100px`
                
                let stop = setInterval(()=>{
                    progressbar()
                },pluginRunSpeed)
            }
            item.dataset.view = ""
        }
    }
})
}
//progressbar end