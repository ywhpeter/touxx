(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            if(clientWidth>=750){
                // 这里的640 取决于设计稿的宽度
                docEl.style.fontSize = '100px';
            }else{
                docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
            }
        };

    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    recalc();
})(document, window);

let  li=document.querySelectorAll(".big-box li a");
for(let i=0;i<li.length;i++){
    li[i].addEventListener("click",()=>{
        document.querySelector(".big-box li .active").classList.remove("active");
        li[i].classList.add("active")
    })
}



let left=document.querySelector('.left');
let  box=document.querySelector('.box');
let  inter=document.querySelector('.interesting');
let  fou=document.querySelector('.fou');

    left.addEventListener('click',()=>{
    box.classList.add('active');
    inter.classList.add('active');
})
fou.addEventListener('click',()=>{
    box.classList.remove('active')
    inter.classList.remove('active');
})


