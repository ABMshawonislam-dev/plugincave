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
window.onload  = function () {
    mainArr.map(item=>{
    if (isInViewport(item)) {
        
        if (item.dataset.view) {
            let pluginName = item.dataset.name
            let progressBarPluginHeight = item.dataset.height
            let progressBarPluginPercent = item.dataset.parcent
            let progressBarPluginBg = item.dataset.bg
            let pluginPercentMove = item.dataset.pmove
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
            }else if(pluginName === "progressbar"){
                let barStartPoint = 0
                function progressbar(){
                    barStartPoint = barStartPoint + .1
                    if(pluginPercentMove == "true"){
                        item.style.position = 'relative'
                         item.innerHTML = `<div class="percentages" style="position:absolute;right:0;top:0;">${parseInt(barStartPoint)}</div>`
                    }else {
                         item.innerHTML = `<div class="percentages">${parseInt(barStartPoint)}</div>`
                    }
                    
                    item.style.width = `${barStartPoint}%`
                    item.style.height = `${progressBarPluginHeight}`
                item.style.background = `${progressBarPluginBg}`
                if(barStartPoint>progressBarPluginPercent){
                    clearInterval(stop)
                }
                }
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
            let pluginPercentMove = item.dataset.pmove
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
            }else if(pluginName === "progressbar"){
                let barStartPoint = 0
                function progressbar(){
                    barStartPoint = barStartPoint + .1
                    if(pluginPercentMove == "true"){
                        item.style.position = 'relative'
                         item.innerHTML = `<div class="percentages" style="position:absolute;right:0;top:0;">${parseInt(barStartPoint)}</div>`
                    }else {
                         item.innerHTML = `<div class="percentages">${parseInt(barStartPoint)}</div>`
                    }
                    
                    item.style.width = `${barStartPoint}%`
                    item.style.height = `${progressBarPluginHeight}`
                item.style.background = `${progressBarPluginBg}`
                if(barStartPoint>progressBarPluginPercent){
                    clearInterval(stop)
                }
                }
                let stop = setInterval(()=>{
                    progressbar()
                },pluginRunSpeed)
            }else if(pluginName === "typejs"){
                let typeText = item.innerHTML
                let typeArr = item.innerHTML.split("")
                let countstartPoint = -1
                item.innerHTML =""
                function typejs(){
                    if(countstartPoint<typeText.length){
                        countstartPoint++
                            item.innerHTML += typeText.charAt(countstartPoint)
                            typeArr = item.innerHTML.split("")
                    }else{
                        typeArr.pop()
                        item.innerHTML = typeArr.join("")
                         if(typeArr.length==0){
                            countstartPoint=-1
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